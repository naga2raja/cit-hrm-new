<?php

namespace App\Http\Controllers\Leave\Entitlements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use DateTime;
use App\Role;
use App\Employee;
use App\mLeaveType;
use App\mLeavePeriod;
use App\mLeaveEntitlement;
use App\mCompanyLocation;
use App\mCountry;
use App\Http\Controllers\Leave\Leave\LeaveController;
use Session;
use DB;

class LeaveEntitlementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $leaveCtrl = new LeaveController;

        $user = Auth::user();
        $currentEmployeeDetails = $leaveCtrl->getEmployeeDetails($user->id);
        $employeeId = $currentEmployeeDetails->id;

        $empIds = [];
        if($user->hasRole('Manager')) {
            $userRole = 'Manager';
            //Find Reporting Employees Ids
            $reportTo = $leaveCtrl->getReportingEmployees($employeeId);
            if($reportTo)
                $empIds = explode(',', $reportTo->reporting_manager_ids);
        }
      DB::connection()->enableQueryLog();

      // for employees entitlement list

      $entitlement = [];
      $entitlement = mLeaveEntitlement::select('m_leave_entitlements.*', 'm_leave_entitlements.id as entitlement_id', 'employees.*', 'm_leave_types.*', 'm_leave_types.name as leave_type_name')
                ->join('employees', 'employees.id', 'm_leave_entitlements.emp_number')
                ->join('m_leave_types', 'm_leave_types.id', 'm_leave_entitlements.leave_type_id')
                ->selectRaw('employees.id as employee_id, CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name')
                ->when(request()->filled('emp_number'), function($query) {
                    $query->where('employees.id', request('emp_number'));
                })
                ->when(request()->filled('leave_type_id'), function($query) {
                    $query->where('m_leave_entitlements.leave_type_id', request('leave_type_id'));
                })
                ->when(request()->filled('from_date'), function ($query) {
                    $query->where('m_leave_entitlements.from_date', '>=', request('from_date'));
                })
                ->when(request()->filled('to_date'), function ($query) {
                    $query->where('m_leave_entitlements.to_date', '<=', request('to_date'));
                });
                if(count($empIds)) {
                    $entitlement->whereIn('m_leave_entitlements.emp_number', $empIds);
                }

      $entitlement = $entitlement->orderBy('m_leave_entitlements.from_date', 'asc')
                       ->get();
      // dd(DB::getQueryLog());

      $leave_types = mLeaveType::get();
      $leave_period = mLeaveEntitlement::select('from_date', 'to_date')
                                        ->selectRaw('CONCAT(from_date, " - ", to_date) as leave_period')
                                        ->distinct()
                                        ->get();

      return view('leave/entitlements/emp_list', compact('entitlement', 'leave_types', 'leave_period'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $employees = [];
        if($request->employee_id) {
            $employees = Employee::where('id', $request->employee_id)
                                ->selectRaw('id, CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name')
                                ->first();
        }
        // dd($employees);
        
        $country = mCountry::selectRaw('m_countries.id, m_countries.country')
                            ->join('m_company_locations', 'm_company_locations.country_id', 'm_countries.id')
                            ->groupBy('m_company_locations.country_id')
                            ->get();
        $company_location = mCompanyLocation::selectRaw('id, company_name')->get();
        $leave_types = mLeaveType::get();
        $leave_periods = mLeavePeriod::whereRaw('DATE_FORMAT(start_period, "%Y") = '. date('Y'))
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->groupBy('id')
            ->get();
        $leavePeriodsArr = [];
        if($leave_periods){
            $year = date('Y');
            foreach($leave_periods as $leave_period) {
                $month = $leave_period->start_month;
                $date = $leave_period->start_date;
                $from_date = $year."-" .str_pad($month, 2, "0", STR_PAD_LEFT)."-".str_pad($date, 2, "0", STR_PAD_LEFT);

                $end = new DateTime($from_date);
                $end->modify('+1 years -1 days');
                $end_date = $end->format('Y-m-d');

                $leave_period_value = $from_date.' - '.$end_date;
                $leave_period_name = $from_date.' - '.$end_date;
                $leavePeriodsArr[] = [
                    'id' => $leave_period->id,
                    'value' => $leave_period_value,
                    'name'  => $leave_period_name
                ];
            }
            
        }else{
            $from_date = "";
            $end_date = "";
            $leave_period_value = '';
            $leave_period_name = 'No Leave Period';
        }

        return view('leave/entitlements/add', compact('employees', 'leave_types', 'from_date', 'end_date', 'leave_period_name', 'leave_period_value', 'company_location', 'country', 'leavePeriodsArr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'location_id' => 'required_if:multiple_employee,on',
            'employee' => 'required_if:multiple_employee,off',
            'entitlement' => 'required|max:2',
            'leave_type' => 'required',
            'leave_period' => 'required'
        ]);

        // for single employee
        $employees = array(
            '0' => array('employee_id' => $request->input('emp_number'))
        );

        // for multiple employee
        if($request->input('multiple_employee') == "on"){
            $employees = Employee::select('employees.*', 'm_company_locations.*')
                    ->join('m_company_locations', 'm_company_locations.id', 'employees.company_location_id')
                    ->join('m_countries', 'm_countries.id', 'm_company_locations.country_id');

                    if($request->input('sub_unit_id') != '0'){
                        $employees->when(filled(request()->filled('sub_unit_id')), function($query) {
                                        $query->where('m_company_locations.id', request('sub_unit_id'));
                                    });
                    }

                    if($request->input('location_id') != '0'){
                        $employees->when(filled(request()->filled('location_id')), function($query) {
                                        $query->where('m_company_locations.country_id', request('location_id'));
                                    });
                    }
                    $employees = $employees->selectRaw('employees.id as employee_id')->get()->toArray();
        }

        $create_entitlements = [];
        $update_entitlements = [];
        foreach ($employees as $key => $emp) {
            // duplicate check
            $isExists = mLeaveEntitlement::where('emp_number', $emp['employee_id'])
                                          ->where('leave_type_id', $request->input('leave_type'))
                                          ->where('from_date', $request->input('from_date'))
                                          ->where('to_date', $request->input('to_date'))
                                          ->first();
            if(!$isExists) {
                // create new entitlement
                $create_entitlements = mLeaveEntitlement::create([
                    'emp_number' => $emp['employee_id'],
                    'no_of_days' => $request->input('entitlement'),
                    'days_used' => '0.0000',
                    'leave_type_id' => $request->input('leave_type'),
                    'from_date' => $request->input('from_date'),
                    'to_date' => $request->input('to_date'),
                    'entitlement_type' => '1'
                ]);
            }else{
                // update entitlement
                $no_of_days = $isExists->no_of_days + $request->input('entitlement');
                $update_entitlements = mLeaveEntitlement::where('emp_number', $emp['employee_id'])
                                                ->where('leave_type_id', $request->input('leave_type'))
                                                ->where('from_date', $request->input('from_date'))
                                                ->where('to_date', $request->input('to_date'))
                                                ->update(array('no_of_days' => $no_of_days));
            }            
        }

        $msg = ""; $msg_type = "";
        if($create_entitlements){
            $msg_type = "success";
            $msg = "Leave Entitlements Added Successfully";
        }
        else if($update_entitlements){
            $msg_type = "success";
            if(count($employees) > 1){
                $msg = "The selected leave entitlement will be applied to ".count($employees)." employees";
            }else{
                $msg = "Existing Entitlement value ".$isExists->no_of_days." updated to ".$no_of_days.".00";
            }
        }else{
            $msg_type = "error";
            $msg = "No employees match the selected filters";
        }

        return redirect()->route('leaveEntitlement.create')->with($msg_type, $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mLeaveEntitlement  $mLeaveEntitlement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mLeaveEntitlement  $mLeaveEntitlement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leave_periods = mLeavePeriod::orderBy('id', 'desc')->first();
        if($leave_periods){
            $year = date('Y');
            $month = $leave_periods->start_month;
            $date = $leave_periods->start_date;
            $from_date = $year."-" .str_pad($month, 2, "0", STR_PAD_LEFT)."-".str_pad($date, 2, "0", STR_PAD_LEFT);

            $end = new DateTime($from_date);
            $end->modify('+1 years -1 days');
            $to_date = $end->format('Y-m-d');

            $leave_period_value = $from_date.' - '.$to_date;
            $leave_period_name = $from_date.' - '.$to_date;
        }else{
            $from_date = "";
            $to_date = "";
            $leave_period_value = '';
            $leave_period_name = 'No Leave Period';
        }

        $entitlement = mLeaveEntitlement::select('m_leave_entitlements.*', 'm_leave_entitlements.id as entitlement_id', 'employees.*', 'm_leave_types.*', 'm_leave_types.name as leave_type_name')
                    ->join('employees', 'employees.id', 'm_leave_entitlements.emp_number')
                    ->join('m_leave_types', 'm_leave_types.id', 'm_leave_entitlements.leave_type_id')
                    ->selectRaw('employees.id as employee_id, CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name')
                    ->orderBy('m_leave_entitlements.from_date', 'asc')
                    ->find($id);
        // dd($entitlement);

        return view('leave/entitlements/edit', compact('entitlement', 'from_date', 'to_date', 'leave_period_name', 'leave_period_value'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mLeaveEntitlement  $mLeaveEntitlement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'leave_period' => 'required',
            'entitlement' => 'required|max:2',
        ]);

        $entitlement = mLeaveEntitlement::find($id);
        $entitlement->from_date = $request->input('from_date');
        $entitlement->to_date = $request->input('to_date');
        $entitlement->no_of_days = $request->input('entitlement');
        $entitlement->save();

        return redirect()->back()->with('success', 'Entitlement Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mLeaveEntitlement  $mLeaveEntitlement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteMultiple(Request $request)
    {
        if($request->delete_ids) {
            mLeaveEntitlement::whereIn('id', $request->delete_ids)
                ->get()
                ->map(function($entitlement) {
                    $entitlement->delete();
                });
            return true;
        } else {   
            return false;
        }       
    }

    public function getSubUnits(Request $request){

        $sub_units = [];
        if($request->location_id != ''){
            $location_id = $request->location_id;
            DB::connection()->enableQueryLog();

            $sub_units = mCompanyLocation::select('m_company_locations.id', 'm_company_locations.country_id', 'm_company_locations.company_name');
                                    if($location_id){
                                        $sub_units->where('m_company_locations.country_id', $location_id);
                                    }
                                    $sub_units = $sub_units->get();

            // dd(DB::getQueryLog());
        }
        return response()->json($sub_units);
    }

    public function getLeavePeriods(Request $request) {
        $country_id = $request->location_id;
        $sub_unit_id = $request->sub_unit_id;
        $leavePeriodsArr = [];

        if((!$request->is_multiple) || ($country_id != null && $country_id >= 0 && $sub_unit_id >= 0)) {
            
            $leave_periods = mLeavePeriod::join('m_company_locations', 'm_company_locations.id', 'm_leave_periods.sub_unit_id')
                ->whereRaw('DATE_FORMAT(start_period, "%Y") = '. date('Y'))
                ->selectRaw('m_leave_periods.*, m_company_locations.company_name')
                ->where('m_leave_periods.status', 1);

            if($request->is_multiple && $sub_unit_id > 0) {
                $leave_periods = $leave_periods->where('m_leave_periods.sub_unit_id', $sub_unit_id);
            }
            if($request->is_multiple && $country_id > 0) {
                $leave_periods = $leave_periods->where('m_leave_periods.country_id', $country_id);
            }         
            $leave_periods = $leave_periods->orderBy('m_leave_periods.id', 'desc')
                ->groupBy('m_leave_periods.id')
                ->get(); 
                
                $year = date('Y');
                foreach($leave_periods as $leave_period) {
                    $month = $leave_period->start_month;
                    $date = $leave_period->start_date;
                    $from_date = $year."-" .str_pad($month, 2, "0", STR_PAD_LEFT)."-".str_pad($date, 2, "0", STR_PAD_LEFT);
    
                    $end = new DateTime($from_date);
                    $end->modify('+1 years -1 days');
                    $end_date = $end->format('Y-m-d');
    
                    $leave_period_value = $from_date.' - '.$end_date;
                    $leave_period_name = $from_date.' - '.$end_date;
                    $leavePeriodsArr[] = [
                        'id' => $leave_period->id,
                        'value' => $leave_period_value,
                        'name'  => $leave_period_name,
                        'company_name' => $leave_period->company_name
                    ];
                }

        }                  
        return response()->json($leavePeriodsArr);
    }

}
