<?php

namespace App\Http\Controllers\Leave\Leave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\mLeaveType;
use App\mLeaveEntitlement;
use App\Employee;
use App\tLeave;

class LeaveController extends Controller
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
        $userId = Auth::user()->id;
        $employee = Employee::where('user_id', $userId)->first();
        if(!$employee)
            return redirect('/');
        //check entitlement is assigned for the current user
        $employeeId = $employee->id;
        $leaveEntitlements = mLeaveEntitlement::where('emp_number', $employeeId)->first();
        if($leaveEntitlements) {
            $leaveType = mLeaveType::all();
            return view('leave/leave/apply_leave', compact('leaveType', 'leaveEntitlements', 'employeeId'));            
        } else {
            $message = 'Leave entitlements not added!';
            return view('leave/leave/error', compact('message'));
        }        
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
        return redirect()->back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getLeaveBalance(Request $request)
    {
        $employeeId = $request->employee_id;
        $leaveTypeId = $request->leave_type_id;
        $date = date('Y-m-d');
        $out = [];

        //Get Leave Entitlements for the date
        $leaveEntitlements = mLeaveEntitlement::where('emp_number', $employeeId)
                                ->whereRaw(' from_date <= "'.$date.'" AND to_date >= "'.$date.'"')
                                ->where('leave_type_id', $leaveTypeId)
                                ->first();
        //find used leaves
        $leavesTaken = tLeave::where('employee_id', $employeeId)->where('leave_type_id', $leaveTypeId)->get();

        $leaveBalance = 0;
        if($leaveEntitlements) {
            $leaveBalance = $leaveEntitlements->no_of_days - $leaveEntitlements->days_used;
        }
        $out['balance'] = $leaveEntitlements;
        $out['as_on_date']  = $date;
        $out['status']  = ($leaveEntitlements) ? true : false;
        $out['leaves'] = $leavesTaken;
        $out['leave_balance'] = $leaveBalance;
        return response()->json($out);
    }
}
