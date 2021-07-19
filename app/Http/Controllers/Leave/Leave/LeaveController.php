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
use App\tEmployeeReportTo;

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
            ->where('t_leave_requests.employee_id', $employeeId)
            ->select('t_leave_requests.*', 'm_leave_types.name', 't_leaves.leave_duration', 't_leaves.length_days')
            ->selectRaw('datediff(t_leave_requests.to_date, t_leave_requests.from_date) as leave_days, m_leave_status.name as leave_status')
            ->when(request()->filled('status'), function ($query) {
                $query->where('t_leave_requests.status', request('status'));
            })
            ->when(request()->filled('from_date'), function ($query) {
                $query->where('t_leave_requests.from_date', '>=', request('from_date'));
            })
            ->when(request()->filled('to_date'), function ($query) {
                $query->where('t_leave_requests.to_date', '<=', request('to_date'));
            })
            ->groupBy('t_leave_requests.id')
            ->paginate(10); 
            // dd($myLeaves);

        return view('leave/leave/my_leaves', compact('leaveStatus', 'myLeaves'));   
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
            return view('leave/leave/apply_leave', compact('leaveType', 'leaveEntitlements', 'employeeId'));            
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
        // dd($request->all());
        $fromDate = str_replace('/', '-', $request->from_date);
        $fromDate = date('Y-m-d', strtotime($fromDate));
        $toDate = str_replace('/', '-', $request->to_date);
        $toDate = date('Y-m-d', strtotime($toDate));

        $leaveDates = CarbonPeriod::create($fromDate, $toDate);
        // Convert the period to an array of dates
        $dates = $leaveDates->toArray();

        $employee = Employee::where('user_id', Auth::user()->id)->first();
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

        // insert apply Leave
        $leaveRequest = new tLeaveRequest;
        $leaveRequest->employee_id = $employeeId;
        $leaveRequest->leave_type_id = $request->leave_type_id;
        $leaveRequest->from_date = date('Y-m-d', strtotime($fromDate));
        $leaveRequest->to_date = date('Y-m-d', strtotime($toDate));
        $leaveRequest->status = 1;
        $leaveRequest->comments = $request->reason;
        $leaveRequest->save();

        //find Leave Length days
        $lengthDay = 1;
        $lengthHour = 8;
        if($request->leave_duration == 'morning' || $request->leave_duration == 'evening') {
            $lengthDay = 0.5;
            $lengthHour = 4;
        }
        
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
            $leave->status = 1;
            $leave->approval_level = 0;
            $leave->leave_type_id = $request->leave_type_id;
            $leave->save();
        }

        //updated used leaves count
        $leaveEntitlements->days_used = $leaveEntitlements->days_used - $request->number_of_days;
        $leaveEntitlements->save();
        
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

        //send mail notification to Manager and admin
        $details = [
            'employee_name' => $employee->first_name . ' '.$employee->last_name,
            'date'  =>  $fromDate . ' to '. $toDate
        ];        
        $managerEmails[] = ['name' => 'Admin', 'email' => 'cithrm@yopmail.com'];

        Mail::to($managerEmails)->send(new ApplyLeaveRequestMail($details));
        
        return redirect()->back()->with('success', 'You applied successfully!');      
                
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }

    public function getLeaveList(Request $request)
    {
        $user = Auth::user();
        $empIds = [];
        if($user->hasRole('Manager')) {
            //Find Reporting Employees Ids
            $reportTo = $this->getReportingEmployees(Auth::user()->id);
            if($reportTo)
                $empIds = explode(',', $reportTo->reporting_manager_ids);
        } else {    
            dd('Admin');
        }

        $leaveStatus = mLeaveStatus::get();

        $employee = Employee::where('user_id', Auth::user()->id)->first();
        $employeeId = $employee->id;
        $myLeaves = tLeaveRequest::join('m_leave_types', 'm_leave_types.id', 't_leave_requests.leave_type_id')
            ->join('t_leaves', 't_leaves.leave_request_id', 't_leave_requests.id')
            ->join('m_leave_status', 't_leave_requests.status', 'm_leave_status.id')
            ->where('t_leave_requests.employee_id', '!=', $employeeId);
        if(count($empIds)) {
            $myLeaves = $myLeaves->whereIn('t_leave_requests.employee_id', $empIds);
            // dd($empIds);
        }

        $myLeaves = $myLeaves->select('t_leave_requests.*', 'm_leave_types.name', 't_leaves.leave_duration', 't_leaves.length_days')
            ->selectRaw('datediff(t_leave_requests.to_date, t_leave_requests.from_date) as leave_days, m_leave_status.name as leave_status')
            ->when(request()->filled('status'), function ($query) {
                $query->where('t_leave_requests.status', request('status'));
            })
            ->when(request()->filled('from_date'), function ($query) {
                $query->where('t_leave_requests.from_date', '>=', request('from_date'));
            })
            ->when(request()->filled('to_date'), function ($query) {
                $query->where('t_leave_requests.to_date', '<=', request('to_date'));
            })
            ->groupBy('t_leave_requests.id')
            ->paginate(10); 

        return view('leave/leave/my_leaves', compact('leaveStatus', 'myLeaves'));           
    }

    public function getLeaveBalance(Request $request)
    {
        $employeeId = $request->employee_id;
        $leaveTypeId = $request->leave_type_id;
        $date = date('Y-m-d');
        $out = [];

        //Get Leave Entitlements for the date
        $leaveEntitlements = mLeaveEntitlement::where('emp_number', $employeeId)
                                ->whereRaw(' from_date <= "'.$date.'" AND to_date >= "'.$date.'"')
                                ->where('leave_type_id', $leaveTypeId)
                                ->first();
        //find used leaves
        $leavesTaken = tLeave::where('employee_id', $employeeId)
                    ->where('leave_type_id', $leaveTypeId)
                    ->whereIn('status', [1,2,3])
                    ->selectraw('SUM(length_days) as leaves_taken')
                    ->first();

        $leaveBalance = 0;
        if($leaveEntitlements) {
            $leaveBalance = $leaveEntitlements->no_of_days - $leavesTaken->leaves_taken; //$leaveEntitlements->days_used;
        }
        $out['balance'] = $leaveEntitlements;
        $out['as_on_date']  = $date;
        $out['status']  = ($leaveEntitlements) ? true : false;
        $out['leaves'] = $leavesTaken;
        $out['leave_balance'] = $leaveBalance;
        $out['leave_entitlement_id'] = ($leaveEntitlements) ? $leaveEntitlements->id : 0;;
        return response()->json($out);
    }

    public function getReportingEmployees($managerId)
    {
        $data = tEmployeeReportTo::where('manager_id', $managerId)
            ->selectRaw('GROUP_CONCAT(employee_id) as reporting_manager_ids')
            ->first();
        
        return $data;
    }

    public function getReportingManagers($employeeId)
    {
        $data = tEmployeeReportTo::where('employee_id', $employeeId)
            ->selectRaw('GROUP_CONCAT(manager_id) as reporting_manager_ids')
            ->first();
        
        return $data;
    }
}
