<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Role;

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
        $user = Auth::user();
        if($user->hasRole('Admin')){
            return view('admin/admin_dashboard');  
        } else {
            return view('employees-dashboard');            
        }
    }

    public function listSystemUsers()
    {
        $user = Auth::user();
        if($user->hasRole('Admin')){
        	$users = User::get();
        	$roles = Role::get();
            return view('admin/system_users/list', ['users' => $users, 'roles' => $roles]);
        } else {
            return view('employees-dashboard');
        }
    }

    public function addSystemUser()
    {
        $user = Auth::user();
        if($user->hasRole('Admin')){
        	$roles = Role::get();
            return view('admin/system_users/add', ['roles' => $roles]);
        } else {
            return view('employees-dashboard');
        }
    }

    public function saveSystemUser(Request $request) {
    	// dd($request->all()); die();
        $validated = $request->validate([
        	'role' => 'required',
            'employee_name' => 'required',
			'email' => 'required|email',
			'status' => 'required',
			'password' => 'required',
			'confirm_password' => 'required|same:password',
        ]);

        $user = User::create([
            'role'  => $request->input('role'),
            'name'  => $request->input('employee_name'),
            'email'  => $request->input('email'),
            // 'status' => $request->input('status'),
            'password' => Hash::make($request->input('password'))
        ]);
        $user->assignRole($request->input('role'));

        return redirect()->route('listSystemUsers')->with('success', 'Employee Added successfully');
    }

    public function listJobTitles()
    {
        $user = Auth::user();
        if($user->hasRole('Admin')){
            return view('admin/job/job_titles/list');  
        } else {
            return view('employees-dashboard');
        }
    }

    public function addJobTitle()
    {
        $user = Auth::user();
        if($user->hasRole('Admin')){
            return view('admin/job/job_titles/add');  
        } else {
            return view('employees-dashboard');
        }
    }

    public function listPayGrades()
    {
        $user = Auth::user();
        if($user->hasRole('Admin')){
            return view('admin/job/pay_grades/list');  
        } else {
            return view('employees-dashboard');
        }
    }

    public function addPayGrade()
    {
        $user = Auth::user();
        if($user->hasRole('Admin')){
            return view('admin/job/pay_grades/add');  
        } else {
            return view('employees-dashboard');
        }
    }
    
}
