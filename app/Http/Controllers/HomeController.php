<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Employee;
use App\mCompany;
use App\mCompanyLocation;
use App\tLeave;
use App\tLeaveRequest;
use App\mProject;
use App\Role;
use App\Http\Controllers\Leave\Leave\LeaveController;

class HomeController extends Controller
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
        $user = Auth::user();
        $my_data = Employee::where('user_id', $user->id)->first();
        if($my_data){  
            $employeeId = $my_data->id;

            if($my_data->status != 'Active') {
                Auth::logout();
                return redirect('/login')->with('error', 'Your account is disabled.');
            }
            
        }else{
            $employeeId= "";
        }

        $leaveCtrl = new LeaveController;
        $empIds = [];
        if($user->hasRole('Manager')) {
            $userRole = 'Manager';
            $approval_level = 0;
            $pending_status = 1;
            //Find Reporting Employees Ids
            $reportTo = $leaveCtrl->getReportingEmployees($employeeId);
            if($reportTo)
                $empIds = explode(',', $reportTo->reporting_manager_ids);
        } else {
            $userRole = 'Admin';
            $approval_level = 1;
            $pending_status = 2;
        }

        $data = [];
        if($user->hasRole('Admin|Manager')){
            $employees_count = Employee::select('employees.*');
                              if(count($empIds)) {
                                $employees_count->join('t_employee_report_to', 't_employee_report_to.employee_id', 'employees.id')
                                    ->where('t_employee_report_to.manager_id', $employeeId);
                              }
                              $employees_count = $employees_count->get();

            $company_count = mCompanyLocation::get();

            $leave_count = tLeaveRequest::select('t_leave_requests.*')
                                ->join('m_leave_types', 'm_leave_types.id', 't_leave_requests.leave_type_id')
                                ->join('t_leaves', 't_leaves.leave_request_id', 't_leave_requests.id')
                                ->join('employees', 'employees.id', 't_leave_requests.employee_id')
                                ->join('m_leave_status', 't_leave_requests.status', 'm_leave_status.id')
                                ->where('t_leave_requests.employee_id', '!=', $employeeId)
                                ->where('t_leaves.approval_level', $approval_level);
                                if(count($empIds)) {
                                    $leave_count->whereIn('t_leave_requests.employee_id', $empIds);
                                }
                                $leave_count = $leave_count->where('t_leave_requests.status', 1)
                                                ->groupBy('t_leave_requests.id')
                                                ->get();
            $data = [
                'my_data'  => $my_data,
                'employees_count'  => count($employees_count),
                'company_count'   => count($company_count),
                'leave_count' => count($leave_count)
            ];
            return view('admin_dashboard', compact('data'));
        } else {
            $data = [
                'my_data'  => $my_data
            ];
            return view('employees_dashboard', compact('data'));
        }
    }

    public function demoAdmin() {
        return view('test-page');
    }

    public function demoEmployee() {
        return view('test-page-employees');
    }
}
