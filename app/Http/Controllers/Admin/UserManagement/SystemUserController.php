<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Employee;
use App\Role;
use Session;
use DB;

class SystemUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        $username = $request->input('email');
        $name = $request->input('name');
        $role = $request->input('role');
        $status = $request->input('status');
        
        DB::connection()->enableQueryLog();

        $users = User::select('users.*', 'employees.*', 'employees.status as emp_status', 'roles.name as role_name')
                    ->join('model_has_roles', 'model_has_roles.model_id', 'users.id')
                    ->join('roles', 'roles.id', 'model_has_roles.role_id')
                    ->join('employees', 'employees.email', 'users.email');
        
        if ($username) {
            $users->Where('users.email', 'like', "%$username%");
        }
        if ($name) {
            // remove the space in string
            $string = str_replace(' ', '', $name);
            $users->Where(DB::raw("CONCAT(employees.first_name, employees.middle_name, employees.last_name)"), 'LIKE', "%$string%");
        }
        if (($role)&&($role != "all")) {
            $users->Where('roles.name', $role);
        }
        if ($status) {
            $users->Where('employees.status', $status);
        }
        $users = $users->orderBy('users.id', 'asc')
                       ->paginate(5);

        // dd(DB::getQueryLog());

        $roles = Role::get();
        return view('admin/system_users/list', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderBy('id', 'desc')->get();
        return view('admin/system_users/add', compact('roles'));
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
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required'
        ]);

        // duplicate check
        $isExists = User::where('email', $request->input('email'))->first();
        if($isExists) {
            return redirect()->back()->with('error', 'Username already Exists');        
        }

        $user = User::create([
            'name'  => $request->input('name'),
            'email'  => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);
        $user->assignRole($request->input('role'));

        // update user_id in employee table
        if($user){
            $employee = Employee::where('email', $request->input('email'))
                                ->update(array('user_id' => $user->id));
        }

        return redirect()->route('systemUsers.index')->with('success', 'System User Added successfully');
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
        $users = User::select('roles.name as role_name', 'roles.id as role_id', 'users.*')
                    ->join('model_has_roles', 'model_has_roles.model_id', 'users.id')
                    ->join('roles', 'roles.id', 'model_has_roles.role_id')
                    ->where('users.id', $id)
                    ->get();
        // dd($users);
        $roles = Role::orderBy('id', 'desc')->get();
        return view('admin/system_users/edit', compact('users', 'roles'));
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
            'role' => 'required'
        ]);

        $users = User::find($id);
        $users->name = $request->input('name');
        $users->save();

        $users->syncRoles($request->input('role'));

        return redirect()->back()->with('success', 'System User Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteMultiple(Request $request)
    {
        if($request->delete_ids) {
            User::whereIn('id', $request->delete_ids)
                ->get()
                ->map(function($user) {
                    $user->delete();
                });
            Employee::whereIn('user_id', $request->delete_ids)
                ->get()
                ->map(function($emp) {
                    $emp->delete();
                });
            return true;
        } else {   
            return false;
        }       
    }

    public function employeeNameSearch(Request $request)
    {
        DB::connection()->enableQueryLog();

        $employee_name = $request->employee_name;

        // dd($request->employee_name);

        if(!empty(trim($employee_name))){
            $query1 = Employee::where('employees.first_name', 'like', "%{$employee_name}%")
                                    ->orwhere('employees.middle_name', 'like', "%{$employee_name}%")
                                    ->orwhere('employees.last_name', 'like', "%{$employee_name}%")
                                    ->get();

            $string = str_replace(' ', '', $employee_name);
            $query2 = Employee::where(DB::raw("CONCAT(employees.first_name, employees.middle_name, employees.last_name)"), 'LIKE', "%$string%")
                                ->get();

            // dd(DB::getQueryLog());

            $employees = [];
            if(count($query1) != 0){
                $employees = $query1;
            }
            elseif(count($query2) != 0){
                $employees = $query2;
            }

            if(count($employees) != 0){
                $output = '<ul class="list-group" style="display:block; position:relative;">';
                foreach($employees as $row) {
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
                    
                   $output .= '<li id='.$row->id.' class="list-group-item employees" emp_no='.$row->employee_id.' emp_email='.$row->email.'><a class="dropdown-item">'.$emp_name.'</a></li>';
                }
                $output .= '</ul>';
                echo $output;
            } else{
                $output = "";
                echo $output;
            }
        } else{
            $output = "";
            echo $output;
        }
    }
}
