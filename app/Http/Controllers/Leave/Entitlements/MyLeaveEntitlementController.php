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
        $leave_types = [];
        $leave_period = [];
        if($employees){
            $employees_id = $employees->id;
            $entitlement = mLeaveEntitlement::select('m_leave_entitlements.*', 'm_leave_entitlements.id as entitlement_id', 'm_leave_types.*', 'm_leave_types.name as leave_type_name')
                            ->join('m_leave_types', 'm_leave_types.id', 'm_leave_entitlements.leave_type_id')
                            ->when(filled($employees_id), function($query) use ($employees_id) {
                                $query->where('m_leave_entitlements.emp_number', $employees_id);
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
                            ->get();

            $leave_types = mLeaveType::get();
            $leave_period = mLeaveEntitlement::select('from_date', 'to_date')
                                            ->selectRaw('CONCAT(from_date, " - ", to_date) as leave_period')
                                            ->when(filled($employees_id), function($query) use ($employees_id) {
                                                $query->where('m_leave_entitlements.emp_number', $employees_id);
                                            })
                                            ->distinct()
                                            ->get();
        }        
        // dd(DB::getQueryLog());        

        return view('leave/entitlements/list', compact('entitlement', 'leave_types', 'leave_period', 'employees'));
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
    public function update(Request $request, $id)
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
}
