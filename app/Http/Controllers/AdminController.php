<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
    public function listSystemUsers()
    {
        $user = Auth::user();
        if($user->hasRole('Admin')){
            return view('admin/system_users/list');  
        } else {
            return view('employees-dashboard');            
        }
    }

    public function addSystemUser()
    {
        $user = Auth::user();
        if($user->hasRole('Admin')){
            return view('admin/system_users/add');  
        } else {
            return view('employees-dashboard');            
        }
    }

    public function listJobTitles()
    {
        $user = Auth::user();
        if($user->hasRole('Admin')){
            return view('admin/job/list');  
        } else {
            return view('employees-dashboard');            
        }
    }

    public function addJobTitle()
    {
        $user = Auth::user();
        if($user->hasRole('Admin')){
            return view('admin/job/add');  
        } else {
            return view('employees-dashboard');            
        }
    }
}
