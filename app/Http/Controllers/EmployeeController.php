<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Employee;
use App\ContactDetails;
use App\mCountry;
use App\mJobTitle;
use App\mJobCategory;
use App\mCompanyLocation;
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
        $employees = Employee::where('first_name', '!=', NULL);
        
        $where = '';
        if($request->employee_name) {
            $where .= ' ( employees.first_name LIKE "%'.$request->employee_name.'%" OR  employees.middle_name LIKE "%'.$request->employee_name.'%" OR employees.last_name LIKE "%'.$request->employee_name.'%" ) ';
            $employees = $employees->whereRaw($where);
        }        

        $employees = $employees->when(request()->filled('employee_id'), function ($query) {
            $query->where('employees.employee_id', request('employee_id'));
        })
        ->when(request()->filled('email'), function ($query) {
            $query->where('employees.email', request('email'));
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
        $countries = mCountry::all();
        $jobTitles = mJobTitle::all();
        $jobCategories = mJobCategory::get();
        $locations = mCompanyLocation::get();
        return view('employees/add', compact('jobTitles', 'jobCategories', 'locations','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationArr = ['first_name' => 'required',
            'last_name' => 'required',
            'employee_id' => 'required',
            'email' => 'required|unique:employees,email',
            'status' => 'required',            
        ];

        if($request->create_login) {
            $validationArr['password'] = [
                'required_if:create_login,1',
                'string',
                'min:8',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ];
            $validationArr['confirm_password'] = 'required_if:create_login,1|same:password';
        }

        $request->validate($validationArr);
        $userId = NULL;
        if($request->create_login) {
            //check if already exists
            $isExists = User::where('email', $request->email)->first();
            if($isExists) {
                return redirect()->back()->with('error', 'Email already Exists');        
            }
            $user = new User;
            $user->name = $request->first_name . ' '.$request->last_name;
            $user->email = $request->email;
            $user->password = bcrypt('password');
            $user->save();

            $user->assignRole('Employee');

            $userId = $user->id;
        }
        

        $employee = new Employee;
        $employee->user_id = $userId;
        $employee->email = $request->email;
        $employee->first_name = $request->first_name;
        $employee->middle_name = $request->middle_name;
        $employee->last_name = $request->last_name;
        $employee->employee_id = $request->employee_id;
        $employee->status = $request->status;
        $employee->date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));
        $employee->marital_status = $request->marital_status;
        $employee->gender = $request->gender;
        $employee->job_id = $request->job_id;
        $employee->job_category_id = $request->job_category_id;
        $employee->joined_date = $request->joined_date;
        $employee->company_location_id = $request->company_location_id;
        $employee->created_by = Auth::User()->id;
        $employee->updated_by = Auth::User()->id;      
        
        if ($request->file('profile_photo')) {
            $imagePath = $request->file('profile_photo');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('profile_photo')->storeAs('uploads', $imageName, 'public');
            $employee->profile_photo = '/storage/'.$path;
        }
        $employee->save();

        $contactInfo = [
            'street_address_1' => $request->street_address_1,
            'street_address_2' => $request->street_address_2,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'country' => $request->country,
            'home_telephone' => $request->home_telephone,
            'mobile' => $request->mobile,
            'work_telephone' => $request->work_telephone,
            'alternate_email' => $request->alternate_email,
            'user_id' => $employee->id
        ];
        // insert
        ContactDetails::insert($contactInfo);        

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
        $employee = Employee::where('id', $id)->first();
        
        $contactInfo =  ContactDetails::where('user_id', $id)->first();
                
        $countries = mCountry::all();
        $jobTitles = mJobTitle::all();
        $jobCategories = mJobCategory::get();
        $locations = mCompanyLocation::get();
        $jobDetails = '';
        if($employee && $employee->job_id) {
            $jobDetails = mJobTitle::find($employee->job_id);
        }

        return view('employees/edit', compact('id', 'employee', 'countries', 'contactInfo', 'jobTitles', 'jobCategories', 'locations', 'jobDetails'));
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
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'employee_id' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'status' => 'required',
            'alternate_email' => 'email|nullable',
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024|nullable'
        ]);

        // $user = User::where('id', $id)->first();
        // $user->name = $request->first_name . ' '.$request->last_name;
        // $user->email = $request->email;
        // $user->save();

        $employeeArr = [
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'employee_id' => $request->employee_id,
            'status' => $request->status,
            'date_of_birth' => date('Y-m-d', strtotime($request->date_of_birth)),
            'marital_status' => $request->marital_status,
            'gender' => $request->gender,            
            'updated_by' => Auth::User()->id,

            //job details
            'job_id' => $request->job_id,
            'job_category_id' => $request->job_category_id,
            'joined_date' => $request->joined_date, //date('Y-m-d', strtotime($request->joined_date)),
            'company_location_id' => $request->company_location_id
        ];
        if ($request->file('profile_photo')) {
            $imagePath = $request->file('profile_photo');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('profile_photo')->storeAs('uploads', $imageName, 'public');
            $employeeArr['profile_photo'] = '/storage/'.$path;
        }

        $employee = Employee::where('id', $id)->update($employeeArr);        

        //update contact details
        $contactDetails = ContactDetails::where('user_id', $id)->first();
        $contactInfo = [
            'street_address_1' => $request->street_address_1,
            'street_address_2' => $request->street_address_2,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'country' => $request->country,
            'home_telephone' => $request->home_telephone,
            'mobile' => $request->mobile,
            'work_telephone' => $request->work_telephone,
            'alternate_email' => $request->alternate_email
        ];
        if($contactDetails) {
            //update
            ContactDetails::where('user_id', $id)->update($contactInfo); 
        } else {
            // insert
            $contactInfo['user_id'] = $id;
            ContactDetails::insert($contactInfo);
        }

        return redirect()->back()->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $user = User::where('id', $id)->first();
        // $user->delete(); 
        
        $employee = Employee::where('id', $id)->first();
        $employee->delete();        
        return redirect('employees')->with('success','Deleted Successfully');
    }

    public function deleteMultiple(Request $request)
    {       
        if($request->delete_ids) {
            // User::whereIn('id', $request->delete_ids)
            //     ->get()
            //     ->map(function($user) {
            //         $user->delete();
            //     });
            Employee::whereIn('id', $request->delete_ids)
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
