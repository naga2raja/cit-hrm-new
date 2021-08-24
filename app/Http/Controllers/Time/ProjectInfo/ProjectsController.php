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
use App\tEmployeeReportTo;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customer_id = $request->input('customer_id');
        $project_id = $request->input('project_id');
        $project_admin_id = $request->input('admin_id');
        
        DB::connection()->enableQueryLog(); 

        $projects = mProject::select(DB::raw('GROUP_CONCAT( DISTINCT m_customers.customer_name) as customer_name'),DB::raw("CONCAT_WS (' ', first_name, middle_name, last_name) as admin_name"), 'm_projects.id as project_id', 'm_projects.project_name as project_name')
                ->join('m_customers', 'm_projects.customer_id', 'm_customers.id')
                ->leftjoin('t_project_admins', 't_project_admins.project_id', 'm_projects.id')
                ->leftjoin('employees', 'employees.id', 't_project_admins.admin_id');
        if ($customer_id) {
            $projects->Where('m_customers.id', $customer_id);
        }
        if ($project_id) {
            $projects->Where('m_projects.id', $project_id);
        }
        if ($project_admin_id) {
            $projects->Where('t_project_admins.admin_id', $project_admin_id);
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
    
    public function customerAjaxSearch(Request $request)
    {
        $customer_name = $request->q;
        $customers = mCustomer::selectRaw('m_customers.customer_name as name, m_customers.id')
                                    ->where('m_customers.customer_name', 'like', "%{$customer_name}%")
                                    ->orderBy('m_customers.customer_name', 'ASC')
                                    ->get();
        return $customers;
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

    // autocomplete
    public function searchCustomerAjax(Request $request)
    {
        $customers = [];
        if($request->has('q')){
            $customer_name = $request->q;
            $customers = mCustomer::select('m_customers.customer_name', 'm_customers.id')
                                    ->where('m_customers.customer_name', 'like', "%{$customer_name}%")
                                    ->get();
        }
        return response()->json($customers);
    }

    // autocomplete
    public function searchProjectAjax(Request $request)
    {
        $currentUserAssignedProjects = getCurrentUserAssignedProjects();
        $projects = [];
        if($request->has('q')){
            $project_name = $request->q;
            $projects = mProject::select('m_projects.project_name', 'm_projects.id')
                                    ->where('m_projects.project_name', 'like', "%{$project_name}%");
            
            if($currentUserAssignedProjects['role'] != 'Admin') {
                $projects = $projects->whereIn('id', $currentUserAssignedProjects['project_ids'] );
            }
            $projects = $projects->get();
        }
        return response()->json($projects);
    }

    // autocomplete
    public function searchProjectAdminAjax(Request $request)
    {
        DB::connection()->enableQueryLog();
        $project_admin = [];
        if($request->has('q') && $request->q){
            $admin_name = $request->q;
            $where = '( employees.first_name LIKE "%'.$admin_name.'%" OR employees.middle_name LIKE "%'.$admin_name.'%" OR employees.last_name LIKE "%'.$admin_name.'%")';
            $project_admin = tProjectAdmin::select('t_project_admins.admin_id', 't_project_admins.admin_id')
                                    ->join('employees', 'employees.id', 't_project_admins.admin_id')
                                    ->selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) AS admin_name');
                                    $project_admin = $project_admin->whereRaw($where)
                                                    ->groupby('t_project_admins.admin_id')
                                                    ->get();
        }
        // dd(DB::getQueryLog());
        return response()->json($project_admin);
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

    public function checkAssignedEmployeeManagerAjax(Request $request) {
        $employeeIds = $request->employee_ids;
        $managerIds = $request->manager_ids;
        $out = [];
        if($employeeIds && count($employeeIds)) {
            foreach ($employeeIds as $employee) {
                $reportTo = tEmployeeReportTo::join('employees', 't_employee_report_to.manager_id', 'employees.id')
                    ->where('t_employee_report_to.employee_id', $employee)
                    ->selectRaw('GROUP_CONCAT(t_employee_report_to.manager_id) as manager_ids, GROUP_CONCAT(CONCAT_WS(" ",first_name, middle_name, last_name)) as manager_name ')
                    ->first();
                $employeeDet = Employee::where('id', $employee)->selectRaw('CONCAT_WS(" ",first_name, middle_name, last_name) as name')->first();
                if($reportTo && $reportTo->manager_name) {
                    $out[] = ['employee_id' => $employee, 'employee_name'=>$employeeDet->name, 'manager_name' => $reportTo->manager_name, 'manager_ids' => $reportTo->manager_ids];
                } else {
                    $out[] = ['employee_id' => $employee, 'employee_name'=>$employeeDet->name, 'manager_name' => 'Admin', 'manager_ids' => '1'];
                }
            }
        }
        return $out;
    }
}
