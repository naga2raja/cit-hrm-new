<?php

namespace App\Http\Controllers\Time\ProjectInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\mProject;
use App\mCustomer;
use App\tProjectAdmin;
use App\Employee;
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
        DB::connection()->enableQueryLog(); 

        $projects = mProject::select(DB::raw('GROUP_CONCAT( DISTINCT m_customers.customer_name) as customer_name'), 
            DB::raw('GROUP_CONCAT(DISTINCT CONCAT(employees.first_name," ",employees.middle_name," ",employees.last_name)) AS admin_name'), 'm_projects.id as project_id', 'm_projects.project_name as project_name')
                ->join('t_project_customers', 't_project_customers.project_id', 'm_projects.id')
                ->join('m_customers', 't_project_customers.customer_id', 'm_customers.id')
                ->leftjoin('t_project_admins', 't_project_admins.admin_id', 'm_projects.id')
                ->leftjoin('employees', 'employees.user_id', 't_project_admins.admin_id')
                ->groupby('m_projects.id')
                ->get();
        // dd(DB::getQueryLog());

        return view('time/project_info/projects/list', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $countries = mCountry::get();
        return view('time/project_info/projects/add');
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

    public function customers_search(Request $request)
    {

        DB::connection()->enableQueryLog(); 

        $customer_name = $request->customer_name;

        if(!empty(trim($customer_name))){
            $customers = mCustomer::select('m_customers.customer_name', 'm_customers.id')
                                    ->where('m_customers.customer_name', 'like', "%{$customer_name}%")
                                    ->get();
            // dd(DB::getQueryLog());

            if(count($customers) != 0){
                $output = '<ul class="dropdown-menu" style="display:block; position:relative;">';
                foreach($customers as $row)
                {
                   $output .= '<li class="customer"><a class="dropdown-item" href="#">'.$row->customer_name.'</a></li>';
                }
                $output .= '</ul>';
                echo $output;
            }  
        } else{
            $output = '';
            echo $output;
        }
    }

    public function projects_search(Request $request)
    {
        DB::connection()->enableQueryLog(); 

        $project_name = $request->project_name;

        if(!empty(trim($project_name))){
            $projects = mProject::select('m_projects.project_name', 'm_projects.id')
                                    ->where('m_projects.project_name', 'like', "%{$project_name}%")
                                    ->get();
            // dd(DB::getQueryLog());

            if(count($projects) != 0){
                $output = '<ul class="dropdown-menu" style="display:block; position:relative;">';
                foreach($projects as $row)
                {
                   $output .= '<li class="project"><a class="dropdown-item" href="#">'.$row->project_name.'</a></li>';
                }
                $output .= '</ul>';
                echo $output;
            } 
        } else{
            $output = '';
            echo $output;
        }
    }

    public function project_admin_search(Request $request)
    {
        DB::connection()->enableQueryLog(); 

        $project_admin = $request->project_admin;

        if(!empty(trim($project_admin))){
            $admins = Employee::select('employees.first_name', 'employees.middle_name', 'employees.last_name', 'employees.id')
                                    ->where('employees.first_name', 'like', "%{$project_admin}%")
                                    ->orWhere('employees.middle_name', 'like', "%{$project_admin}%")
                                    ->orWhere('employees.last_name', 'like', "%{$project_admin}%")
                                    ->get();
            // dd(DB::getQueryLog());

            if(count($admins) != 0){
                $output = '<ul class="dropdown-menu" style="display:block; position:relative;">';
                foreach($admins as $row)
                {
                    $name = $row->first_name.' '.$row->middle_name.' '.$row->last_name;
                    // .' '.$row->middle_name.' '.$row->last_name
                    $output .= '<li class="admin"><a class="dropdown-item" href="#">'.$name.'</a></li>';
                }
                $output .= '</ul>';
                echo $output;
            }
        } else{
            $output = '';
            echo $output;
        }
    }
}