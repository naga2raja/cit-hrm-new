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
use App\tEmployeeReportTo;
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

    public function getTeamLeads(Request $request)
    {
        $user = Auth::user();
        $employee = Employee::where('id', $user->id)->first();
        DB::connection()->enableQueryLog();

        // if(Auth::user()->hasRole('Admin')) {
        //     $reporting_managers = tEmployeeReportTo::selectRaw('employees.id as employee_id, CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name, profile_photo')
        //                                 ->join('t_project_admins', 't_project_admins.admin_id', 't_employee_report_to.manager_id')
        //                                 ->join('employees', 'employees.id', 't_employee_report_to.manager_id')
        //                                 ->groupBy('t_employee_report_to.manager_id', 't_project_admins.admin_id')
        //                                 ->get();
        //     // $project_managers = tProjectAdmin::selectRaw('employees.id as employee_id, CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name, profile_photo')
        //     //                             ->join('employees', 'employees.id', 't_project_admins.admin_id')
        //     //                             ->groupBy('t_project_admins.admin_id')
        //     //                             ->get();
        //     //dd(DB::getQueryLog());
        //     //dd($reporting_managers);
        // }


        if(Auth::user()->hasRole('Manager')) {
            $team_leads = tEmployeeReportTo::selectRaw('employees.id as employee_id, CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name, profile_photo, roles.name as role_name, m_projects.project_name')
                                        ->join('t_project_admins', 't_project_admins.admin_id', 't_employee_report_to.manager_id')
                                        ->join('m_projects', 'm_projects.id', 't_project_admins.project_id')
                                        ->join('employees', 'employees.id', 't_employee_report_to.employee_id')
                                        ->join('model_has_roles', 'model_has_roles.model_id', 'employees.user_id')
                                        ->join('roles', 'roles.id', 'model_has_roles.role_id')
                                        ->where('manager_id', $employee->id)
                                        ->get();
        }else{        
            $team_leads = tEmployeeReportTo::selectRaw('employees.id as employee_id, CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name, profile_photo, roles.name as role_name, m_projects.project_name')
                                        ->join('t_project_admins', 't_project_admins.admin_id', 't_employee_report_to.manager_id')
                                        ->join('m_projects', 'm_projects.id', 't_project_admins.project_id')
                                        ->join('employees', 'employees.id', 't_employee_report_to.manager_id')
                                        ->join('model_has_roles', 'model_has_roles.model_id', 'employees.user_id')
                                        ->join('roles', 'roles.id', 'model_has_roles.role_id');
                                        if(Auth::user()->hasRole('Employee')) {
                                            $team_leads->where('t_employee_report_to.employee_id', $employee->id);
                                        }
                                        if(Auth::user()->hasRole('Admin')) {
                                            $team_leads->groupBy('t_employee_report_to.manager_id');
                                        }
                                        $team_leads = $team_leads->get();
        }
        // dd(DB::getQueryLog());

        // dd($team_leads);
        return response()->json($team_leads);
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
