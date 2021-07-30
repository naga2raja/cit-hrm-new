<?php

namespace App\Http\Controllers\Time\Timesheets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Employee;
use App\tTimesheet;
use App\tTimesheetItem;
use APP\tActivity;
use Carbon\Carbon;
use DateTime;
use Session;
use DB;


class MyTimesheetsController extends Controller
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
            $employee_id = $employees->id;
            $my_timesheets = tTimesheetItem::select('t_timesheet_items.*', 't_timesheet_items.id as timesheet_id', 'employees.*', 'employees.id as employee_id')
                    ->join('employees', 'employees.id', 't_timesheet_items.employee_id')
                    ->when(filled($employee_id), function($query) use ($employee_id) {
                        $query->where('t_timesheet_items.employee_id', $employee_id);
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $timesheet = tTimesheet::where('id', $id)->first();
        $timesheet->delete();
        $timesheet_item = tTimesheetItem::where('timesheet_id', $id)->first();
        $timesheet_item->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }

    public function updateStatusAjax(Request $request) {
        $id = $request->id;
        $timesheetInfo = tTimesheet::where('id', $id)->first();
        $comments = $timesheetInfo->comments;
        $timesheetInfo->status = $request->status;
        $timesheetInfo->updated_by = Auth::user()->id;
        $timesheetInfo->comments = $comments. '<br> <b>'.Auth::user()->name .'</b> - Sent to <b> Approval </b> on ' . getCurrentTime(); 
        $timesheetInfo->save();
        return $timesheetInfo;
    }

    public function getMyTimeSheets(Request $request){
        $user = Auth::user();
        $employees = Employee::where('user_id', Auth::user()->id)->first();

        $project_id = $request->project_id;
        $date = str_replace('/', '-', $request->selected_date);
        $key = $request->key;

        $my_timesheets = [];
        if($employees){
            DB::connection()->enableQueryLog();

            $employee_id = $employees->id;            
            $my_timesheets = tTimesheet::select('t_timesheets.*')
                                ->join('employees', 'employees.id', 't_timesheets.employee_id')
                                ->join('model_has_roles', 'model_has_roles.model_id', 'employees.user_id')
                                ->join('roles', 'roles.id', 'model_has_roles.role_id')
                                ->when(filled($employee_id), function($query) use ($employee_id) {
                                    $query->where('t_timesheets.employee_id', $employee_id);
                                })
                                ->when(filled($date), function($query) use ($date, $key) {
                                    if($key == "daily"){
                                        $date = date('Y-m-d', strtotime($date));
                                        $query->where('t_timesheets.start_date', $date);
                                    }
                                    else if($key == "weekly"){
                                        $week = explode(" - ", $date);
                                        $from = date('Y-m-d', strtotime($week[0]));
                                        $to = date('Y-m-d', strtotime($week[1]));
                                        $query->whereBetween('t_timesheets.start_date', [$from, $to])->get();;
                                    }
                                    else if($key == "monthly"){
                                        $month = date('m', strtotime($date));
                                        $year = date('Y', strtotime($date));
                                        $query->whereMonth('t_timesheets.start_date', '=', $month)
                                              ->whereYear('t_timesheets.start_date', '=', $year);
                                    }
                                })
                                ->selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name')
                                ->selectRaw('employees.user_id, roles.name as role_name')
                                ->with('allTimesheetItem')
                                ->orderBy('t_timesheets.start_date', 'asc')
                                ->orderBy('employees.id', 'asc')
                                ->get();
                                // dd(DB::getQueryLog());
        }

        return response()->json($my_timesheets);
    }
}
