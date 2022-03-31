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
use App\tJobDetailsHistory;
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
        if(Auth::user()->hasRole('Employee')) {
            return redirect('/');
        }
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
        })->selectRaw('employees.*');

        if(Auth::user()->hasRole('Manager')) {
            $managerDet = Employee::where('user_id', Auth::user()->id)->first();
            $employees = $employees->join('t_employee_report_to', 't_employee_report_to.employee_id', 'employees.id');
            $employees = $employees->where('t_employee_report_to.manager_id', $managerDet->id);
        }

        $employees = $employees->paginate(10);
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
        $locations = mCompanyLocation::select('m_company_locations.*', 'm_countries.country')->join('m_countries', 'm_countries.id', 'm_company_locations.country_id')->get();
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
        $validationArr = [
            'first_name' => 'required',
            'last_name' => 'required',
            'employee_id' => 'required|unique:employees,employee_id',
            'email' => 'required|unique:employees,email|email:rfc,dns',
            'alternate_email' => 'nullable|email:rfc,dns',
            'status' => 'required', 
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024|nullable',
            'company_location_id' => 'required',         
            'resume_document' => 'nullable|mimes:pdf,doc,docx|max:1024'
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

        // for resume_document
        if ($request->file('resume_document')) {
            $imagePath = $request->file('resume_document');
            $imageName = time().'_'.$imagePath->getClientOriginalName();

            $path = $request->file('resume_document')->storeAs('uploads/resume', $imageName, 'public');
            $employee->resume_document = '/storage/'.$path;
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
        $locations = mCompanyLocation::select('m_company_locations.*', 'm_countries.country')->join('m_countries', 'm_countries.id', 'm_company_locations.country_id')->get();

        $jobDetailsHistory = tJobDetailsHistory::join('m_job_titles', 'm_job_titles.id', 't_job_details_histories.job_id')
                                            ->join('m_job_categories', 'm_job_categories.id', 't_job_details_histories.job_category_id')
                                            ->join('m_company_locations', 'm_company_locations.id', 't_job_details_histories.company_location_id')
                                            ->join('m_countries', 'm_countries.id', 'm_company_locations.country_id')
                                            ->where('employee_id', $id)
                                            ->select('t_job_details_histories.*', 'm_job_titles.job_title', 'm_job_titles.job_description', 'm_job_categories.name', 'm_company_locations.company_name', 'm_countries.country')
                                            ->orderBy('start_date', 'desc')
                                            ->get();
        
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

        return view('employees/edit', compact('id', 'employee', 'countries', 'contactInfo', 'jobTitles', 'jobCategories', 'jobDetailsHistory', 'locations', 'jobDetails', 'reportTo', 'assigned_managers'));
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
            'email' => 'required|email:rfc,dns|unique:employees,email,'.$id,
            'status' => 'sometimes|required',            
            'alternate_email' => 'nullable|email:rfc,dns',
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024|nullable',
            'company_location_id' => 'sometimes|required',
            'resume_document' => 'nullable|mimes:pdf,doc,docx|max:1024'
        ]);

        // $user = User::where('id', $id)->first();
        // $user->name = $request->first_name . ' '.$request->last_name;
        // $user->email = $request->email;
        // $user->save();

        $employee = Employee::where('id', $id)->first();

        $isNotSame = [];
        if($request->my_info == 'no'){
            if(($employee->joined_date != '')&&($employee->job_id != '')){
                
                $isNotSame = Employee::where('id', $id)
                                ->when($request->joined_date, function ($q) use ($request) {
                                    $q->orWhere('joined_date', '!=', $request->joined_date);
                                })
                                ->when($request->job_category_id, function ($q) use ($request) {
                                    $q->orWhere('job_category_id', '!=', $request->job_category_id);
                                })
                                ->when($request->job_id, function ($q) use ($request) {
                                    $q->orWhere('job_id', '!=', $request->job_id);
                                })
                                ->when($request->company_location_id, function ($q) use ($request) {
                                    $q->orWhere('company_location_id', '!=', $request->company_location_id);
                                })
                                // ->whereRaw('(joined_date != "'.$request->joined_date.'" or job_category_id !='.$request->job_category_id.' or job_id != '.$request->job_id.' or company_location_id != '.$request->company_location_id.')')
                                ->first();
            }
        }

        // end date (reduce 1 day from the latest join date)
        $end_date = date('Y-m-d', strtotime('-1 day', strtotime($request->joined_date)));

        if($isNotSame){
            // insert history data into tJobDetailsHistory
            $jobDetailsHistory = tJobDetailsHistory::create([
                'employee_id'  => $isNotSame->id,
                'start_date'  => $isNotSame->joined_date,
                'end_date'  => $end_date,
                'job_category_id'  => $isNotSame->job_category_id,
                'job_id'  => $isNotSame->job_id,
                'company_location_id' => $isNotSame->company_location_id,
                'created_at' => Auth::user()->id
            ]);
        }

        $employeeArr = [
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'employee_id' => $request->employee_id,
            // 'status' => $request->status,
            'date_of_birth' => date('Y-m-d', strtotime($request->date_of_birth)),
            'marital_status' => $request->marital_status,
            'gender' => $request->gender,            
            'updated_by' => Auth::User()->id,

            //job details
            // 'job_id' => $request->job_id,
            // 'job_category_id' => $request->job_category_id,
            // 'joined_date' => $request->joined_date, //date('Y-m-d', strtotime($request->joined_date)),
            // 'company_location_id' => $request->company_location_id
        ];

        // if email is changed update in the users table also 
        if($employee->user_id && ($employee->email != $request->email ) ) {

            $request->validate([           
                'email' => 'required|email:rfc,dns|unique:users,email,'.$employee->user_id
            ]);

            $userDet = User::where('id', $employee->user_id)->first();
            if($userDet) {
                $userDet->email = $request->email;
                $userDet->save();      
            }
        }

        if($request->my_info != 'yes'){
            $employeeArr['company_location_id'] = $request->company_location_id;
            $employeeArr['status'] = $request->status;
            $employeeArr['joined_date'] = $request->joined_date;
            $employeeArr['job_category_id'] = $request->job_category_id;
            $employeeArr['job_id'] = $request->job_id;
        }

        if ($request->file('profile_photo')) {
            $imagePath = $request->file('profile_photo');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('profile_photo')->storeAs('uploads', $imageName, 'public');
            $employeeArr['profile_photo'] = '/storage/'.$path;
        }

        // for resume_document
        if ($request->file('resume_document')) {
            $imagePath = $request->file('resume_document');
            $imageName = time().'_'.$imagePath->getClientOriginalName();

            $path = $request->file('resume_document')->storeAs('uploads/resume', $imageName, 'public');
            $employeeArr['resume_document'] = '/storage/'.$path;
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
        }else{
            // assigned_managers empty then delete
            tEmployeeReportTo::where('employee_id', $id)->delete();
        }      
        if($request->my_info == 'yes') {
            return redirect()->back()->with('success', 'Profile updated successfully');
        } else {
            return redirect('employees')->with('success', 'Employee updated successfully');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::where('id', $id)->first();
        
        $user = User::where('id', $employee->user_id)->first();
        $user->delete();
         
        $employee->delete();     
        
        return redirect('employees')->with('success','Deleted Successfully');
    }

    public function deleteMultiple(Request $request)
    {       
        if($request->delete_ids) {
            User::join('employees', 'employees.user_id', 'users.id')->whereIn('employees.id', $request->delete_ids)
                ->get()
                ->map(function($user) {
                    $user->delete();
                });

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
                    ->selectRaw('email');

            // $data = $data->where('first_name','LIKE',"%$search%")
            //         ->orWhere('middle_name','LIKE',"%$search%")
            //         ->orWhere('last_name','LIKE',"%$search%")
            //         ->orwhere(DB::raw("CONCAT(first_name, middle_name, last_name)"), 'LIKE', "%$string%");

            $data = $data->whereRaw(' (first_name LIKE "%'.$search.'%" OR middle_name LIKE "%'.$search.'%" OR last_name LIKE "%'.$search.'%" OR CONCAT(first_name, middle_name, last_name) LIKE "%'.$search.'%" ) ');
            $empIds = [];
            if(Auth::user()->hasRole('Manager')) {
                $employee = $leaveCtrl->getEmployeeDetails(Auth::user()->id);
                $reportTo = $leaveCtrl->getReportingEmployees($employee->id);
                
                if($reportTo){
                    $empIds = explode(',', $reportTo->reporting_manager_ids);
                }
                
                $data = $data->join('t_employee_report_to', 't_employee_report_to.employee_id', 'employees.id')
                             ->whereIn('employees.id', $empIds);
            }
            if($request->has('mgids') && $request->mgids) {
                $data = $data->whereRaw('employees.id NOT IN ('.$request->mgids.')');
            } 
            if($request->has('managers_only') && $request->managers_only) {
                $data = $data->join('model_has_roles', 'model_has_roles.model_id', 'employees.user_id')
                    ->where('model_has_roles.role_id', '!=', 3); //show only managers
            }           
            $data = $data->groupBy('employees.id')->get();
        }
        return response()->json($data);
    }

    public function myInfo(Request $request)
    {        
        $employee = Employee::where('user_id', Auth::user()->id)->first();
        $id = $employee->id;
        
        $contactInfo =  ContactDetails::where('user_id', $id)->first();
                
        $countries = mCountry::all();
        $jobTitles = mJobTitle::all();
        $jobCategories = mJobCategory::get();
        $locations = mCompanyLocation::select('m_company_locations.*', 'm_countries.country')->join('m_countries', 'm_countries.id', 'm_company_locations.country_id')->get();

        $jobDetailsHistory = tJobDetailsHistory::join('m_job_titles', 'm_job_titles.id', 't_job_details_histories.job_id')
                                            ->join('m_job_categories', 'm_job_categories.id', 't_job_details_histories.job_category_id')
                                            ->join('m_company_locations', 'm_company_locations.id', 't_job_details_histories.company_location_id')
                                            ->join('m_countries', 'm_countries.id', 'm_company_locations.country_id')
                                            ->where('employee_id', $id)
                                            ->select('t_job_details_histories.*', 'm_job_titles.job_title', 'm_job_titles.job_description', 'm_job_categories.name', 'm_company_locations.company_name', 'm_countries.country')
                                            ->orderBy('start_date', 'desc')
                                            ->get();
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

        return view('employees/edit', compact('id', 'employee', 'countries', 'contactInfo', 'jobTitles', 'jobDetailsHistory', 'jobCategories', 'locations', 'jobDetails', 'reportTo', 'assigned_managers'));
    }

    public function getEmployeeChartData(Request $request)
    {
        $employee_details = mJobTitle::selectRaw('m_job_titles.job_title as name, (SELECT COUNT(e.id) FROM employees e WHERE employees.job_id = e.job_id ) as y')
                                    ->leftJoin('employees', 'employees.job_id', 'm_job_titles.id')
                                    ->where('m_job_titles.job_title', '!=', '')
                                    ->groupBy('employees.job_id')
                                    ->get();

        return response()->json($employee_details);
    }

    public function updateProfileImage(Request $request)
    {
        $employeeId = (@$request->emp_user_id) ? $request->emp_user_id : Auth::User()->id;
        $employee = Employee::where('user_id', $employeeId)->first();
        $employee->updated_by = Auth::User()->id;      
        
        if ($request->file('profile_photo')) {
            $imagePath = $request->file('profile_photo');
            $imageName = $imagePath->getClientOriginalName();

            $path = $request->file('profile_photo')->storeAs('uploads', $imageName, 'public');
            $employee->profile_photo = '/storage/'.$path;
        }
        $employee->save();
        return redirect()->back()->with('message', 'Profile image uploaded successfully!');
    }
}
