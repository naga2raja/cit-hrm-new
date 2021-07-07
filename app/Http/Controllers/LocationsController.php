<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\mCompanyLocation;
use App\mCountry;

class LocationsController extends Controller
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

    public function listLocations()
    {
        $user = Auth::user();
        if($user->hasRole('Admin')){
            $countries = mCountry::get();
            $locations = mCompanyLocation::get();
            return view('admin/organization/locations/list', ['countries' => $countries],['locations' => $locations]);
        } else {
            return view('employees-dashboard');            
        }  
    }

    public function addCompanyLocation()
    {
        $user = Auth::user();
        if($user->hasRole('Admin')){
            $countries = mCountry::get();
            return view('admin/organization/locations/add', ['countries' => $countries]);
        } else {
            return view('employees-dashboard');            
        } 
    }

    public function editCompanyLocation($id)
    {
        $user = Auth::user();
        if($user->hasRole('Admin')){
            $countries = mCountry::get();
            $locations = mCompanyLocation::where('id', $id)->get();
            return view('admin/qualifications/locations/edit', ['countries' => $countries], ['locations' => $locations]);
        } else {
            return view('employees-dashboard');            
        } 
    }
}
