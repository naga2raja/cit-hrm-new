<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Employee;
use App\mCompany;
use App\tLeave;
use App\mProject;
use App\Role;

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
        $my_data = Employee::where('id', $user->id)->first();
        $upcoming_leaves = tLeave::where('employee_id', $my_data->id)
                                    ->where('status', 2)
                                    ->where('approval_level', 2)
                                    ->where('date', '>', date('Y-m-d'))
                                    ->with('leaveTypeName')
                                    ->paginate(5);

        $team_leads = mProject::select('m_projects.*')
                                ->join('t_project_admins', 't_project_admins.project_id', 'm_projects.id')
                                ->join('employees', 'employees.id', 't_project_admins.admin_id')
                                ->selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as team_lead')
                                ->paginate(5);

        $data = [];
        if($user->hasRole('Admin|Manager')){
            $employees_count = Employee::count();
            $company_count = mCompany::count();
            $leave_count = tLeave::where('employee_id', $user->id)
                                  ->whereIn('status', [1,2,3])
                                  ->count();
            $data = [
                'my_data'  => $my_data,
                'upcoming_leaves'  => $upcoming_leaves,
                'team_leads'  => $team_leads,
                'employees_count'  => $employees_count,
                'company_count'   => $company_count,
                'leave_count' => $leave_count
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
