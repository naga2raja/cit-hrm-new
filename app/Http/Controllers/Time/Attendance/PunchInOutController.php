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


class PunchInOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaveCtrl = new LeaveController;
        $currentEmployeeDetails = $leaveCtrl->getEmployeeDetails(Auth::user()->id);
        $employee_id = $currentEmployeeDetails->id;
        $data = tPunchInOut::where('employee_id', $employee_id)
            ->selectRaw('TIMESTAMPDIFF(MINUTE, punch_in_user_time, punch_out_user_time) as duration')
            ->selectRaw('employee_id, punch_in_user_time, punch_out_user_time')
            ->get();
        return view('time/attendance/punch/list', compact('data'));
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
            ->whereRaw(' DATE_FORMAT(punch_in_utc_time, "%Y-%m-%d") = "'.$in_date.'" AND (DATE_FORMAT(punch_in_utc_time, "%Y-%m-%d") = "0000-00-00" OR DATE_FORMAT(punch_in_utc_time, "%Y-%m-%d") = NULL )')
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
            'in_time' => 'date_format:'.'H:i',
            'note' => 'nullable|string|max:255',
        ]);

        // convertion of date format
        if($request->input('in_date') != "" && $request->input('in_time') != ""){
            $in_date = DateTime::createFromFormat('d/m/Y', $request->input('in_date'));
            $in_date = $in_date->format('Y-m-d');
            $login_date = $in_date.' '.$request->in_time.':00';
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
            'out_time' => 'date_format:'.'H:i',
            'note' => 'nullable|string|max:255',
        ]);

        $logout_date = '';
        // convertion of date format
        if($request->input('out_date') != "" && $request->input('out_time') != ""){
            $out_date = DateTime::createFromFormat('d/m/Y', $request->input('out_date'));
            $out_date = $out_date->format('Y-m-d');
            $logout_date = $out_date.' '.$request->out_time.':00';
            // $logout_date = date('Y-m-d H:i:s', strtotime($logout_date));
        }

        $utc_date = Carbon::createFromFormat('Y-m-d H:i:s', $logout_date, 'Asia/Kolkata'); // Keep as Asia/Kolkata Timezone
        $utc_date->setTimezone('UTC'); //converts to UTC format
        // dd($utc_date->toDateTimeString());

        $time_diff = $utc_date->diff($logout_date)->format('%H.%I');

        $utc_date = $utc_date->toDateTimeString();

        $punch = tPunchInOut::find($id);
        $punch->punch_out_utc_time = $utc_date;
        $punch->punch_out_note = $request->note;
        $punch->punch_out_time_offset = $time_diff;
        $punch->punch_out_user_time = $logout_date;
        $punch->state = 'PUNCHED OUT';
        $punch->save();

        return redirect()->route('punch.create')->with('success', 'Punched out successfully!' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

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
}
