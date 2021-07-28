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
        if($user->hasRole('Admin|Manager')){
            $employees = Employee::get();
            $company = mCompany::get();
            $leave = tLeave::where('employee_id', $user->id)
                            ->whereIn('status', [1,2,3])
                            ->get();
            return view('admin_dashboard', compact('employees', 'company', 'leave')); 
        } else {
            return view('employees-dashboard');            
        }
    }

    public function demoAdmin() {
        return view('test-page');
    }

    public function demoEmployee() {
        return view('test-page-employees');
    }
}
