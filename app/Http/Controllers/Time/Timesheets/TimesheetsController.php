<?php

namespace App\Http\Controllers\Time\Timesheets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Employee;
use App\tTimesheetItem;
use App\tTimesheet;
use APP\tActivity;
use App\Http\Controllers\Leave\Leave\LeaveController;
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
        return view('time/timesheets/employee_timesheets/list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $timesheet = [];
        $timesheet_item = [];
        if(($request->employee_id)&&($request->date)) {
            $employees = Employee::where('id', $request->employee_id)
                                ->selectRaw('id as employee_id, CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name')
                                ->first();
            if($employees){
                $timesheet = tTimesheet::where('start_date', $request->date)
                                    ->where('employee_id', $employees->employee_id)
                                    ->first();
            }
            if($timesheet){
                $timesheet_item = tTimesheetItem::where('timesheet_id', $timesheet->id)
                                            ->where('date', $request->date)
                                            ->where('employee_id', $employees->employee_id)
                                            ->with('projectName','projectName.allActivities', 'activityName')
                                            ->get();
            }
        }
        // dd($timesheet_item);

        return view('time/timesheets/add', compact('timesheet', 'timesheet_item', 'employees'));
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
        // convert serialize to array
        parse_str($request->data, $data);
        // dd($data);

        $date = str_replace('/', '-', $data['date']);
        $date = date('Y-m-d', strtotime($date));
        $employee_id = $data['employee_id'];

        // duplicate check
        $TimesheetExists = tTimesheet::where('start_date', $date)
                                    ->where('employee_id', $employee_id)
                                    ->first();
        if($TimesheetExists) {
            $timesheet_id = $TimesheetExists->id;
            // Delete TimesheetItem
            $TimesheetItem = tTimesheetItem::where('timesheet_id', $timesheet_id)
                                ->where('date', $date)
                                ->where('employee_id', $employee_id)
                                ->delete();
            
        }else{
          if(Auth::User()->id == $employee_id) {
            $status = '0';
            $comments = '<b>'.Auth::user()->name.'</b> - Saved Timesheet on ' . getCurrentTime();
          }else if(Auth::user()->hasRole('Manager') || Auth::user()->hasRole('Admin')){
            $status = '2';
            $comments = '<b>'.Auth::user()->name .'('. Auth::user()->roles[0]->name .')</b> - Send to <b>'. $newtimesheetStatus.'</b> on ' . getCurrentTime();
          }
          // create Timesheet
          $timesheet = tTimesheet::create([
              'employee_id'  => $employee_id,
              'start_date'  =>  $date,
              'end_date'  =>  $date,
              'status'  => $status,
              'comments' => $comments,
              'created_by' => Auth::user()->id
          ]);
          $timesheet_id = $timesheet->id;
        }
        // create TimesheetItem
        $timeItem = $data['timeItem'];
        foreach ($timeItem as $row) {
            $project_id = $row['project_id'];
            $activity_id = $row['activity_id'];
            $comments = $row['comments'];
            $duration = $row['duration'];

            $time = explode(':', $duration);
            $minute = ($time[0]*60) + ($time[1]);

            $TimesheetItem = tTimesheetItem::create([
                'timesheet_id'  => $timesheet_id,
                'employee_id'  => $employee_id,
                'date' => $date,
                'project_id'  => $project_id,
                'activity_id'  => $activity_id,
                'comments'  => $comments,
                'duration'  => $minute
            ]);
        }

        return response()->json($TimesheetItem);
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

    public function deleteMultiple(Request $request)
    {
        if($request->delete_ids) {
            tTimesheet::whereIn('id', $request->delete_ids)
                        ->get()
                        ->map(function($timesheet) {
                            $timesheet->delete();
                        });
            tTimesheetItem::whereIn('timesheet_id', $request->delete_ids)
                        ->get()
                        ->map(function($timesheet_item) {
                            $timesheet_item->delete();
                        });
            return true;
        } else {
            return false;
        }       
    }

    public function getEmployeeTimeSheets(Request $request){

        $employee_id = $request->employee_id;
        $date = str_replace('/', '-', $request->selected_date);
        $key = $request->key;
        $leaveCtrl = new LeaveController;

        $user = Auth::user();
        $currentEmployeeDetails = $leaveCtrl->getEmployeeDetails($user->id);
        $employeeId = $currentEmployeeDetails->id;
        $empIds = [];
        if($user->hasRole('Manager')) {
            $userRole = 'Manager';
            //Find Reporting Employees Ids
            $reportTo = $leaveCtrl->getReportingEmployees($employeeId);
            if($reportTo)
                $empIds = explode(',', $reportTo->reporting_manager_ids);
        } else {
          //admin
            $userRole = 'Admin';
            $empIds = $leaveCtrl->getReportingToAdminEmployees($user->id);
        }

        $timesheets = [];
        DB::connection()->enableQueryLog();
        $timesheets = tTimesheet::select('t_timesheets.*')
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
                              });
                              if(count($empIds)) {
                                $timesheets = $timesheets->whereIn('t_timesheets.employee_id', $empIds);
                              }  
                              $timesheets = $timesheets->where('t_timesheets.status', '!=', 0)
                              ->selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name')
                              ->selectRaw('employees.user_id, roles.name as role_name')
                              ->with('allTimesheetItem')
                              ->orderBy('t_timesheets.start_date', 'asc')
                              ->orderBy('employees.id', 'asc')
                              ->get();
        // dd(DB::getQueryLog());
        // dd($timesheets);
        return response()->json($timesheets);
    }

    public function adminAction(Request $request)
    {
        $leaveCtrl = new LeaveController;
        $userRole = 'Admin';
        if(Auth::user()->hasRole('Manager'))
            $userRole = 'Manager';

        $timesheetStatusUpdateArr = (array) json_decode($request->timesheet_id_update);        
        
        if(count($timesheetStatusUpdateArr)) {
            foreach($timesheetStatusUpdateArr as $timesheet) {
                $timesheet_id = $timesheet->id;
                $status_id = $timesheet->status_id;
                $newtimesheetStatus = currentTimesheetStatus($status_id);

                $timesheetInfo = tTimesheet::where('id', $timesheet_id)->first();
                $timesheetInfo->status = $status_id;
                $timesheetInfo->updated_by = Auth::user()->id;
                $timesheetInfo->comments = $timesheetInfo->comments . ' <hr> <b>'.Auth::user()->name .'('. $userRole .')</b> - Updated to <b>'. $newtimesheetStatus.'</b> on ' . getCurrentTime();
                $timesheetInfo->save();

                //Send Email to Employee
                // $toEmails = [];
                // $employeeDetails = $leaveCtrl->getEmployeeDetails($timesheetInfo->employee_id);
                // $details = [
                //     'date' => $timesheetInfo->timesheet_in_user_time.' to '. $timesheetInfo->timesheet_out_user_time,
                //     'message'  =>  'Updated to <b>'.$newtimesheetStatus. '</b> By '.Auth::user()->name,
                //     'employee_name' => $employeeDetails->first_name.' '.$employeeDetails->first_name
                // ]; 
                // $toEmails[] = ['name' => $employeeDetails->first_name.' '.$employeeDetails->first_name, 'email' => $employeeDetails->email];
                // Mail::to($toEmails)->send(new AttendanceStatusMail($details));
            }
        }
        return redirect()->back()->with('success', 'Timesheet Status Updated Successfully!');
    }
}
