<?php

namespace App\Http\Controllers\Leave\LeaveType;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\mLeaveType;
use Session;
use DB;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave_type = mLeaveType::get();
        return view('leave/leave_type/list', compact('leave_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leave/leave_type/add');
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
            'name' => 'required'
        ]);

        $entitlement = '0';
        if ($request->input('entitlement') == "on") {
            $entitlement = '1';
        }

        $duplicate_check = mLeaveType::where('name', $request->input('name'))->get();
        if (count($duplicate_check) == 0) {
            $leave_type = mLeaveType::create([
                'name'  => $request->input('name'),
                'exclude_if_no_entitlement' => $entitlement
            ]);
            return redirect()->route('leaveTypes.index')->with('success', 'Leave Type Added successfully');
        }else{
            return redirect()->back()->with('failed', 'Duplicate Entry');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mLeavePeriod  $mLeavePeriod
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mLeavePeriod  $mLeavePeriod
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leave_type = mLeaveType::find($id);
        return view('leave/leave_type/edit', compact('leave_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mLeavePeriod  $mLeavePeriod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        $entitlement = '0';
        if ($request->input('entitlement') == "on") {
            $entitlement = '1';
        }

        $duplicate_check = mLeaveType::where('name', $request->input('name'))->where('id','!=', $id)->get();
        if (count($duplicate_check) == 0) {
            $holidays = mLeaveType::find($id);
            $holidays->name = $request->input('name');
            $holidays->exclude_if_no_entitlement = $entitlement;
            $holidays->save();

            return redirect()->back()->with('success', 'Leave Type Updated successfully');
        }else{
            return redirect()->back()->with('failed', 'Duplicate Entry');
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mLeavePeriod  $mLeavePeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteMultiple(Request $request)
    {
        if($request->delete_ids) {
            mLeaveType::whereIn('id', $request->delete_ids)
                ->get()
                ->map(function($leave_type) {
                    $leave_type->delete();
                });
            return true;
        } else {   
            return false;
        }       
    }
}
