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
use Session;
use DB;

class LeaveEntitlementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // for employees entitlement list
        $employees = []; $entitlement = [];

        $leave_types = mLeaveType::get();
        $leave_periods = mLeavePeriod::orderBy('id', 'desc')->first();

        if($leave_periods){
            $year = date('Y');
            $month = $leave_periods->start_month;
            $date = $leave_periods->start_date;
            $from_date = $year."-" .str_pad($month, 2, "0", STR_PAD_LEFT)."-".str_pad($date, 2, "0", STR_PAD_LEFT);

            $end = new DateTime($from_date);
            $end->modify('+1 years -1 days');
            $end_date = $end->format('Y-m-d');

            $leave_period_value = $from_date.' - '.$end_date;
            $leave_period_name = $from_date.' - '.$end_date;
        }else{
            $from_date = "";
            $end_date = "";
            $leave_period_value = '';
            $leave_period_name = 'No Leave Period';
        }

        return view('leave/entitlements/emp_entitle_list', compact('employees', 'entitlement', 'leave_types', 'from_date', 'end_date', 'leave_period_name', 'leave_period_value'));
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
            $employees = Employee::where('id', $request->employee_id)->first();
        }
        // dd($employees);
        
        $country = mCountry::get();
        $company_location = mCompanyLocation::get();
        $leave_types = mLeaveType::get();
        $leave_periods = mLeavePeriod::orderBy('id', 'desc')->first();

        if($leave_periods){
            $year = date('Y');
            $month = $leave_periods->start_month;
            $date = $leave_periods->start_date;
            $from_date = $year."-" .str_pad($month, 2, "0", STR_PAD_LEFT)."-".str_pad($date, 2, "0", STR_PAD_LEFT);

            $end = new DateTime($from_date);
            $end->modify('+1 years -1 days');
            $end_date = $end->format('Y-m-d');

            $leave_period_value = $from_date.' - '.$end_date;
            $leave_period_name = $from_date.' - '.$end_date;
        }else{
            $from_date = "";
            $end_date = "";
            $leave_period_value = '';
            $leave_period_name = 'No Leave Period';
        }

        return view('leave/entitlements/add', compact('employees', 'leave_types', 'from_date', 'end_date', 'leave_period_name', 'leave_period_value', 'company_location', 'country'));
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
                    ->join('m_countries', 'm_countries.id', 'm_company_locations.country_id')
                    ->when(filled(request()->filled('sub_unit_id')), function($query) {
                        $query->where('m_company_locations.id', request('sub_unit_id'));
                    })->selectRaw('employees.id as employee_id');

                    if($request->input('location_id') != '0'){
                        $employees->where('m_company_locations.country_id', request('location_id'));
                    }
                    $employees = $employees->get()->toArray();
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
            $msg = "'success', 'Leave Entitlements Added successfully'";
        }
        else if($update_entitlements){
            $msg_type = "success";
            if(count($employees) > 1){
                $msg = "The selected leave entitlement will be applied to the employees";
            }else{
                $msg = "Existing Entitlement value ".$isExists->no_of_days." will be updated to ".$no_of_days.".00";
            }
        }else{
            $msg_type = "error";
            $msg = "Failed, No employees match the selected filters";
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mLeaveEntitlement  $mLeaveEntitlement
     * @return \Illuminate\Http\Response
     */
    public function updateupdate(Request $request, $id)
    {
        //
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
}
