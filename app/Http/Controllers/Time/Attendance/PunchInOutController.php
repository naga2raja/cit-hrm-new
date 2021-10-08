<?php

namespace App\Http\Controllers\Time\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\mAttendanceConfigure;
use App\tPunchInOut;
use Auth;
use DateTime;
use App\Session;
use Carbon\Carbon;
use App\Employee;
use App\Http\Controllers\Leave\Leave\LeaveController;
use Mail;
use App\Mail\AttendanceStatusMail;


class PunchInOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $leaveCtrl = new LeaveController;
        $currentEmployeeDetails = $leaveCtrl->getEmployeeDetails(Auth::user()->id);
        $employee_id = $currentEmployeeDetails->id;
        $data = tPunchInOut::where('t_punch_in_outs.employee_id', $employee_id)
            ->join('employees', 't_punch_in_outs.employee_id', 'employees.id')
            ->selectRaw('TIMESTAMPDIFF(MINUTE, t_punch_in_outs.punch_in_user_time, t_punch_in_outs.punch_out_user_time) as duration')
            ->selectRaw('t_punch_in_outs.id, t_punch_in_outs.employee_id, punch_in_user_time, punch_out_user_time, t_punch_in_outs.punch_in_note, t_punch_in_outs.punch_out_note, t_punch_in_outs.status')            
            ->when(request()->filled('date'), function ($query) {
                $date = DateTime::createFromFormat('d/m/Y', request('date'));
                $date = $date->format('Y-m-d');
                $query->whereRaw('DATE_FORMAT(t_punch_in_outs.punch_in_user_time, "%Y-%m-%d") = "'. $date.'"');
            })
            ->selectRaw('CONCAT(employees.first_name, " ", employees.last_name) as emp_name, t_punch_in_outs.is_import')
            ->orderBy('t_punch_in_outs.id', 'DESC')
            ->paginate(30);
        
        $userRole = 'Admin'; 
        if($user->hasRole('Manager')) {
            $userRole = 'Manager';
        } elseif($user->hasRole('Employee')) {
            $userRole = 'Employee';
        } 
        // dd($data);
        return view('time/attendance/punch/list', compact('data', 'userRole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $enabledFlag = $this->checkPuchchInOutEnable();        
        // $punch = mAttendanceConfigure::select('*')->where('action_flag', 1)->where('id', 1)->get();

        date_default_timezone_set('Asia/Kolkata');
        $current_date = date('d-m-Y');
        $current_time = date('H:i');
        date_default_timezone_set('UTC');

        $leaveCtrl = new LeaveController;
        $currentEmployeeDetails = $leaveCtrl->getEmployeeDetails(Auth::user()->id);
        $employee_id = $currentEmployeeDetails->id;

        //check if exists for the current date
        $in_date = DateTime::createFromFormat('Y-m-d', date('Y-m-d')); 
        $in_date = $in_date->format('Y-m-d');        
        $isExists = tPunchInOut::where('employee_id', $employee_id)
            ->whereRaw(' DATE_FORMAT(punch_in_utc_time, "%Y-%m-%d") = "'.$in_date.'" AND (DATE_FORMAT(punch_out_utc_time, "%Y-%m-%d") = "0000-00-00" OR DATE_FORMAT(punch_out_utc_time, "%Y-%m-%d") IS NULL )')
            ->first();
        if($isExists)
            return redirect()->route('punch.edit', $isExists->id);

        if($enabledFlag || Auth::User()->id == 1){
            $myPermissions = $this->attendancePermission();            
            $edit_date_time = $myPermissions['edit_date_time'];
            return view('time/attendance/punch/add', compact('current_date', 'current_time', 'employee_id', 'edit_date_time'));
        } else{
            return redirect('home');
        }     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'in_time' => 'date_format:'.'h:i a',
            'note' => 'nullable|string|max:255',
        ]);        

        // convertion of date format
        if($request->input('in_date') != "" && $request->input('in_time') != ""){
            $in_date = DateTime::createFromFormat('d/m/Y', $request->input('in_date'));
            $in_date = $in_date->format('Y-m-d');
            $login_date = $in_date.' '.$request->in_time;
            $login_date = date('Y-m-d H:i:s', strtotime($login_date));
        }

        $utc_date = Carbon::createFromFormat('Y-m-d H:i:s', $login_date, 'Asia/Kolkata');
        $utc_date->setTimezone('UTC');

        $time_diff =  $utc_date->diff($login_date)->format('%H.%I');

        $punch_in = tPunchInOut::create([
            'employee_id' => $request->employee_id,
            'punch_in_utc_time' => $utc_date,
            'punch_in_note' => (empty($request->note) ? '' : $request->note),
            'punch_in_time_offset' => $time_diff,
            'punch_in_user_time' => (empty($login_date) ? '' : $login_date),
            'state' => 'PUNCHED IN',
            'updated_by' => Auth::user()->id,
            'created_by' => Auth::user()->id
        ]);

        return redirect()->route('punch.edit', $punch_in->id)->with('success', 'Punched in successfully!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = tPunchInOut::where('id', $id)
            ->selectRaw('id, employee_id, punch_in_note, punch_out_note, DATE_FORMAT(punch_in_user_time, "%d/%m/%Y") as punch_in, DATE_FORMAT(punch_out_user_time, "%d/%m/%Y") as punch_out, DATE_FORMAT(punch_in_user_time, "%h:%i %p") as in_time, DATE_FORMAT(punch_out_user_time, "%h:%i %p") as out_time, comments, status, created_at ')
            ->first();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $enabledFlag = $this->checkPuchchInOutEnable();
        // $punch = mAttendanceConfigure::select('*')->where('action_flag', 1)->where('id', 1)->get();

        date_default_timezone_set('Asia/Kolkata');
        $current_date = date('d-m-Y');
        $current_time = date('H:i');
        date_default_timezone_set('UTC');

        $punch_in = tPunchInOut::where('id', $id)->get();

        if($enabledFlag){
            $leaveCtrl = new LeaveController;
            $currentEmployeeDetails = $leaveCtrl->getEmployeeDetails(Auth::user()->id);
            $employee_id = $currentEmployeeDetails->id;
            
            $myPermissions = $this->attendancePermission();            
            $edit_date_time = $myPermissions['edit_date_time'];

            return view('time/attendance/punch/edit', compact('punch_in', 'current_date', 'current_time', 'employee_id', 'edit_date_time'));
        } else{
            return redirect('home');
        }     

        
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
        $validated = $request->validate([
            'out_time' => 'date_format:'.'h:i a',
            'note' => 'nullable|string|max:255',
        ]);

        $logout_date = '';
        // convertion of date format
        if($request->input('out_date') != "" && $request->input('out_time') != ""){
            $out_date = DateTime::createFromFormat('d/m/Y', $request->input('out_date'));
            $out_date = $out_date->format('Y-m-d');
            $logout_date = $out_date.' '.$request->out_time;
            $logout_date = date('Y-m-d H:i:s', strtotime($logout_date));
        }

        $utc_date = Carbon::createFromFormat('Y-m-d H:i:s', $logout_date, 'Asia/Kolkata'); // Keep as Asia/Kolkata Timezone
        $utc_date->setTimezone('UTC'); //converts to UTC format
        // dd($utc_date->toDateTimeString());

        $time_diff = $utc_date->diff($logout_date)->format('%H.%I');

        $utc_date = $utc_date->toDateTimeString();

        $punch = tPunchInOut::find($id);
        if(strtotime($punch->punch_in_user_time) > strtotime($logout_date)) {
            return redirect()->back()->with('error', 'Punch out time shout be greater than punched in time!');
        }
        // dd($punch, $logout_date, $utc_date);
        $punch->punch_out_utc_time = $utc_date;
        $punch->punch_out_note = $request->note;
        $punch->punch_out_time_offset = $time_diff;
        $punch->punch_out_user_time = $logout_date;
        $punch->state = 'PUNCHED OUT';
        $punch->updated_by = Auth::user()->id;
        if(Auth::user()->hasRole('Admin')) {
            $punch->status = 2;
        }
        $punch->save();

        return redirect()->route('punch.index')->with('success', 'Punched out successfully!' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = tPunchInOut::where('id', $id)->first();
        $employee->delete();        
        return redirect()->back()->with('success','Deleted Successfully');
    }

    public function checkPuchchInOutEnable()
    {
        $enabledFlag = false;
        //check punch time module enabled for all
        $empSettings = mAttendanceConfigure::where('id', 4)->first();
        if($empSettings->action_flag) {
            $enabledFlag = true;
        } else {
            $userId = Auth::User()->id;
            $employee = Employee::where('user_id', $userId)->first();

            //check punch in/out enabled for specific employees
            if($empSettings) {
                $empIds = explode(',', $empSettings->employee_ids);
                if(in_array($employee->id, $empIds)) {
                    $enabledFlag = true;
                }
            }                
        }
        return $enabledFlag;
    }

    public function attendancePermission()
    {
        $out = [];
        $out['edit_date_time'] = mAttendanceConfigure::where('id', 1)->pluck('action_flag')->first();
        $out['manage_own_record'] = mAttendanceConfigure::where('id', 2)->pluck('action_flag')->first();
        $out['manage_emp_record'] = mAttendanceConfigure::where('id', 3)->pluck('action_flag')->first();
        return $out;
    }

    public function deleteMultiple(Request $request)
    {
        // deleteMultiple
        if($request->delete_ids) {
            tPunchInOut::whereIn('id', $request->delete_ids)
                ->where('status', 0)
                ->get()
                ->map(function($emp) {
                    $emp->delete();
                });
            return true;
        } else {   
            return false;
        }
    }

    public function updateAjax(Request $request)
    {
        $id = $request->punch_id;
        $punch_in_date = $request->punch_in_date;
        $punch_out_date = $request->punch_out_date;

        $in_date = DateTime::createFromFormat('d/m/Y', $punch_in_date);
        $in_date = $in_date->format('Y-m-d');
        $login_date = $in_date.' '.$request->in_time;
        $login_date = date('Y-m-d H:i:s', strtotime($login_date));

        $in_utc_date = Carbon::createFromFormat('Y-m-d H:i:s', $login_date, 'Asia/Kolkata'); // Keep as Asia/Kolkata Timezone
        $in_utc_date->setTimezone('UTC'); //converts to UTC format
        $in_time_diff = $in_utc_date->diff($login_date)->format('%H.%I');
        $in_utc_date = $in_utc_date->toDateTimeString();


        $out_date = DateTime::createFromFormat('d/m/Y', $punch_out_date);
        $out_date = $out_date->format('Y-m-d');
        $logout_date = $out_date.' '.$request->out_time;
        $logout_date = date('Y-m-d H:i:s', strtotime($logout_date));

        $out_utc_date = Carbon::createFromFormat('Y-m-d H:i:s', $logout_date, 'Asia/Kolkata'); // Keep as Asia/Kolkata Timezone
        $out_utc_date->setTimezone('UTC'); //converts to UTC format
        $out_time_diff = $out_utc_date->diff($logout_date)->format('%H.%I');
        $out_utc_date = $out_utc_date->toDateTimeString();

        if(strtotime($logout_date) < strtotime($login_date)) {
            return 'error';
        }

        $punchInfo = tPunchInOut::where('id', $id)->first();
        $punchInfo->punch_in_user_time = $login_date;
        $punchInfo->punch_in_note = $request->punch_in_note;
        $punchInfo->punch_in_time_offset = $in_time_diff;
        $punchInfo->punch_in_user_time = $login_date;                
        
        $punchInfo->punch_out_user_time = $logout_date;
        $punchInfo->punch_out_utc_time = $out_utc_date;
        $punchInfo->punch_out_note = $request->punch_out_note;
        $punchInfo->punch_out_time_offset = $out_time_diff;
        $punchInfo->state = 'PUNCHED OUT';

        if(Auth::user()->hasRole('Admin')) {
            $punchInfo->status = 2;
        }

        $punchInfo->updated_by = Auth::user()->id;
        $punchInfo->save();
        return $punchInfo;
    }

    public function updateStatusAjax(Request $request) {
        $id = $request->id;
        $punchInfo = tPunchInOut::where('id', $id)->first();
        $comments = $punchInfo->comments;
        $punchInfo->status = $request->status;
        $punchInfo->updated_by = Auth::user()->id;
        $punchInfo->comments = $comments. '<br> <b>'.Auth::user()->name .'</b> - Sent to <b> Approval </b> on ' . getCurrentTime(); 
        $punchInfo->save();

        // =========== t_log table Start ===========
            $action = "Submitted";
            $send_by = getEmployeeId(Auth::user()->id);
            $send_to = getMyReportingManager($punchInfo->employee_id);
            $module_id = $punchInfo->id;
            $date = date('Y-m-d', strtotime($punchInfo->punch_in_user_time));
            activityLog($action, "Attendance", $send_by, $send_to, $module_id, $date);
        // =========== t_log table end =============

        return $punchInfo;
    }

    public function getEmployeeRecords(Request $request) {
        $user = Auth::user();
        $leaveCtrl = new LeaveController;
        $currentEmployeeDetails = $leaveCtrl->getEmployeeDetails(Auth::user()->id);
        $employeeId = $currentEmployeeDetails->id;

        $userRole = 'Admin'; $empIds = [];
        if($user->hasRole('Manager')) {
            $userRole = 'Manager';
            //Find Reporting Employees Ids
            $reportTo = $leaveCtrl->getReportingEmployees($employeeId);
            if($reportTo)
                $empIds = explode(',', $reportTo->reporting_manager_ids);
        } else {
            $empIds = $leaveCtrl->getReportingToAdminEmployees($user->id);
        }
        
        $data = tPunchInOut::join('employees', 't_punch_in_outs.employee_id', 'employees.id')
            ->selectRaw('TIMESTAMPDIFF(MINUTE, t_punch_in_outs.punch_in_user_time, t_punch_in_outs.punch_out_user_time) as duration')
            ->selectRaw('t_punch_in_outs.id, t_punch_in_outs.employee_id, punch_in_user_time, punch_out_user_time, t_punch_in_outs.punch_in_note, t_punch_in_outs.punch_out_note, t_punch_in_outs.status')
            ->when(request()->filled('date'), function ($query) {
                $date = DateTime::createFromFormat('d/m/Y', request('date'));
                $date = $date->format('Y-m-d');
                $query->whereRaw('DATE_FORMAT(t_punch_in_outs.punch_in_user_time, "%Y-%m-%d") = "'. $date.'"');
            });        
            if(count($empIds)) {
                $data = $data->whereIn('t_punch_in_outs.employee_id', $empIds);
            }
            $data = $data->selectRaw('CONCAT(employees.first_name, " ", employees.last_name) as emp_name, t_punch_in_outs.is_import')
                    ->where('t_punch_in_outs.status', '>', 0)
                    ->orderBy('t_punch_in_outs.id', 'DESC')
                    ->paginate(30);
        return view('time/attendance/punch/list', compact('data', 'userRole'));
    }

    public function adminAction(Request $request)
    {
        $leaveCtrl = new LeaveController;
        $userRole = 'Admin';
        if(Auth::user()->hasRole('Manager'))
            $userRole = 'Manager';

        $attendanceStatusUpdateArr = (array) json_decode($request->punch_id_update);        
        
        if(count($attendanceStatusUpdateArr)) {
            $comments = $request->comments;
            foreach($attendanceStatusUpdateArr as $punch) {
                $punch_id = $punch->id;
                $status_id = $punch->status_id;
                $newPunchStatus = currentPunchStatus($status_id);
                $feedbackComment = '';
                if($comments) {
                    $feedbackComment .= '<br> Feedback: '.$comments;
                }

                $punchInfo = tPunchInOut::where('id', $punch_id)->first();
                $punchInfo->status = $status_id;
                $punchInfo->comments = $punchInfo->comments . ' <hr> <b>'.Auth::user()->name .'('. $userRole .')</b> - Updated to <b>'. $newPunchStatus.'</b> on ' . getCurrentTime() .' '.$feedbackComment;
                $punchInfo->save();

                // =========== t_log table Start ===========
                 $action = $newPunchStatus;
                 $send_by = getEmployeeId(Auth::user()->id);
                 $send_to = $punchInfo->employee_id;
                 $module_id = $punchInfo->id;
                 $date = date('Y-m-d', strtotime($punchInfo->punch_in_user_time));
                 activityLog($action, "Attendance", $send_by, $send_to, $module_id, $date);
                // =========== t_log table end =============

                //Send Email to Employee
                $toEmails = [];
                $employeeDetails = Employee::where('id', $punchInfo->employee_id)->first();
                // dd($employeeDetails, $punchInfo->employee_id);
                $details = [
                    'date' => $punchInfo->punch_in_user_time.' to '. $punchInfo->punch_out_user_time,
                    'message'  =>  'Updated to <b>'.$newPunchStatus. '</b> By '.Auth::user()->name,
                    'employee_name' => $employeeDetails->first_name.' '.$employeeDetails->first_name
                ]; 
                $toEmails[] = ['name' => $employeeDetails->first_name.' '.$employeeDetails->first_name, 'email' => $employeeDetails->email];
                // Mail::to($toEmails)->send(new AttendanceStatusMail($details));                
            }
        }
        return redirect()->back()->with('success', 'You updated Attendance status successfully!');
    }

}
