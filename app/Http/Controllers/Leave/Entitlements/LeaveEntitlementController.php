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

        return view('leave/entitlements/add', compact('employees', 'leave_types', 'from_date', 'end_date', 'leave_period_name', 'leave_period_value', 'company_location'));
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
            'employee' => 'required',
            'entitlement' => 'required|max:2',
            'leave_type' => 'required',
            'leave_period' => 'required'
        ]);

        // for single employee
        $employees = array(
            '0' => array('employee_id' => $request->input('emp_number'))
        );

        // for multiple employee
        if($request->input('multiple_employee')){
            $employees = Employee::select('employees.*', 'm_company_locations.*')
                    ->join('m_company_locations', 'm_company_locations.id', 'employees.company_location_id')
                    ->join('m_countries', 'm_countries.id', 'm_company_locations.country_id')
                    ->when(filled($location_id), function($query) use ($location_id) {
                        $query->where('m_company_locations.country_id', request('location_id'));
                    })
                    ->when(filled($sub_unit_id), function($query) use ($sub_unit_id) {
                        $query->where('m_company_locations.id', request('sub_unit_id'));
                    })->selectRaw('employees.id as employee_id');
                    $employees = $employees->get()->toArray();
        }

        foreach ($employees as $key => $emp) {
            $entitlements = mLeaveEntitlement::create([
                'emp_number' => $emp['employee_id'],
                'no_of_days' => $request->input('entitlement'),
                'days_used' => '0.0000',
                'leave_type_id' => $request->input('leave_type'),
                'from_date' => $request->input('from_date'),
                'to_date' => $request->input('to_date'),
                'entitlement_type' => '1'
            ]);
        }

        // duplicate check
        // $isExists = mLeaveEntitlement::where('emp_number', $request->input('emp_number'))
        //                               ->where('leave_type_id', $request->input('leave_type'))
        //                               ->first();
        // if($isExists) {
        //     return redirect()->back()->with('error', 'Leave Entitlements already Exists');        
        // }

        return redirect()->route('entitlements.create')->with('success', 'Leave Entitlements Added successfully');
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
