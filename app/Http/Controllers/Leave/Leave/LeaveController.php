<?php

namespace App\Http\Controllers\Leave\Leave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Leave\ApplyLeaveRequest;
use Auth;
use App\mLeaveType;
use App\mLeaveEntitlement;
use App\Employee;
use App\tLeave;
use App\tLeaveRequest;
use App\mLeaveStatus;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Mail;
use App\Mail\ApplyLeaveRequestMail;
use App\Mail\LeaveApproveStatus;
use App\tEmployeeReportTo;
use App\tLeaveComment;
use App\mHoliday;
use App\mLeavePeriod;
use DB;
use App\User;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $leaveStatus = mLeaveStatus::get();

        $employee = Employee::where('user_id', Auth::user()->id)->first();
        $employeeId = $employee->id;
        $myLeaves = tLeaveRequest::join('m_leave_types', 'm_leave_types.id', 't_leave_requests.leave_type_id')
            ->join('t_leaves', 't_leaves.leave_request_id', 't_leave_requests.id')
            ->join('m_leave_status', 't_leave_requests.status', 'm_leave_status.id')
            ->join('employees', 'employees.id', 't_leave_requests.employee_id')
            ->where('t_leave_requests.employee_id', $employeeId)
            ->select('t_leave_requests.*', 'm_leave_types.name', 't_leaves.leave_duration', 't_leaves.length_days', 't_leaves.approval_level')
            ->selectRaw('datediff(t_leave_requests.to_date, t_leave_requests.from_date) as leave_days, m_leave_status.name as leave_status')
            ->selectRaw('CONCAT(employees.first_name, " ", employees.last_name) as emp_name')
            ->selectRaw('(IF (t_leaves.approval_level =1 && t_leaves.status = 2, "Pending Approval From Admin", 
            IF(approval_level =2 && t_leaves.status = 2, "Approved", m_leave_status.name)  )) AS my_status')
            ->when(request()->filled('status'), function ($query) {
                $query->where('t_leave_requests.status', request('status'));
            })
            ->when(request()->filled('from_date'), function ($query) {
                $query->where('t_leave_requests.from_date', '>=', request('from_date'));
            })
            ->when(request()->filled('to_date'), function ($query) {
                $query->where('t_leave_requests.to_date', '<=', request('to_date'));
            });
            

            if($request->sort_by && $request->sort_field) {
                $myLeaves = $myLeaves->orderBy($request->sort_field, $request->sort_by);
            } else {
                $myLeaves = $myLeaves->orderBy('t_leave_requests.status', 'ASC');
            }
            $myLeaves = $myLeaves->groupBy('t_leave_requests.id');
            $total = $myLeaves->get()->count();
            $myLeaves = $myLeaves->paginate(10); 
            
            return view('leave/leave/my_leaves', compact('leaveStatus', 'myLeaves', 'total'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userId = Auth::user()->id;
        $employee = Employee::where('user_id', $userId)->first();
        if(!$employee)
            return redirect('/');
        //check entitlement is assigned for the current user
        $employeeId = $employee->id;
        $leaveEntitlements = mLeaveEntitlement::where('emp_number', $employeeId)->first();
        if($leaveEntitlements) {
            $leaveType = mLeaveType::all();
            $assignLeave = false;
            $holidays = $this->getHolidays($employeeId);
            return view('leave/leave/apply_leave', compact('leaveType', 'leaveEntitlements', 'employeeId', 'assignLeave', 'holidays'));            
        } else {
            $message = 'Leave entitlements not added!';
            return view('leave/leave/error', compact('message'));
        }        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplyLeaveRequest $request)
    {   
        $fromDate = str_replace('/', '-', $request->from_date);
        $fromDate = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $request->to_date);
        $toDate = date('Y-m-d', strtotime($toDate));

        //validate the leave date is inbetween the current leave period    
        $active_leave_period = $this->getActiveLeavePeriod($request->employee_id);              
        if($active_leave_period && strtotime($fromDate) && strtotime($toDate) && strtotime($fromDate) <= strtotime($active_leave_period->end_period) && strtotime($fromDate) >= strtotime($active_leave_period->start_period) && strtotime($toDate) <= strtotime($active_leave_period->end_period) && strtotime($toDate) >= strtotime($active_leave_period->start_period) ) {
            // is_valid_leave_dates  true;
        } else {
            $message = 'Please select the leave dates within the current leave period';
            if(!$active_leave_period) {
                $message = 'Leave period is not active for the current year. Please contact Administrator';
            }
            return redirect()->back()->with('error', $message);
        }

        $leaveDates = CarbonPeriod::create($fromDate, $toDate);
        // Convert the period to an array of dates
        $dates = $leaveDates->toArray();

        $employee = Employee::where('id', $request->employee_id)->first();
        $employeeId = $employee->id;
        
        $leaveEntitlements = mLeaveEntitlement::where('emp_number', $employeeId)
                                ->where('id', $request->leave_entitlement_id)
                                ->where('leave_type_id', $request->leave_type_id)
                                ->first();

        //Check is leave exists
        $exists = tLeave::where('employee_id', $employeeId)
                        ->whereIn('date', $dates)
                        ->whereIn('status', [1,2,3])
                        ->first();
        if($exists) {
            return redirect()->back()->with('error', 'You applied leave already for the selected date');
        }

        //check the leave is in Holidays
        $isHoliday = $this->checkLeaveHasHolidays($dates);
        if($isHoliday) {
            return redirect()->back()->with("error", "Please don't apply leave for Holidays.");
        }
        $managerEmails = [];
        //get reporting managers
        $reportTo = $this->getReportingManagers($employeeId);
        if($reportTo && $reportTo->reporting_manager_ids) {
            $empId = explode(',', $reportTo->reporting_manager_ids);
            $managers = Employee::whereIn('employees.id', $empId)
                ->join('users', 'users.id', '=', 'employees.user_id')
                ->selectRaw('employees.email as email,  users.name')
                ->get()
                ->toArray();

            if($managers) {
                $managerEmails = $managers;
            }
        }

        //find Leave Length days
        $lengthDay = 1;
        $lengthHour = 8;
        if($request->leave_duration == 'morning' || $request->leave_duration == 'evening') {
            $lengthDay = 0.5;
            $lengthHour = 4;
        }
        
        $leave_approval_level = 0;
        $leave_status = 1;
        $sendMailFlag = true;
        if($request->assign_leave == 1 && Auth::user()->hasRole('Manager')) {
            $leave_approval_level = 1;
            $leave_status = 2;
        } else if(Auth::user()->hasRole('Admin')) {
            $leave_approval_level = 2;
            $leave_status = 2;
            $sendMailFlag = false;
        } else {
            //if no manager assigned notify admin to Approve
            if(count($managerEmails) ) {
                $leave_approval_level = 0;
                if(Auth::user()->hasRole('Manager')) {
                    $leave_approval_level = 1;
                }                
            } else {
                $leave_approval_level = 1;
            }
        }

        // insert apply Leave
        $leaveRequest = new tLeaveRequest;
        $leaveRequest->employee_id = $employeeId;
        $leaveRequest->leave_type_id = $request->leave_type_id;
        $leaveRequest->from_date = date('Y-m-d', strtotime($fromDate));
        $leaveRequest->to_date = date('Y-m-d', strtotime($toDate));
        $leaveRequest->status = $leave_status;
        $leaveRequest->comments = $request->reason;
        $leaveRequest->save();

        $leaveStatus = mLeaveStatus::where('id', $leave_status)->first();

        // =========== t_log table Start ===========
            if(Auth::user()->hasRole('Admin')){
                $action = $leaveStatus->name;
                $send_by = getEmployeeId(Auth::user()->id);
                $send_to = $employeeId;
            }else if(Auth::user()->hasRole('Manager')){
                $action = $leaveStatus->name;
                $send_by = getEmployeeId(Auth::user()->id);
                $allAdmins = getAllAdminUsers();
                $send_to = $employeeId.','.$allAdmins->admin_ids;
            }else{
                $action = "Applied";
                $send_by = $employeeId;
                $send_to = getMyReportingManager($employeeId);
            }
            $module_id = $leaveRequest->id;
            $date = $leaveRequest->from_date.','.$leaveRequest->to_date;
            activityLog($action, "Leave", $send_by, $send_to, $module_id, $date);
        // =========== t_log table end =============

        // Iterate over the period
        foreach ($leaveDates as $date) {
            $leaveDate = $date->format('Y-m-d');
            $leave = new tLeave;
            $leave->employee_id = $employeeId;
            $leave->leave_request_id = $leaveRequest->id;
            $leave->date = $leaveDate;
            $leave->length_hours = $lengthHour;
            $leave->length_days = $lengthDay;
            $leave->leave_duration = $request->leave_duration;
            $leave->entitlement_id = $request->leave_entitlement_id;
            $leave->status = $leave_status;
            $leave->approval_level = $leave_approval_level;   
            $leave->leave_type_id = $request->leave_type_id;
            $leave->save();
        }

        //updated used leaves count
        $leaveEntitlements->days_used = $leaveEntitlements->days_used + $request->number_of_days;
        $leaveEntitlements->save();
        
        //send mail notification to Manager and admin
        $details = [
            'employee_name' => $employee->first_name . ' '.$employee->last_name,
            'date'  =>  $fromDate . ' to '. $toDate
        ];
        
        //Get Super Admin Email Address in getSuperAdminEmail()

        $managerEmails[] = ['name' => 'Admin', 'email' => getSuperAdminEmail()];
        if($sendMailFlag)
            Mail::to($managerEmails)->send(new ApplyLeaveRequestMail($details));
        
        if($request->assign_leave == 1) {
            return redirect()->route('leave.list')->with('success', 'You applied successfully!');      
        } 
        return redirect()->route('leave.index')->with('success', 'You applied successfully!');      
                
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$employeeId = $employee->id;
        $myLeaves = tLeaveRequest::join('m_leave_types', 'm_leave_types.id', 't_leave_requests.leave_type_id')
            ->join('t_leaves', 't_leaves.leave_request_id', 't_leave_requests.id')
            ->join('m_leave_status', 't_leave_requests.status', 'm_leave_status.id')
            ->join('employees', 'employees.id', 't_leave_requests.employee_id')
            ->where('t_leave_requests.id', $id)
            ->select('t_leave_requests.*', 'm_leave_types.name', 't_leaves.leave_duration', 't_leaves.length_days', 't_leaves.approval_level')
            ->selectRaw('datediff(t_leave_requests.to_date, t_leave_requests.from_date) as leave_days, m_leave_status.name as leave_status')
            ->selectRaw('CONCAT(employees.first_name, " ", employees.last_name) as emp_name')
            ->selectRaw('(IF (t_leaves.approval_level =1 && t_leaves.status = 2, "Pending Approval From Admin", 
            IF(approval_level =2 && t_leaves.status = 2, "Approved", m_leave_status.name)  )) AS my_status')
            ->first();
        
        $allComments = tLeaveComment::join('t_leave_requests', 't_leave_requests.id', 't_leave_comments.leave_id')
            ->join('employees', 'employees.id', 't_leave_comments.employee_id')
            ->where('t_leave_comments.leave_id', $id)
            ->selectRaw('t_leave_comments.*, CONCAT(employees.first_name, " ", employees.last_name) as manager_name, DATE_FORMAT(t_leave_comments.created_at, "%Y-%m-%d %h:%i %p") as action_date')
            ->orderBy('t_leave_comments.id', 'DESC')
            ->get()
            ->toArray();
        
            return ['comments' => $allComments, 'info' => $myLeaves];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $leave_request_id = $request->delete_id;
        //Soft Delete
        tLeaveRequest::where('id', $leave_request_id)->delete();
        $leaves = tLeave::where('leave_request_id', $leave_request_id)
            ->selectRaw('SUM(length_days) as days, entitlement_id')
            ->first();
        
        $leaveDays = (float) $leaves->days;
        $entitlementId = $leaves->entitlement_id;
        $entitlementDet = mLeaveEntitlement::where('id', $entitlementId)->first();
        $entitlementDet->days_used = $entitlementDet->days_used - $leaveDays;
        $entitlementDet->save();

        tLeave::where('leave_request_id', $leave_request_id)->delete(); 

        //update Leave balance in entitlement_table
        return redirect()->back()->with('success', 'Deleted Successfully');
    }

    public function getLeaveList(Request $request)
    {
        $user = Auth::user();
        $employee = Employee::where('user_id', Auth::user()->id)->first();
        $employeeId = $employee->id;

        $empIds = [];
        $userRole = 'Admin';
        if($user->hasRole('Manager')) {
            $userRole = 'Manager';
            $approval_level = [0,1,2];
            //Find Reporting Employees Ids
            $reportTo = $this->getReportingEmployees($employeeId);
            if($reportTo)
                $empIds = explode(',', $reportTo->reporting_manager_ids);
        } else {    
            // dd('Admin');
            $approval_level = [1,2];
        }

        $leaveStatus = mLeaveStatus::whereIn('id', [2,4,5])->get();
        $filterLeaveStatus = mLeaveStatus::whereIn('id', [1,2,4,5])->get();

        $myLeaves = tLeaveRequest::join('m_leave_types', 'm_leave_types.id', 't_leave_requests.leave_type_id')
            ->join('t_leaves', 't_leaves.leave_request_id', 't_leave_requests.id')
            ->join('employees', 'employees.id', 't_leave_requests.employee_id')
            ->join('m_leave_status', 't_leave_requests.status', 'm_leave_status.id')
            ->leftJoin('t_employee_report_to', 't_employee_report_to.employee_id', 'employees.id')
            ->where('t_leave_requests.employee_id', '!=', $employeeId);
            
        if($userRole == 'Admin') {
                $myLeaves = $myLeaves->whereRaw('IF(t_employee_report_to.manager_id = '.$employeeId.', t_leaves.approval_level IN (0,1,2), t_leaves.approval_level IN (1,2) ) = 1');
        } else {
            $myLeaves = $myLeaves->whereIn('t_leaves.approval_level', $approval_level);
        }
        if(count($empIds)) {
            $myLeaves = $myLeaves->whereIn('t_leave_requests.employee_id', $empIds);
            // dd($empIds);
        }

        $myLeaves = $myLeaves->select('t_leave_requests.*', 't_leaves.approval_level', 'm_leave_types.name', 't_leaves.leave_duration', 't_leaves.length_days')
            ->selectRaw('CONCAT(employees.first_name, " ", employees.last_name) as emp_name')
            ->selectRaw('datediff(t_leave_requests.to_date, t_leave_requests.from_date) as leave_days, m_leave_status.name as leave_status')
            ->selectRaw('IF(t_employee_report_to.manager_id = '.$employeeId.', 1 , 0 ) as reporting_me')
            ->when(request()->filled('status'), function ($query) {
                $query->where('t_leave_requests.status', request('status'));
            })
            ->when(request()->filled('from_date'), function ($query) {
                $query->where('t_leave_requests.from_date', '>=', request('from_date'));
            })
            ->when(request()->filled('to_date'), function ($query) {
                $query->where('t_leave_requests.to_date', '<=', request('to_date'));
            })
            ->selectRaw('(IF (t_leaves.approval_level =1 && t_leaves.status = 2, "Pending Approval From Admin", 
            IF(approval_level =2 && t_leaves.status = 2, "Approved", m_leave_status.name)  )) AS my_status')
            ->selectRaw('datediff(t_leave_requests.to_date, t_leave_requests.from_date) + 1 as no_leave_days')
            ->groupBy('t_leave_requests.id');
        
            if($request->sort_by && $request->sort_field) {
                $myLeaves = $myLeaves->orderBy($request->sort_field, $request->sort_by);
            } else {
                // $myLeaves = $myLeaves->orderBy('approval_level', 'ASC')
                //     ->orderByRaw("FIELD(t_leave_requests.status, 1,3,2,4)");
                $myLeaves = $myLeaves->orderByRaw("FIELD(my_status, 'Pending','Pending Approval From Admin','Approved','Rejected')");
            }             
            $total = $myLeaves->get()->count();
            $myLeaves = $myLeaves->paginate(10);

        return view('leave/leave/leave_list', compact('leaveStatus', 'filterLeaveStatus', 'myLeaves', 'userRole', 'total'));           
    }

    public function getLeaveBalance(Request $request)
    {
        $employeeId = $request->employee_id;
        $leaveTypeId = $request->leave_type_id;
        $date = date('Y-m-d');
        $out = [];
        $leaveEntitlements = null;
        $active_leave_period = $this->getActiveLeavePeriod($employeeId);
        $leavesTaken = null;

        if($active_leave_period) {

            //Get Leave Entitlements for the date
            $leaveEntitlements = mLeaveEntitlement::where('emp_number', $employeeId)
                                    ->whereRaw(' from_date <= "'.$active_leave_period->end_period.'" AND to_date >= "'.$active_leave_period->start_period.'"')
                                    ->where('leave_type_id', $leaveTypeId)
                                    ->first();
            //find used leaves
            $leavesTaken = tLeave::where('employee_id', $employeeId)
                        ->where('leave_type_id', $leaveTypeId)
                        ->whereIn('status', [1,2,3])
                        ->where('date', '>=', $active_leave_period->start_period)
                        ->where('date', '<=', $active_leave_period->end_period)
                        ->selectraw('SUM(length_days) as leaves_taken')
                        ->first();
            //validate the leave date is inbetween the current leave period
            $fromDate = str_replace('/', '-', $request->from_date);
            $fromDate = date('Y-m-d', strtotime($fromDate));
            $toDate = str_replace('/', '-', $request->to_date);
            $toDate = date('Y-m-d', strtotime($toDate)); 
            $out['is_valid_leave_dates'] = false;           
            if(strtotime($fromDate) && strtotime($toDate) && strtotime($fromDate) <= strtotime($active_leave_period->end_period) && strtotime($fromDate) >= strtotime($active_leave_period->start_period) && strtotime($toDate) <= strtotime($active_leave_period->end_period) && strtotime($toDate) >= strtotime($active_leave_period->start_period) ) {
                $out['is_valid_leave_dates'] = true;
            }
            if(strtotime($fromDate) && strtotime($toDate) && !$out['is_valid_leave_dates']){
                $out['is_valid_leave_dates'] = false;
            }
        }

        $leaveBalance = 0;
        if($leaveEntitlements) {
            $leaveBalance = $leaveEntitlements->no_of_days - $leavesTaken->leaves_taken; //$leaveEntitlements->days_used;
        }
        $out['balance'] = $leaveEntitlements;
        $out['as_on_date']  = $date;
        $out['status']  = ($leaveEntitlements) ? true : false;
        $out['leaves'] = $leavesTaken;
        $out['leave_balance'] = $leaveBalance;
        $out['leave_entitlement_id'] = ($leaveEntitlements) ? $leaveEntitlements->id : 0;
        $out['active_leave_period'] = $active_leave_period;
        return response()->json($out);
    }

    public function getReportingEmployees($managerId)
    {
        $data = tEmployeeReportTo::where('manager_id', $managerId)
            ->selectRaw('GROUP_CONCAT(employee_id) as reporting_manager_ids')
            ->first();
        
        return $data;
    }

    public function getReportingToAdminEmployees($adminId)
    {
        $data1 = tEmployeeReportTo::where('manager_id', $adminId)
            ->selectRaw('GROUP_CONCAT(employee_id) as reporting_manager_ids')
            ->first();
        
        $data2 = Employee::leftJoin('t_employee_report_to', 't_employee_report_to.employee_id', 'employees.id')
        ->whereNull('t_employee_report_to.manager_id')
        ->selectRaw('GROUP_CONCAT(employees.id) as reporting_manager_ids')
        ->where('user_id', '!=', $adminId)
        ->first();
        $out1 = []; $out2 = [];
        if($data1)
            $out1 = explode(',', $data1->reporting_manager_ids);
        if($data2)
            $out2 = explode(',', $data2->reporting_manager_ids);

        return (array_merge($out1, $out2));
    }

    public function getReportingManagers($employeeId)
    {
        $data = tEmployeeReportTo::where('employee_id', $employeeId)
            ->selectRaw('GROUP_CONCAT(manager_id) as reporting_manager_ids')
            ->first();
        
        return $data;
    }

    public function adminAction(Request $request)
    {        
        $leaveStatusUpdateArr = (array) json_decode($request->leave_id_update);
        if(count($leaveStatusUpdateArr)) {
            $comments = $request->comments;
            foreach ($leaveStatusUpdateArr as $leave) {
                $leave_request_id = $leave->id;
                $status_id = $leave->status_id;

                $updateArr = [];
                $updateArr['status'] = $status_id;
                if($status_id == 2) {
                    $updateArr['approval_level'] = 1;
                    if(Auth::user()->hasRole('Admin')) {
                        $updateArr['approval_level'] = 2;
                    }                    
                }
                $leaveRequest = tLeaveRequest::where('id', $leave_request_id)->first();
                $updateFlag = true;
                //check before approve
                if($status_id == 2) {
                    $isLeaveExists = tLeave::where('t_leaves.date', '>=', $leaveRequest->from_date)
                        ->where('t_leaves.date', '<=', $leaveRequest->to_date)
                        ->where('employee_id', $leaveRequest->employee_id)
                        ->whereIn('status', [2])
                        ->whereNull('deleted_at')
                        ->first();
                    if($isLeaveExists) {
                        $updateFlag = false;
                        $status_id = $leaveRequest->status;
                    }
                }
                $failedToUpdate = ($updateFlag) ? '' : '(Failed)';
                    
                //update in leaves table
                tLeave::where('leave_request_id', $leave_request_id)->update($updateArr);
                // $leaveRequest = tLeaveRequest::where('id', $leave_request_id)->first();
                $leaveRequest->status = $status_id;
                $leaveRequest->save();

                $leaveStatus = mLeaveStatus::where('id', $status_id)->first();

            // =========== t_log table Start ===========
                $action = $leaveStatus->name;
                $send_by = getEmployeeId(Auth::user()->id);
                if(Auth::user()->hasRole('Manager')){
                    $allAdmins = getAllAdminUsers();
                    $send_to = $leaveRequest->employee_id.','.$allAdmins->admin_ids;
                }else if(Auth::user()->hasRole('Admin')){
                    $send_to = $leaveRequest->employee_id;
                }
                $module_id = $leaveRequest->id;
                $date = $leaveRequest->from_date.','.$leaveRequest->to_date;
                activityLog($action, "Leave", $send_by, $send_to, $module_id, $date);
            // =========== t_log table end =============

                $currentEmployeeDetails = $this->getEmployeeDetails(Auth::user()->id);
                //update in leave comments table
                tLeaveComment::insert(
                    [
                        'leave_id' => $leave_request_id,
                        'employee_id' => $currentEmployeeDetails->id, //manager id
                        'comments' => 'Updated to '.$leaveStatus->name. ' By '.Auth::user()->name.' '.$failedToUpdate
                    ]
                );
                if($comments) {
                    // Insert Feedback comments
                    tLeaveComment::insert(
                        [
                            'leave_id' => $leave_request_id,
                            'employee_id' => $currentEmployeeDetails->id, //manager id
                            'comments' => 'Feedback: '. $comments
                        ]
                    );
                }                
                
                //if cancelled or rejected update in the entitlement table
                if($status_id > 3) {
                    $leaves = tLeave::where('leave_request_id', $leave_request_id)
                            ->selectRaw('SUM(length_days) as days, entitlement_id')
                            ->first();

                    if($leaves && $leaves->entitlement_id) {
                        $entitlementDet = mLeaveEntitlement::where('id', $leaves->entitlement_id)->first();
                        $entitlementDet->days_used = $entitlementDet->days_used - $leaves->days;
                        $entitlementDet->save();
                    }                    
                }                
                
                //Send Email to Employee
                $toEmails = [];                
                $leaveEmployeeDetails = Employee::where('id', $leaveRequest->employee_id)->first();
                $details = [
                    'leave_date' => $leaveRequest->from_date.' to '. $leaveRequest->to_date,
                    'message'  =>  'Updated to '.$leaveStatus->name. ' By '.Auth::user()->name.' '.$failedToUpdate,
                    'employee_name' => $leaveEmployeeDetails->first_name.' '.$leaveEmployeeDetails->first_name
                ];        
                $toEmails[] = ['name' => $leaveEmployeeDetails->first_name.' '.$leaveEmployeeDetails->first_name, 'email' => $leaveEmployeeDetails->email];
        
                Mail::to($toEmails)->send(new LeaveApproveStatus($details));
                

            }

            return redirect()->back()->with('success', 'You updated leave status successfully!');
        }
        return redirect()->back();
    }

    public function getEmployeeDetails($userId) {
        return Employee::where('user_id', $userId)->first();
    }

    public function checkLeaveHasHolidays($dates)
    {
        $holiday = mHoliday::whereIn('date', $dates)->first();
        $recurring = false;
        //check for recurring dates
        foreach($dates as $date)
        {
           $recurringHoliday = mHoliday::whereRaw('DATE_FORMAT(date, "%m%d") = '. date("md", strtotime($date)))
                    ->where('recurring', 1)
                    ->first();
            if($recurringHoliday) {
                $recurring = true;
                break;
            }
        }
        return ($holiday || $recurring) ? true : false;
    }

    public function assign()
    {
        $userId = Auth::user()->id;
        $employee = Employee::where('user_id', $userId)->first();
        if(!$employee)
            return redirect('/');
        
        $assignLeave = true;
        //check entitlement is assigned for the current user
        $employeeId = $employee->id;
        $leaveEntitlements = NULL; 
        $leaveType = mLeaveType::all();
        $holidays = $this->getHolidays($employeeId);
        return view('leave/leave/apply_leave', compact('leaveType', 'leaveEntitlements', 'employeeId', 'assignLeave', 'holidays'));
    }

    public function getEmployeeHolidays(Request $request){

        $employeeId = '';
        if($request->employeeId != ''){
            $employeeId = $request->employeeId;
        }

        $employeeHolidays = $this->getHolidays($employeeId);
        return $employeeHolidays;
    }

    public function getHolidays($employeeId='')
    {
        $location_id = '';
        if($employeeId){
            $employee = Employee::where('id', $employeeId)->first();
            $location_id = $employee->company_location_id;
        }

        DB::connection()->enableQueryLog();

        $data = [];
        $data['holidays'] = mHoliday::selectRaw('GROUP_CONCAT(date) as date')
                                    ->when($location_id, function ($query, $location_id) {
                                        $query->where('operational_sub_unit_id', $location_id);
                                    })
                                    ->first();

        $currentYear = date('Y');
        $nextYear = $currentYear+1;
        $previousYear = $currentYear - 1;
        $data['recurring_holidays'] = mHoliday::where('recurring', 1)
                                        ->selectRaw(' GROUP_CONCAT( DATE_FORMAT(date, "'.$previousYear.'-%m-%d")) as previous')
                                        ->selectRaw(' GROUP_CONCAT( DATE_FORMAT(date, "'.$nextYear.'-%m-%d")) as next')
                                        ->selectRaw(' GROUP_CONCAT( DATE_FORMAT(date, "'.$currentYear.'-%m-%d")) as current')
                                        ->when($location_id, function ($query, $location_id) {
                                            $query->where('operational_sub_unit_id', $location_id);
                                        })
                                        ->first();
        $holidays = $data;
        $disableHolidaysArr = [];
        if($holidays) {                
            $disableHolidaysArr1 = explode(',', $holidays['holidays']->date);
            $disableHolidaysArr2 = explode(',', $holidays['recurring_holidays']->previous);
            $disableHolidaysArr3 = explode(',', $holidays['recurring_holidays']->current);
            $disableHolidaysArr4 = explode(',', $holidays['recurring_holidays']->next);
            $disableHolidaysArr1 = array_merge($disableHolidaysArr1, $disableHolidaysArr2, $disableHolidaysArr3, $disableHolidaysArr4);
            $disableHolidaysArr = $disableHolidaysArr1;
        }

        // dd(DB::getQueryLog());
        // dd($disableHolidaysArr);
        return $disableHolidaysArr;
    }

    public function getActiveLeavePeriod($employeeId) {
        //get current user location
        $employee = Employee::where('id', $employeeId)->first();

        $active_leave_period = mLeavePeriod::whereRaw('(DATE_FORMAT(start_period, "%Y") = '. date('Y').' OR DATE_FORMAT(end_period, "%Y") = '. date('Y') .')')
            ->where('sub_unit_id', $employee->company_location_id)
            ->where('status', 1)
            ->first();
        return $active_leave_period;
    }
}
