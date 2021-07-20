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
use Session;
use DB;

class MyLeaveEntitlementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::User()->id;
        $employees = Employee::where('user_id', $user_id)->first();
        // dd($entitlement);

        DB::connection()->enableQueryLog();

        $entitlement = [];
        if($employees){
            $entitlement = mLeaveEntitlement::select('m_leave_entitlements.*', 'm_leave_types.*')
                            ->join('m_leave_types', 'm_leave_types.id', 'm_leave_entitlements.leave_type_id')
                            ->when(filled($employees->id), function($query)use($employees_id) {
                                $query->where('m_leave_entitlements.emp_number', $employees->id);
                            })
                            ->when(request()->filled('leave_type_id'), function($query) {
                                $query->where('m_leave_entitlements.leave_type_id', request('leave_type_id'));
                            })
                            ->when(request()->filled('from_date'), function($query) {
                                $query->where('m_leave_entitlements.from_date', request('from_date'));
                            })
                            ->when(request()->filled('to_date'), function($query) {
                                $query->where('m_leave_entitlements.to_date', request('to_date'));
                            });

            $entitlement = $entitlement->orderBy('m_leave_entitlements.from_date', 'asc')
                            ->paginate(1);
        }        
        // dd(DB::getQueryLog());

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

            $leave_period_value = $leave_periods->start_month.'-'.$leave_periods->start_date;
            $leave_period_name = $from_date.' - '.$end_date;
        }else{
            $from_date = "";
            $end_date = "";
            $leave_period_value = '';
            $leave_period_name = 'No Leave Period';
        }

        return view('leave/entitlements/list', compact('employees', 'entitlement', 'leave_types', 'from_date', 'end_date', 'leave_period_name', 'leave_period_value'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
