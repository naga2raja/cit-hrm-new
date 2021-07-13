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


class PunchInOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $employee_id = Auth::User()->id;
        $punch = mAttendanceConfigure::select('*')->where('action_flag', 1)->where('id', 1)->get();

        date_default_timezone_set('Asia/Kolkata');
        $current_date = date('d-m-Y');
        $current_time = date('H:i');
        date_default_timezone_set('UTC');

        if(count($punch) > 0){
            return view('time/attendance/punch/add', compact('current_date', 'current_time', 'employee_id'));
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

        $employee_id = Auth::User()->id;

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
        $employee_id = Auth::User()->id;
        $punch = mAttendanceConfigure::select('*')->where('action_flag', 1)->where('id', 1)->get();

        date_default_timezone_set('Asia/Kolkata');
        $current_date = date('d-m-Y');
        $current_time = date('H:i');
        date_default_timezone_set('UTC');

        $punch_in = tPunchInOut::where('id', $id)->get();

        if(count($punch) > 0){
            return view('time/attendance/punch/edit', compact('punch_in', 'current_date', 'current_time', 'employee_id'));
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

        // convertion of date format
        if($request->input('out_date') != "" && $request->input('out_time') != ""){
            $out_date = DateTime::createFromFormat('d/m/Y', $request->input('out_date'));
            $out_date = $out_date->format('Y-m-d');
            $logout_date = $out_date.' '.$request->out_time.':00';
        }

        $utc_date = Carbon::createFromFormat('Y-m-d H:i:s', $logout_date, 'Asia/Kolkata');
        $utc_date->setTimezone('UTC');

        $time_diff =  $utc_date->diff($logout_date)->format('%H.%I');

        $punch = tPunchInOut::find($id);
        $punch->punch_out_utc_time = $utc_date;
        $punch->punch_out_note = (empty($request->note) ? '' : $request->note);
        $punch->punch_out_time_offset = $time_diff;
        $punch->punch_out_user_time = (empty($logout_date) ? '' : $logout_date);
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
}
