<?php

namespace App\Http\Controllers\Leave\Entitlements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use DateTime;
use App\Role;
use App\mLeaveType;
use App\mLeavePeriod;
use App\mLeaveEntitlement;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leave_types = mLeaveType::get();
        $leave_periods = mLeavePeriod::get();

        if(count($leave_periods) > 0){
            $year = date('Y');
            $month = $leave_periods[0]->start_month;
            $date = $leave_periods[0]->start_date;
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

        return view('leave/entitlements/add', compact('leave_types', 'from_date', 'end_date', 'leave_period_name', 'leave_period_value'));
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

        // duplicate check
        $isExists = mLeaveEntitlement::where('emp_number', $request->input('emp_number'))
                                      ->where('leave_type', $request->input('leave_type'))
                                      ->first();
        if($isExists) {
            return redirect()->back()->with('error', 'Leave Entitlements already Exists');        
        }

        $entitlements = mLeaveEntitlement::create([
            'emp_number' => $request->input('emp_number'),
            'no_of_days' => $request->input('entitlement'),
            'days_used' => '0.0000',
            'leave_type_id' => $request->input('leave_type'),
            'from_date' => $request->input('from_date'),
            'to_date' => $request->input('to_date'),
            'entitlement_type' => '1'
        ]);

        return redirect()->route('entitlements.create')->with('success', 'Leave Entitlements Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mLeaveEntitlement  $mLeaveEntitlement
     * @return \Illuminate\Http\Response
     */
    public function show(mLeaveEntitlement $mLeaveEntitlement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mLeaveEntitlement  $mLeaveEntitlement
     * @return \Illuminate\Http\Response
     */
    public function edit(mLeaveEntitlement $mLeaveEntitlement)
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
    public function update(Request $request, mLeaveEntitlement $mLeaveEntitlement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mLeaveEntitlement  $mLeaveEntitlement
     * @return \Illuminate\Http\Response
     */
    public function destroy(mLeaveEntitlement $mLeaveEntitlement)
    {
        //
    }
}
