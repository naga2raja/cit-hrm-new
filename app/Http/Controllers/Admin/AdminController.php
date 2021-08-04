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
use App\tProjectAdmin;
use App\tProjectEmployee;
use App\tEmployeeReportTo;
use App\tNews;
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
        $employee = Employee::where('id', $user->id)->first();

        $today_news = tNews::select('t_news.*')
                                ->where('t_news.status', 'Active')
                                ->where('t_news.date', '=', date('Y-m-d'))
                                ->get();
        // dd($today_news);
        return response()->json($today_news);
    }


    public function getTeamLeads(Request $request)
    {
        $user = Auth::user();
        $employee = Employee::where('id', $user->id)->first();
        DB::connection()->enableQueryLog();

        $team_info = [];
        if(Auth::user()->hasRole('Admin')) {
            $team_info = tEmployeeReportTo::selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name, profile_photo, t_employee_report_to.manager_id as reporting_manager, t_project_admins.admin_id as project_admin, t_project_managers.employee_id as project_manager, t_project_admins.project_id as admin_project_id, t_project_managers.project_id as manager_project_id,
                CONCAT_WS(" | ", 
                        CASE WHEN t_employee_report_to.manager_id != "" THEN "Reporting Manager" END,
                        CASE WHEN t_project_admins.admin_id != "" THEN "Project Admin" END,
                        CASE WHEN t_project_managers.employee_id != "" THEN "Projct Manager" END
                    ) AS designation')
                                    ->leftJoin('t_project_admins', 't_project_admins.admin_id', 't_employee_report_to.manager_id')
                                    ->leftJoin('t_project_managers', 't_project_managers.employee_id', 't_employee_report_to.manager_id')
                                    ->join('employees', 'employees.id', 't_employee_report_to.manager_id')
                                    ->groupBy('t_employee_report_to.manager_id', 't_project_admins.admin_id', 't_project_managers.employee_id')
                                    ->get();
        }

        if(Auth::user()->hasRole('Manager')) {
            $team_info = tEmployeeReportTo::selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name, profile_photo, t_employee_report_to.employee_id as employee_id, m_projects.project_name, CASE WHEN t_employee_report_to.employee_id != "" THEN "Reporting Employee" END as designation')
                                ->leftJoin('t_project_managers', 't_project_managers.employee_id', 't_employee_report_to.manager_id')
                                ->leftJoin('m_projects', 'm_projects.id', 't_project_managers.project_id')
                                ->join('employees', 'employees.id', 't_employee_report_to.employee_id')
                                ->where('t_employee_report_to.manager_id', $employee->id)
                                ->get();

        }

        if(Auth::user()->hasRole('Employee')) {
            $reporting_manager = tEmployeeReportTo::selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name, profile_photo, t_employee_report_to.manager_id as employee_id, m_projects.project_name, CASE WHEN t_employee_report_to.manager_id != "" THEN "Reporting Manager" END as designation')
                                ->leftJoin('t_project_managers', 't_project_managers.employee_id', 't_employee_report_to.manager_id')
                                ->leftJoin('m_projects', 'm_projects.id', 't_project_managers.project_id')
                                ->join('employees', 'employees.id', 't_employee_report_to.employee_id')
                                ->where('t_employee_report_to.employee_id', $employee->id)
                                ->get()->toArray();

            $project_employees = mProject::selectRaw('t_project_employees.employee_id, m_projects.project_name, CASE WHEN t_project_employees.employee_id != "" THEN "Project Employee" END as designation')
                                ->join('t_project_employees', 't_project_employees.project_id', 'm_projects.id')
                                ->join('employees', 'employees.id', 't_project_employees.employee_id')
                                // ->where('t_project_employees.employee_id', '!=', 3)
                                ->where('m_projects.id', 1)
                                ->get()->toArray();

            $project_manager = mProject::selectRaw('t_project_managers.employee_id, m_projects.project_name, CASE WHEN t_project_managers.employee_id != "" THEN "Project Manager" END as designation')
                                ->join('t_project_managers', 't_project_managers.project_id', 'm_projects.id')
                                ->join('t_project_employees', 't_project_employees.project_id', 'm_projects.id')
                                ->join('employees', 'employees.id', 't_project_managers.employee_id')
                                ->where('t_project_employees.employee_id', $employee->id)
                                ->get()->toArray();

            $project_admin = mProject::selectRaw('t_project_admins.admin_id as employee_id, m_projects.project_name, CASE WHEN t_project_admins.admin_id != "" THEN "Project Admin" END as designation')
                                ->join('t_project_admins', 't_project_admins.project_id', 'm_projects.id')
                                ->join('t_project_employees', 't_project_employees.project_id', 'm_projects.id')
                                ->join('employees', 'employees.id', 't_project_admins.admin_id')
                                ->where('t_project_employees.employee_id', $employee->id)
                                ->get()->toArray();

            $result_arr = array_merge($reporting_manager, $project_employees, $project_manager, $project_admin);

            $team_info['reporting_manager'] = [];
            $team_info['project_admin'] = [];
            $team_info['project_manager'] = [];
            $team_info['project_employee'] = [];

            foreach ($result_arr as $key => $value) {
                if($value['designation'] == "Reporting Manager"){
                    $team_info['reporting_manager'][] = $value;
                }
                if($value['designation'] == "Project Admin"){
                    $team_info['project_admin'][] = $value;
                }
                if($value['designation'] == "Project Manager"){
                    $team_info['project_manager'][] = $value;
                }
                if($value['designation'] == "Project Employee"){
                    $team_info['project_employee'][] = $value;
                }
            }
            // dd($team_info['project_employee'][0]['employee_id']);
            // dd($team_info);
        }
        // dd(DB::getQueryLog());
        // dd($team_info);
        return response()->json($team_info);
    }

    public function getUpcomingLeaves(Request $request)
    {
        $user = Auth::user();
        $employee = Employee::where('id', $user->id)->first();

        $upcoming_leaves = tLeaveRequest::select('t_leave_requests.*', 'm_leave_types.name', 't_leaves.leave_duration', 't_leaves.date', 't_leaves.length_days', 't_leaves.approval_level')
                                ->join('m_leave_types', 'm_leave_types.id', 't_leave_requests.leave_type_id')
                                ->join('t_leaves', 't_leaves.leave_request_id', 't_leave_requests.id')
                                ->join('m_leave_status', 't_leave_requests.status', 'm_leave_status.id')
                                ->join('employees', 'employees.id', 't_leave_requests.employee_id')
                                ->where('t_leave_requests.employee_id', $employee->id)
                                ->selectRaw('datediff(t_leave_requests.to_date, t_leave_requests.from_date) as leave_days, m_leave_status.name as leave_status')
                                ->where('t_leaves.status', 2)
                                ->where('t_leaves.approval_level', 2)
                                ->where('t_leaves.date', '>', date('Y-m-d'))
                                ->groupBy('t_leave_requests.id')
                                ->get();
        // dd($upcoming_leaves);
        return response()->json($upcoming_leaves);
    }
    
}
