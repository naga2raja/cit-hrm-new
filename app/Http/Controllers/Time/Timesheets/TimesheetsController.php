<?php

namespace App\Http\Controllers\Time\Timesheets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Employee;
use App\tTimesheetItem;
use APP\tActivity;
use Carbon\Carbon;
use DateTime;
use Session;
use DB;


class TimesheetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::User()->id;
        $employees = Employee::where('user_id', $user_id)->first();

        $my_timesheets = [];
        if($employees){
            $employees_id = $employees->id;
            $my_timesheets = tTimesheetItem::select('t_timesheet_items.*', 't_timesheet_items.id as timesheet_id', 'employees.*', 'employees.id as employee_id')
                    ->join('employees', 'employees.id', 't_timesheet_items.employee_id')
                    ->when(filled($employees_id), function($query) use ($employees_id) {
                        $query->where('t_timesheet_items.employee_id', $employees_id);
                    })
                    ->selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name')
                    ->with('projectName', 'activityName')
                    ->orderBy('t_timesheet_items.date', 'asc')
                    ->get();
        }
        // dd($my_timesheets);

        return view('time/timesheets/my_timesheets/list', compact('my_timesheets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('time/timesheets/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array();
        parse_str($request->data, $data);        
        // dd($data['timeItem'][0]["'project_name'"]);
        dd($data['date']);

        // duplicate check
        $isExists = tTimesheetItem::where('date', $data['date'])
                                    ->where('employee_id', $data['employee_id'])
                                    ->first();
        // if($isExists) {
        //     // update
        //     $msg = "User Updated";
        //     $users = tTimesheetItem::find($isExists->id);
        //     $users->name = $emp->name;
        //     if($request->input('generatePassword') == 'on'){
        //         $users->password = Hash::make($request->input('password'));
        //         $msg .= " with Username: ".$request->input('email')." Password: ".$request->input('password');
        //     }
        //     $users->save();
        //     $users->syncRoles($request->input('role'));
        // }else{
        //     // create
        //     $user = User::create([
        //         'name'  => $emp->name,
        //         'email'  => $request->input('email'),
        //         'password' => Hash::make($request->input('password'))
        //     ]);
        //     $user->assignRole($request->input('role'));
        //     // update user_id in employee table
        //     if($user){
        //         $employee = Employee::where('email', $request->input('email'))
        //                             ->update(array('user_id' => $user->id));
        //     }
        //     $msg = "User Added with Username: ".$request->input('email')." Password: ".$request->input('password');
        // }
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
        $my_timesheets = tTimesheetItem::find($id);
        return view('time/timesheets/edit', compact('my_timesheets'));
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

    public function getMyTimeSheets(Request $request){
        $user_id = Auth::User()->id;
        $employees = Employee::where('user_id', $user_id)->first();

        $date = str_replace('/', '-', $request->selected_date);
        $key = $request->key;

        $my_timesheets = [];
        if($employees){
            DB::connection()->enableQueryLog();

            $employees_id = $employees->id;            
            $my_timesheets = tTimesheetItem::select('t_timesheet_items.*', 't_timesheet_items.id as timesheet_id', 'employees.*', 'employees.id as employee_id')
                    ->join('employees', 'employees.id', 't_timesheet_items.employee_id')
                    ->when(filled($employees_id), function($query) use ($employees_id) {
                        $query->where('t_timesheet_items.employee_id', $employees_id);
                    })
                    ->when(filled($date), function($query) use ($date, $key) {
                        if($key == "daily"){
                            $date = date('Y-m-d', strtotime($date));
                            $query->where('t_timesheet_items.date', $date);
                        }
                        else if($key == "weekly"){
                            $week = explode(" - ", $date);
                            $from = date('Y-m-d', strtotime($week[0]));
                            $to = date('Y-m-d', strtotime($week[1]));
                            $query->whereBetween('date', [$from, $to])->get();;
                        }
                        else if($key == "monthly"){
                            $month = date('m', strtotime($date));
                            $year = date('Y', strtotime($date));
                            $query->whereMonth('date', '=', $month)
                                  ->whereYear('date', '=', $year);
                        }
                    })
                    ->selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name')
                    ->with('projectName', 'activityName')
                    ->orderBy('t_timesheet_items.date', 'asc')
                    ->get();
            // dd(DB::getQueryLog());
        }
        return response()->json($my_timesheets);
    }
}
