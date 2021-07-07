<?php

namespace App\Http\Controllers\Time\ProjectInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\mProject;
use App\mCustomer;
use App\mProjectAdmin;
use Auth;
use App\Session;
use DB;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = mCustomer::get();
        $projects = mProject::get();
        $project_admins = mProjectAdmin::get();
        // $project_admins = mProjectAdmin::select('mProjectAdmin.*', 'm_countries.country as country')
        //                             ->join('m_countries', 'm_countries.id', 'm_company_locations.country_id')
        //                             ->where('m_company_locations.id', $id)
        //                             ->get();
        return view('time/project_info/projects/list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = mCountry::get();
        return view('time/project_info/projects/add', ['countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'country' => 'required',
            'state_province' => 'nullable|string|max:64',
            'city' => 'nullable|string|max:64',
            'address' => 'nullable|string|max:255',
            'zip_code' => 'nullable|numeric|digits_between:3,8',
            'phone_number' => 'nullable|string|max:20',
            'fax' => 'nullable|string|max:30',
            'notes' => 'nullable|string|max:255',
        ]);

        $location = mCompanyLocation::create([
            'company_name' => $request->company_name,
            'country_id' => $request->country,
            'state_province' => $request->state_province,
            'city' => $request->city,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'phone_number' => $request->phone_number,
            'fax' => $request->fax,
            'notes' => $request->notes,
        ]);

        // return redirect('/listLocations');
        return redirect()->route('projects.index')->with('success', 'Location added successfully');
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
        $countries = mCountry::get();
        $locations = mCompanyLocation::select('m_company_locations.*', 'm_countries.country as country')
                                    ->join('m_countries', 'm_countries.id', 'm_company_locations.country_id')
                                    ->where('m_company_locations.id', $id)
                                    ->get();

        return view('time/project_info/projects/edit', ['countries' => $countries], ['locations' => $locations]);
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
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'country' => 'required',
            'state_province' => 'nullable|string|max:64',
            'city' => 'nullable|string|max:64',
            'address' => 'nullable|string|max:255',
            'zip_code' => 'nullable|numeric|digits_between:3,8',
            'phone_number' => 'nullable|string|max:20',
            'fax' => 'nullable|string|max:30',
            'notes' => 'nullable|string|max:255',
        ]);

        $location = mCompanyLocation::where('id', $id)->update([
            'company_name' => $request->company_name,
            'country_id' => $request->country,
            'state_province' => $request->state_province,
            'city' => $request->city,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'phone_number' => $request->phone_number,
            'fax' => $request->fax,
            'notes' => $request->notes,
        ]);

        return redirect()->back()->with('success', 'Location updated successfully'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ids = explode(',', $id);
        $locations = mCompanyLocation::destroy($ids);

        $checked = Request::input('checked',[]);
       foreach ($checked as $id) {
            mCompanyLocation::where("id",$id)->delete(); //Assuming you have a Todo model. 
       }
       //Or as @Alex suggested 
       Todo::whereIn($checked)->delete();
        
        return redirect()->route('projects.index');
    }
}
