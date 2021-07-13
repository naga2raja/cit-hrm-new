<?php

namespace App\Http\Controllers\Leave\LeaveType;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\mLeaveType;

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mLeavePeriod  $mLeavePeriod
     * @return \Illuminate\Http\Response
     */
    public function show(mLeavePeriod $mLeavePeriod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mLeavePeriod  $mLeavePeriod
     * @return \Illuminate\Http\Response
     */
    public function edit(mLeavePeriod $mLeavePeriod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mLeavePeriod  $mLeavePeriod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mLeavePeriod $mLeavePeriod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mLeavePeriod  $mLeavePeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy(mLeavePeriod $mLeavePeriod)
    {
        //
    }
}
