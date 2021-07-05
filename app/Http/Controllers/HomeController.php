<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
        if($user->hasRole('Admin')){
            return view('admin/dashboard');  
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
