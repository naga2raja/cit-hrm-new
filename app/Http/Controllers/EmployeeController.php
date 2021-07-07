<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Employee;
use Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = Employee::join('users', 'users.id', 'employees.user_id');
        
        $where = '';
        if($request->employee_name) {
            $where .= ' ( employees.first_name LIKE "%'.$request->employee_name.'%" OR  employees.middle_name LIKE "%'.$request->employee_name.'%" OR employees.last_name LIKE "%'.$request->employee_name.'%" ) ';
            $employees = $employees->whereRaw($where);
        }        

        $employees = $employees->when(request()->filled('employee_id'), function ($query) {
            $query->where('employees.employee_id', request('employee_id'));
        })
        ->when(request()->filled('email'), function ($query) {
            $query->where('users.email', request('email'));
        })
        ->when(request()->filled('status'), function ($query) {
            $query->where('employees.status', request('status'));
        });


        $employees = $employees->paginate(5);
        // dd($employees);
        return view('employees/list', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'employee_id' => 'required',
            'email' => 'required|unique:users,email',
            'status' => 'required',
            'password' => [
                'required',
                'string',
                'min:8',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'confirm_password' => 'required|same:password',
        ]);

        $user = new User;
        $user->name = $request->first_name . ' '.$request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt('password');
        $user->save();

        $user->assignRole('Employee');

        $employee = new Employee;
        $employee->user_id = $user->id;
        $employee->first_name = $request->first_name;
        $employee->middle_name = $request->middle_name;
        $employee->last_name = $request->last_name;
        $employee->employee_id = $request->employee_id;
        $employee->status = $request->status;
        $employee->created_by = Auth::User()->id;
        $employee->updated_by = Auth::User()->id;        
        $employee->save();

        return redirect()->back()->with('success', 'Employee created successfully');        
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete(); 
        
        $employee = Employee::where('user_id', $id)->first();
        $employee->delete();        
        return redirect('employees')->with('success','Deleted Successfully');
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
}
