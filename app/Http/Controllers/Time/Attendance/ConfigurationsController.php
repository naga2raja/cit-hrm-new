<?php

namespace App\Http\Controllers\Time\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\mAttendanceConfigure;
use App\Employee;
use Auth;
use App\Session;

class ConfigurationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configurations = mAttendanceConfigure::whereIn('id', [1,2,3])->get();
        $employees = [];
        $employeeConfig = mAttendanceConfigure::where('id', 4)->first();
        if($employeeConfig) {
            $employeeIdArr = explode(',', $employeeConfig->employee_ids);
            $employees = Employee::whereIn('id', $employeeIdArr)
                ->selectRaw('id, CONCAT_WS (" ", first_name, middle_name, last_name) AS name')
                ->get()
                ->toArray();
        }

        return view('time/attendance/configuration/list', compact('configurations', 'employees', 'employeeConfig'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        if(!$request->enable_employee_checkbox) {
            $request->validate([
                'employees' => 'required'
            ]);            
        }
        $checked_values = $request->input('checkbox');
        //set to zero before configuring
        $ids = array('1', '2', '3');
        $set_zero = mAttendanceConfigure::whereIn('id', $ids)->update([
                                        'action_flag' => 0
        ]);

        $employees = NULL;
        if($request->employees) {
            $employees = implode(',', $request->employees);
        }
        // updating the flag
        if($checked_values) {
            foreach($checked_values as $value){
                $configure = mAttendanceConfigure::where('id', $value)->first();
                if($value == 4) {
                    //update employee ids
                    $configure->employee_ids = $employees;
                }
                $configure->action_flag = 1;
                $configure->save();
            }
        }
        
            $configureEmp = mAttendanceConfigure::where('id', 4)->first();
            $configureEmp->employee_ids = ($request->enable_employee_checkbox) ? NULL : $employees;
            $configureEmp->action_flag = ($request->enable_employee_checkbox) ? 1 : 0;
            $configureEmp->save();
        
        
        return redirect()->back()->with('success', 'Configured successfully!');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function deleteMultiple(Request $request)
    {

    }
}
