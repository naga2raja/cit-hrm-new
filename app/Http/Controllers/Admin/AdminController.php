<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Employee;
use App\mCompany;
use App\tLeave;
use App\tLeaveRequest;
use App\mProject;
use App\tProjectManager;
use App\tProjectAdmin;
use App\tProjectEmployee;
use App\tEmployeeReportTo;
use App\tNews;
use App\tLog;
use App\tTimesheet;
use App\tPunchInOut;
use App\Http\Controllers\Leave\Leave\LeaveController;
use App\Role;
use Session;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //
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

    public function getTodayNews()
    {
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();

        $project = mProject::select('m_projects.id')
                                ->leftJoin('t_project_admins', 't_project_admins.project_id', 'm_projects.id')
                                ->leftJoin('t_project_managers', 't_project_managers.project_id', 'm_projects.id')
                                ->leftJoin('t_project_employees', 't_project_employees.project_id', 'm_projects.id')
                                ->where('t_project_admins.admin_id', $employee->id)
                                ->orWhere('t_project_managers.employee_id', $employee->id)
                                ->orWhere('t_project_employees.employee_id', $employee->id)
                                ->selectRaw('GROUP_CONCAT(m_projects.id) as my_projects')
                                ->first();
        $assignedProjects = [];
        if($project && $project->my_projects) {
            $assignedProjects = explode(',',$project->my_projects);
        }

        $birthday = Employee::selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name, profile_photo, CASE WHEN employees.date_of_birth != "" THEN "birthday" END AS type')
                                ->where('date_of_birth', date('Y-m-d'))
                                ->get()->toArray();

        $news = tNews::selectRaw('t_news.*, CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name, profile_photo, CASE WHEN news != "" THEN "news" END AS type')
                                ->join('employees', 'employees.id', 't_news.created_by')
                                ->where('t_news.status', 'Active');                                
                                if(!Auth::user()->hasRole('Admin')){
                                    $news->where('t_news.project_id', null);
                                }
                                if(count($assignedProjects) && (!Auth::user()->hasRole('Admin'))) {
                                    $news->orWhereIn('t_news.project_id', $assignedProjects);
                                }
                                $news = $news->groupBy('t_news.id')
                                            ->orderBy('t_news.created_at', 'desc')
                                            ->get()->toArray();
        // dd($news);
        $result_arr = array_merge($birthday, $news);

        $output['birthday'] = [];
        $output['news'] = [];

        foreach ($result_arr as $key => $value) {
            if($value['type'] == "birthday"){
                $output['birthday'][] = $value;
            }
            if($value['type'] == "news"){
                $output['news'][] = $value;
            }
        }
        $today_news[] = $output;
        // dd($today_news);
        return response()->json($today_news);
    }

    public function getTeamLeads(Request $request)
    {
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();
        DB::connection()->enableQueryLog();

        $team_info = [];
        if(Auth::user()->hasRole('Admin')) {
            $reporting_manager = tEmployeeReportTo::selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name, profile_photo, t_employee_report_to.manager_id as manager_id, CASE WHEN t_employee_report_to.manager_id != "" THEN "Reporting Manager" END as designation')
                                ->join('employees', 'employees.id', 't_employee_report_to.manager_id')
                                ->groupBy('t_employee_report_to.manager_id')
                                ->get()->toArray();

            $project_admin = tProjectAdmin::selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name, profile_photo, t_project_admins.admin_id as employee_id, m_projects.project_name, CASE WHEN t_project_admins.admin_id != "" THEN "Project Admin" END as designation')
                                ->join('m_projects', 'm_projects.id', 't_project_admins.project_id')
                                ->join('employees', 'employees.id', 't_project_admins.admin_id')
                                ->get()->toArray();

            $project_manager = tProjectManager::selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name, profile_photo, t_project_managers.employee_id, m_projects.project_name, CASE WHEN t_project_managers.employee_id != "" THEN "Project Manager" END as designation')
                                ->join('m_projects', 'm_projects.id', 't_project_managers.project_id')
                                ->join('employees', 'employees.id', 't_project_managers.employee_id')
                                ->get()->toArray();

            $result_arr = array_merge($reporting_manager, $project_admin, $project_manager);

            $output['reporting_manager'] = [];
            $output['project_admin'] = [];
            $output['project_manager'] = [];
            $output['reporting_employee'] = []; // dummy data
            $output['team_member'] = []; // dummy data

            foreach ($result_arr as $key => $value) {
                if($value['designation'] == "Reporting Manager"){
                    $output['reporting_manager'][] = $value;
                }
                if($value['designation'] == "Project Admin"){
                    $output['project_admin'][] = $value;
                }
                if($value['designation'] == "Project Manager"){
                    $output['project_manager'][] = $value;
                }
            }
            $team_info[] = $output;
        }

        if(Auth::user()->hasRole('Manager')) {
            $reporting_manager = tEmployeeReportTo::selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name, profile_photo, t_employee_report_to.manager_id as manager_id, CASE WHEN t_employee_report_to.manager_id != "" THEN "Reporting Manager" END as designation')
                                ->join('employees', 'employees.id', 't_employee_report_to.manager_id')
                                ->where('t_employee_report_to.employee_id', $employee->id)
                                ->groupBy('t_employee_report_to.manager_id')
                                ->get()->toArray();

            $reporting_employee = tEmployeeReportTo::selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name, profile_photo, t_employee_report_to.employee_id as employee_id, m_projects.project_name, CASE WHEN t_employee_report_to.employee_id != "" THEN "Reporting Employee" END as designation')
                                ->join('employees', 'employees.id', 't_employee_report_to.employee_id')
                                ->leftJoin('t_project_employees', 't_project_employees.employee_id', 'employees.id')
                                ->leftJoin('m_projects', 'm_projects.id', 't_project_employees.project_id')
                                ->where('t_employee_report_to.manager_id', $employee->id)
                                ->groupBy('t_employee_report_to.employee_id')
                                ->get()->toArray();

            // to get the login user project
            $project = tProjectManager::select('project_id')->where('employee_id', $employee->id)
                                        ->selectRaw('GROUP_CONCAT(t_project_managers.project_id) as my_projects')
                                        ->first();

            $assignedProjects = [];
            if(($project) && ($project->my_projects)) {
                $assignedProjects = explode(',',$project->my_projects);
            }            

            $project_admin = []; $project_manager = []; $project_employees = [];
            if(count($assignedProjects)) {
                $project_admin = tProjectAdmin::selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name, profile_photo, t_project_admins.admin_id as employee_id, m_projects.project_name, CASE WHEN t_project_admins.admin_id != "" THEN "Project Admin" END as designation')
                                ->join('m_projects', 'm_projects.id', 't_project_admins.project_id')
                                ->join('employees', 'employees.id', 't_project_admins.admin_id')
                                ->whereIn('m_projects.id', $assignedProjects)
                                ->where('t_project_admins.admin_id', '!=', $employee->id)
                                ->get()->toArray();

                $project_manager = tProjectManager::selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name, profile_photo, t_project_managers.employee_id, m_projects.project_name, CASE WHEN t_project_managers.employee_id != "" THEN "Project Manager" END as designation')
                                ->join('m_projects', 'm_projects.id', 't_project_managers.project_id')
                                ->join('employees', 'employees.id', 't_project_managers.employee_id')
                                ->whereIn('m_projects.id', $assignedProjects)
                                ->where('t_project_managers.employee_id', '!=', $employee->id)
                                ->get()->toArray();

                $project_employees = tProjectEmployee::selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name, profile_photo, t_project_employees.employee_id, m_projects.project_name, CASE WHEN t_project_employees.employee_id != "" THEN "Team Member" END as designation')
                                ->join('m_projects', 'm_projects.id', 't_project_employees.project_id')
                                ->join('employees', 'employees.id', 't_project_employees.employee_id')
                                ->whereIn('m_projects.id', $assignedProjects)
                                ->where('t_project_employees.employee_id', '!=', $employee->id)
                                ->get()->toArray();
            }

            $result_arr = array_merge($reporting_manager, $reporting_employee, $project_employees, $project_manager, $project_admin);

            $output['reporting_manager'] = [];
            $output['reporting_employee'] = [];
            $output['project_admin'] = [];
            $output['project_manager'] = [];
            $output['team_member'] = [];

            foreach ($result_arr as $key => $value) {
                if($value['designation'] == "Reporting Manager"){
                    $output['reporting_manager'][] = $value;
                }
                if($value['designation'] == "Reporting Employee"){
                    $output['reporting_employee'][] = $value;
                }
                if($value['designation'] == "Project Admin"){
                    $output['project_admin'][] = $value;
                }
                if($value['designation'] == "Project Manager"){
                    $output['project_manager'][] = $value;
                }
                if($value['designation'] == "Team Member"){
                    $output['team_member'][] = $value;
                }
            }
            $team_info[] = $output;
        }

        if(Auth::user()->hasRole('Employee')) {
            $reporting_manager = tEmployeeReportTo::selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name, profile_photo, t_employee_report_to.manager_id as manager_id, CASE WHEN t_employee_report_to.manager_id != "" THEN "Reporting Manager" END as designation')
                                ->join('employees', 'employees.id', 't_employee_report_to.manager_id')
                                ->where('t_employee_report_to.employee_id', $employee->id)
                                ->groupBy('t_employee_report_to.manager_id')
                                ->get()->toArray();

            // to get the login user project
            $project = tProjectEmployee::select('project_id')->where('employee_id', $employee->id)
                                        ->selectRaw('GROUP_CONCAT(t_project_employees.project_id) as my_projects')
                                        ->first();

            $assignedProjects = [];
            if(($project) && ($project->my_projects)) {
                $assignedProjects = explode(',',$project->my_projects);
            }

            $project_admin = []; $project_manager = []; $team_member = [];
            if(count($assignedProjects)) {
                $project_admin = tProjectAdmin::selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name, profile_photo, t_project_admins.admin_id as employee_id, m_projects.project_name, CASE WHEN t_project_admins.admin_id != "" THEN "Project Admin" END as designation')
                                ->join('m_projects', 'm_projects.id', 't_project_admins.project_id')
                                ->join('employees', 'employees.id', 't_project_admins.admin_id')
                                ->whereIn('m_projects.id', $assignedProjects)
                                ->where('t_project_admins.admin_id', '!=', $employee->id)
                                ->get()->toArray();

                $project_manager = tProjectManager::selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name, profile_photo, t_project_managers.employee_id, m_projects.project_name, CASE WHEN t_project_managers.employee_id != "" THEN "Project Manager" END as designation')
                                ->join('m_projects', 'm_projects.id', 't_project_managers.project_id')
                                ->join('employees', 'employees.id', 't_project_managers.employee_id')
                                ->whereIn('m_projects.id', $assignedProjects)
                                ->where('t_project_managers.employee_id', '!=', $employee->id)
                                ->get()->toArray();

                $team_member = tProjectEmployee::selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name, profile_photo, t_project_employees.employee_id, m_projects.project_name, CASE WHEN t_project_employees.employee_id != "" THEN "Team Member" END as designation')
                                ->join('m_projects', 'm_projects.id', 't_project_employees.project_id')
                                ->join('employees', 'employees.id', 't_project_employees.employee_id')
                                ->whereIn('m_projects.id', $assignedProjects)
                                ->where('t_project_employees.employee_id', '!=', $employee->id)
                                ->get()->toArray();
            }

            $result_arr = array_merge($reporting_manager, $project_admin, $project_manager, $team_member);

            $output['reporting_manager'] = [];
            $output['project_admin'] = [];
            $output['project_manager'] = [];
            $output['team_member'] = [];

            foreach ($result_arr as $key => $value) {
                if($value['designation'] == "Reporting Manager"){
                    $output['reporting_manager'][] = $value;
                }
                if($value['designation'] == "Project Admin"){
                    $output['project_admin'][] = $value;
                }
                if($value['designation'] == "Project Manager"){
                    $output['project_manager'][] = $value;
                }
                if($value['designation'] == "Team Member"){
                    $output['team_member'][] = $value;
                }
            }
            $team_info[] = $output;
        }
        // dd(DB::getQueryLog());
        // dd($team_info);
        
        return response()->json($team_info);
    }

    public function getUpcomingLeaves(Request $request)
    {
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();

        $upcoming_leaves = tLeave::select('t_leaves.*', 'm_leave_types.name', 'm_leave_status.name as leave_status')
                                ->join('m_leave_types', 'm_leave_types.id', 't_leaves.leave_type_id')
                                ->join('m_leave_status', 't_leaves.status', 'm_leave_status.id')
                                ->join('employees', 'employees.id', 't_leaves.employee_id')
                                ->where('t_leaves.employee_id', $employee->id)
                                ->where('t_leaves.date', '>=', date('Y-m-d'))
                                ->get();
        // dd($upcoming_leaves);
        return response()->json($upcoming_leaves);
    }

    public function getRecentActivities(Request $request)
    {
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();
        DB::connection()->enableQueryLog();

        $my_activities = tLog::selectRaw('t_logs.*, CONCAT_WS (" ", receiver.first_name, receiver.last_name) as reciever_name, sender.profile_photo, roles.name as role_name, CASE WHEN t_logs.send_by != "" THEN "My Activities" END as type')
                                ->join('employees as receiver', 'receiver.id', 't_logs.send_to')
                                ->join('employees as sender', 'sender.id', 't_logs.send_by')
                                ->join('model_has_roles', 'model_has_roles.model_id', 'sender.user_id')
                                ->join('roles', 'roles.id', 'model_has_roles.role_id')
                                ->where('t_logs.send_by', $employee->id)
                                ->where('t_logs.status', '0')
                                ->orderBy('t_logs.id', 'DESC')
                                ->get()->toArray();

        // dd($my_activities);
        $others_activities = tLog::selectRaw('t_logs.*, CONCAT_WS (" ", first_name, last_name) as employee_name, profile_photo, roles.name as role_name, CASE WHEN t_logs.send_to != "" THEN "Others Activities" END as type')
                                ->join('employees', 'employees.id', 't_logs.send_by')
                                ->join('model_has_roles', 'model_has_roles.model_id', 'employees.user_id')
                                ->join('roles', 'roles.id', 'model_has_roles.role_id')
                                ->whereRaw('FIND_IN_SET ('.$employee->id.', t_logs.send_to)')
                                ->where('t_logs.send_to', '!=', '0')
                                ->where('t_logs.status', '0')
                                ->orderBy('t_logs.id', 'DESC')
                                ->get()->toArray();

        $result_arr = array_merge($my_activities, $others_activities);

        if(Auth::user()->hasRole('Admin')){
            $idsArr = [];        
            foreach ($result_arr as $key => $result ) {
                $id = $result['id'];
                if(in_array($id, $idsArr)) {
                      unset($result_arr[$key]);
                } else {
                    $idsArr[] = $id;
                }        
            }
            // dd($idsArr, $result_arr);
        }

        // to sort by latest record
        $keys = array_column($result_arr, 'id');
        array_multisort($keys, SORT_DESC, $result_arr);

        return ($result_arr);
    }

    public function getRequestChart(Request $request)
    {
        $leaveCtrl = new LeaveController;

        $user = Auth::user();
        $currentEmployeeDetails = $leaveCtrl->getEmployeeDetails($user->id);
        $employeeId = $currentEmployeeDetails->id;

        $empIds = [];
        if($user->hasRole('Manager')) {
            $userRole = 'Manager';
            $approval_level = 0;
            $status = 1;
            $pending_status = 1;
            //Find Reporting Employees Ids
            $reportTo = $leaveCtrl->getReportingEmployees($employeeId);
            if($reportTo)
                $empIds = explode(',', $reportTo->reporting_manager_ids);
        } else {
          //admin
            $userRole = 'Admin';
            $approval_level = 1;
            $status = 2;
            $pending_status = 2;
        }

        $leave = tLeaveRequest::select('t_leave_requests.*')
                                ->join('m_leave_types', 'm_leave_types.id', 't_leave_requests.leave_type_id')
                                ->join('t_leaves', 't_leaves.leave_request_id', 't_leave_requests.id')
                                ->join('employees', 'employees.id', 't_leave_requests.employee_id')
                                ->join('m_leave_status', 't_leave_requests.status', 'm_leave_status.id')
                                ->where('t_leave_requests.employee_id', '!=', $employeeId)
                                ->where('t_leaves.status', $pending_status)
                                ->where('t_leaves.approval_level', $approval_level);
                                if(count($empIds)) {
                                    $leave->whereIn('t_leave_requests.employee_id', $empIds);
                                }
                                $leave = $leave->where('t_leave_requests.status', $status)
                                        ->groupBy('t_leave_requests.id')
                                        ->get();

        // adminEmployees only for Attendance and timesheet
        if($user->hasRole('Admin')) {
            $empIds = $leaveCtrl->getReportingToAdminEmployees($user->id);
        }

        $attendance = tPunchInOut::join('employees', 't_punch_in_outs.employee_id', 'employees.id');        
                                if(count($empIds)) {
                                    $attendance->whereIn('t_punch_in_outs.employee_id', $empIds);
                                }
                                $attendance = $attendance->where('t_punch_in_outs.status', 1)
                                        ->orderBy('t_punch_in_outs.id', 'DESC')
                                        ->get();

        $timesheet = tTimesheet::select('t_timesheets.*')
                              ->join('employees', 'employees.id', 't_timesheets.employee_id')
                              ->join('model_has_roles', 'model_has_roles.model_id', 'employees.user_id')
                              ->join('roles', 'roles.id', 'model_has_roles.role_id');
                              if(count($empIds)) {
                                $timesheet->whereIn('t_timesheets.employee_id', $empIds);
                              }  
                              $timesheet = $timesheet->where('t_timesheets.status', 1)
                                          ->orderBy('t_timesheets.start_date', 'asc')
                                          ->orderBy('employees.id', 'asc')
                                          ->get();

        $data['role'] = $userRole;
        $data['leave'] = count($leave);
        $data['attendance'] = count($attendance);
        $data['timesheet'] = count($timesheet);

        return response()->json($data);
    }
    
}
