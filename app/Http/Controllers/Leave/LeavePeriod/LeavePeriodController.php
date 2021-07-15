<?php

namespace App\Http\Controllers\Leave\LeavePeriod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Carbon\Carbon;
use App\mLeavePeriod;
use Session;
use DB;

class LeavePeriodController extends Controller
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
        $leave_period = mLeavePeriod::get();
        return view('leave/leave_period/add', compact('leave_period'));
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
            'start_month' => 'required',
            'start_date' => 'required'
        ]);

        $leave_period = mLeavePeriod::create([
            'start_month'  => $request->input('start_month'),
            'start_date'  => $request->input('start_date')
        ]);

        return redirect()->back()->with('success', 'Leave Period Added successfully');
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
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'start_month' => 'required',
            'start_date' => 'required'
        ]);

        $leave_period = mLeavePeriod::find($id);
        $leave_period->start_month = $request->input('start_month');
        $leave_period->start_date = $request->input('start_date');
        $leave_period->save();

        return redirect()->back()->with('success', 'Leave Peeriod Updated successfully');
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
