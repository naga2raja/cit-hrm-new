<?php

namespace App\Http\Controllers\Time\ProjectInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\mProject;
use App\mCustomer;
use App\tProjectAdmin;
use App\Employee;
use App\tActivity;
use Auth;
use App\Session;
use DB;
use App\tProjectManager;
use App\tProjectEmployee;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customer_name = $request->input('customer_name');
        $project_name = $request->input('project_name');
        $project_admin = $request->input('project_admin');
        
        DB::connection()->enableQueryLog(); 

        $projects = mProject::select(DB::raw('GROUP_CONCAT( DISTINCT m_customers.customer_name) as customer_name'),DB::raw("CONCAT_WS (' ', first_name, middle_name, last_name) as admin_name"), 'm_projects.id as project_id', 'm_projects.project_name as project_name')
                ->join('m_customers', 'm_projects.customer_id', 'm_customers.id')
                ->leftjoin('t_project_admins', 't_project_admins.project_id', 'm_projects.id')
                ->leftjoin('employees', 'employees.id', 't_project_admins.admin_id');
        if ($customer_name) {
            $projects->Where('m_customers.customer_name', 'like', "%$customer_name%");
        }
        if ($project_name) {
            $projects->Where('m_projects.project_name', 'like', "%$project_name%");
        }
        if ($project_admin) {
            $string = str_replace(' ', '', $project_admin);
            $projects->Where(DB::raw("CONCAT(employees.first_name,employees.middle_name, employees.last_name)"), 'LIKE', "%$string%");
        }
        $projects = $projects->groupby('m_projects.id')
                       ->get();  
        $activities = tActivity::get();

        return view('time/project_info/projects/list', compact('projects', 'activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $countries = mCountry::get();
        $employees = [];
        $managers = [];
        return view('time/project_info/projects/add', compact('employees', 'managers'));
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
            'customer' => 'required',
            'project_name' => 'required|string|max:255',
            'project_description' => 'nullable|string|max:255',
        ]);

        $project = mProject::create([
            'project_name' => $request->project_name,
            'project_description' => (empty($request->project_description) ? '' :  $request->project_description),
            'customer_id' => $request->customer
        ]);

        if($request->admin_id != null){
            $project_admin = tProjectAdmin::create([
                'project_id' => $project->id,
                'admin_id' => $request->admin_id
            ]);
        }

        $managers = $request->managers;
        if($managers) {
            $this->insertProjectManagers($project->id, $managers);
        }
        $employees = $request->employees;
        if($employees) {
            $this->insertProjectEmployees($project->id, $employees);
        }
        
        return redirect()->route('projects.index')->with('success', 'Project added successfully');
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
        DB::connection()->enableQueryLog(); 

        $projects = mProject::select('m_projects.id','m_projects.project_name', 'm_projects.project_description', 'm_projects.customer_id', 'm_customers.customer_name', 't_project_admins.admin_id',DB::raw("CONCAT_WS (' ', first_name, middle_name, last_name) as admin_name"))
                ->join('m_customers', 'm_projects.customer_id', 'm_customers.id')
                ->leftjoin('t_project_admins', 't_project_admins.project_id', 'm_projects.id')
                ->leftjoin('employees', 'employees.id', 't_project_admins.admin_id')
                ->leftjoin('t_activities', 't_activities.project_id', 'm_projects.id')
                ->where('m_projects.id', $id)
                ->groupby('m_projects.id')
                       ->get();

        $activities = tActivity::where('project_id', $id)->get();       
        $employees = $this->getProjectAssignedUsers($id, 'employees');
        $managers = $this->getProjectAssignedUsers($id, 'managers');
        
        return view('time/project_info/projects/edit', compact('projects', 'activities', 'employees', 'managers'));
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

    }

    public function update_project(Request $request)
    {   
        $project = mProject::where('id', $request->project_id)->update([
            'project_name' => $request->project_name,
            'project_description' => (empty($request->project_description) ? '' :  $request->project_description),
            'customer_id' => $request->customer
        ]);

        $delete_admin = tProjectAdmin::where('project_id', $request->project_id)->delete();

        if($request->admin_id != null){
            $project_admin = tProjectAdmin::create([
                'project_id' => $request->project_id,
                'admin_id' => $request->admin_id
            ]);
        }

        $managers = (array) $request->managers;
        $this->insertProjectManagers($request->project_id, $managers);
        
        $employees = (array) $request->employees;
        $this->insertProjectEmployees($request->project_id, $employees);
        
        return response()->json(['project', $project]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function deleteMultiple(Request $request)
    {
        if($request->delete_ids) {
            mProject::whereIn('id', $request->delete_ids)
                ->get()
                ->map(function($project) {
                    $project->delete();
                });
            tProjectAdmin::whereIn('project_id', $request->delete_ids)
                ->get()
                ->map(function($project_admin) {
                    $project_admin->delete();
                });
            tActivity::whereIn('project_id', $request->delete_ids)
                ->get()
                ->map(function($project_activity) {
                    $project_activity->delete();
                });
            return true;
        } else {  
            return false;
        }  
    }

    public function customers_search(Request $request)
    {
        DB::connection()->enableQueryLog(); 

        $customer_name = $request->customer_name;

        if(!empty(trim($customer_name))){
            $customers = mCustomer::select('m_customers.customer_name', 'm_customers.id')
                                    ->where('m_customers.customer_name', 'like', "%{$customer_name}%")
                                    ->get();

            if(count($customers) != 0){
                $output = '<ul class="dropdown-menu" style="display:block; position:relative;">';
                foreach($customers as $row)
                {
                   $output .= '<li class="customer"><a id='.$row->id.' onClick="pass_customer_id(this.id)" class="dropdown-item" href="#">'.$row->customer_name.'</a></li>';
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

            if(count($admins) != 0){
                $output = '<ul class="dropdown-menu" style="display:block; position:relative;">';
                foreach($admins as $row)
                {
                    $emp_name = '';
                    if($row->first_name != ''){
                        $emp_name = $emp_name.$row->first_name;
                    }                    
                    if($row->middle_name != ''){
                        $emp_name = $emp_name.' '.$row->middle_name;
                    }
                    if($row->last_name != ''){
                        $emp_name = $emp_name.' '.$row->last_name;
                    }

                    $output .= '<li class="admin"><a id='.$row->id.' class="dropdown-item" onClick="pass_admin_id(this.id)" href="#">'.$emp_name.'</a></li>';
                }
                $output .= '</ul>';
                echo $output;
            }
        } else{
            $output = '';
            echo $output;
        }
    }

    public function project_save_customer(Request $request)
    {
        $modal_customer_name = $request->modal_customer_name;
        $modal_customer_description = $request->modal_customer_description;

        $customers = mCustomer::create([
            'customer_name' => $request->modal_customer_name,
            'customer_description' => (empty($request->modal_customer_description) ? '' :  $request->modal_customer_description),
        ]);

        return response()->json(['customer_name' => $customers->customer_name, 'customer_id' => $customers->id]);
    }

    public function searchProjectAjax(Request $request)
    {
        $projects = [];
        if($request->has('q')){
            $project_name = $request->q;
            $projects = mProject::select('m_projects.project_name', 'm_projects.id')
                                    ->where('m_projects.project_name', 'like', "%{$project_name}%")
                                    ->get();
        }
        return response()->json($projects);
    }

    public function insertProjectManagers($projectId, $managerIds) {        
        tProjectManager::where('project_id', $projectId)->delete();
        if(count($managerIds)) {
            foreach($managerIds as $employeeId) {
                $insertArr = [ 
                        'project_id' => $projectId,
                        'employee_id' => $employeeId
                    ]; 
                tProjectManager::insert($insertArr);
            }           
             
        }        
        return true;
    }

    public function insertProjectEmployees($projectId, $employeeIds) {
        $insertArr = [];
        tProjectEmployee::where('project_id', $projectId)->delete();
        if(count($employeeIds)) {
            foreach($employeeIds as $employeeId) {
                $insertArr = [ 
                        'project_id' => $projectId,
                        'employee_id' => $employeeId
                    ]; 
                tProjectEmployee::insert($insertArr);
            }
        }
        return true;
    }

    public function getProjectAssignedUsers($projectId, $type)
    {
        if($type == 'employees') {
            $out = Employee::join('t_project_employees', 't_project_employees.employee_id', 'employees.id');
        } else {
            $out = Employee::join('t_project_managers', 't_project_managers.employee_id', 'employees.id');
        }        
        $out = $out->where('project_id', $projectId)
                ->selectRaw('employees.id, CONCAT_WS (" ", first_name, middle_name, last_name) AS name')
                ->get()
                ->toArray();
        return $out;
    }
}
