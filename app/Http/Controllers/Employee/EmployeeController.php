<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Employee;
use App\ContactDetails;
use App\mCountry;
use App\mJobTitle;
use App\mJobCategory;
use App\mCompanyLocation;
use App\tEmployeeReportTo;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Leave\Leave\LeaveController;

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

        if(Auth::user()->hasRole('Manager')) {
            $managerDet = Employee::where('user_id', Auth::user()->id)->first();
            $employees = $employees->join('t_employee_report_to', 't_employee_report_to.employee_id', 'employees.id');
            $employees = $employees->where('t_employee_report_to.manager_id', $managerDet->id);
        }

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
            'employee_id' => 'required|unique:employees,employee_id',
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
            $user->password =  Hash::make($request->password);
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
        
        //update report to
        if($request->assigned_managers) {
            $empIds = explode(',', $request->assigned_managers);            
            foreach($empIds as $managerId) {
                $report = new tEmployeeReportTo;
                $report->employee_id = $employee->id;
                $report->manager_id = $managerId;
                $report->save();
            }
        }

        return redirect('employees')->with('success', 'Employee created successfully');        
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

        $reportTo = tEmployeeReportTo::join('employees', 't_employee_report_to.manager_id', 'employees.id')
            ->where('t_employee_report_to.employee_id', $id)
            ->selectRaw('employees.id as id, CONCAT(first_name, " ", last_name) as name')
            ->groupBy('t_employee_report_to.manager_id')
            ->get();
        $assigned_managers = [];
        foreach($reportTo as $manager) {
            $assigned_managers[] = $manager->id;
        } 
        $assigned_managers = implode(',',  $assigned_managers);

        return view('employees/edit', compact('id', 'employee', 'countries', 'contactInfo', 'jobTitles', 'jobCategories', 'locations', 'jobDetails', 'reportTo', 'assigned_managers'));
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
            'employee_id' => 'required|unique:employees,employee_id,'.$id,
            'email' => 'required|unique:employees,email,'.$id,
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

        //update report to
        if($request->assigned_managers) {
            $empIds = explode(',', $request->assigned_managers);
            tEmployeeReportTo::where('employee_id', $id)->delete();
            foreach($empIds as $managerId) {
                $report = new tEmployeeReportTo;
                $report->employee_id = $id;
                $report->manager_id = $managerId;
                $report->save();
            }
        }       

        return redirect('employees')->with('success', 'Employee updated successfully');
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

    public function searchEmployeeAjax(Request $request)
    {
        $leaveCtrl = new LeaveController;
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $string = str_replace(' ', '', $search);
            $data = Employee::select("employees.id")
                    ->selectRaw('CONCAT_WS (" ", first_name, middle_name, last_name) as name')
                    ->selectRaw('employees.employee_id')
                    ->selectRaw('email')
            		->where('first_name','LIKE',"%$search%")
                    ->orWhere('middle_name','LIKE',"%$search%")
                    ->orWhere('last_name','LIKE',"%$search%")
                    ->orwhere(DB::raw("CONCAT(first_name, middle_name, last_name)"), 'LIKE', "%$string%");
            $empIds = [];
            if(Auth::user()->hasRole('Manager')) {
                $employee = $leaveCtrl->getEmployeeDetails(Auth::user()->id);
                $reportTo = $leaveCtrl->getReportingEmployees($employee->id);
                
                if($reportTo)
                    $empIds = explode(',', $reportTo->reporting_manager_ids);
                
                $data = $data->join('t_employee_report_to', 't_employee_report_to.employee_id', 'employees.id')
                    ->whereIn('employees.id', $empIds);
            }            
            $data = $data->groupBy('employees.id')->get();
        }
        return response()->json($data);
    }

    public function myInfo(Request $request)
    {        
        $employee = Employee::where('id', Auth::user()->id)->first();
        $id = $employee->id;
        
        $contactInfo =  ContactDetails::where('user_id', $id)->first();
                
        $countries = mCountry::all();
        $jobTitles = mJobTitle::all();
        $jobCategories = mJobCategory::get();
        $locations = mCompanyLocation::get();
        $jobDetails = '';
        if($employee && $employee->job_id) {
            $jobDetails = mJobTitle::find($employee->job_id);
        }

        $reportTo = tEmployeeReportTo::join('employees', 't_employee_report_to.manager_id', 'employees.id')
            ->where('t_employee_report_to.employee_id', $id)
            ->selectRaw('employees.id as id, CONCAT(first_name, " ", last_name) as name')
            ->groupBy('t_employee_report_to.manager_id')
            ->get();
        $assigned_managers = [];
        foreach($reportTo as $manager) {
            $assigned_managers[] = $manager->id;
        } 
        $assigned_managers = implode(',',  $assigned_managers);

        return view('employees/edit', compact('id', 'employee', 'countries', 'contactInfo', 'jobTitles', 'jobCategories', 'locations', 'jobDetails', 'reportTo', 'assigned_managers'));
    }
}
