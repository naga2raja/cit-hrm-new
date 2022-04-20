<?php

namespace App\Http\Controllers\Leave\LeavePeriod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Carbon\Carbon;
use App\mLeavePeriod;
use App\mCountry;
use App\mCompanyLocation;
use App\tLeave;
use Session;
use DB;

class LeavePeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $country_id = $request->input('country_id');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $status = $request->input('status');

        DB::connection()->enableQueryLog();

        $leave_period = mLeavePeriod::join('m_company_locations', 'm_company_locations.id', 'm_leave_periods.sub_unit_id')
            ->join('m_countries', 'm_leave_periods.country_id', 'm_countries.id')
            ->select('m_leave_periods.*');
            
        if ($country_id) {
            $leave_period->where('m_leave_periods.country_id', $country_id);
        }
        if ($start_date) {
            $leave_period->where('start_period', 'like', '%'.$start_date.'%');
        }
        if ($end_date) {
            $leave_period->where('end_period', 'like', '%'.$end_date.'%');
        }
        if ($status != '') {
            $leave_period->where('status', $status);
        }
        if($request->sort_by && $request->sort_field) {
            $leave_period = $leave_period->orderBy($request->sort_field, $request->sort_by);
        } else {
            $leave_period = $leave_period->orderBy('m_leave_periods.id', 'asc');
        }

        $leave_period = $leave_period->with('countryName', 'subUnitName');
        $total = $leave_period->count();
        $leave_period = $leave_period->paginate(10);

        // dd(DB::getQueryLog(), $leave_period);

        $country = mCountry::selectRaw('m_countries.id, m_countries.country')
                            ->join('m_company_locations', 'm_company_locations.country_id', 'm_countries.id')
                            ->groupBy('m_company_locations.country_id')
                            ->get();

        $company_location = mCompanyLocation::selectRaw('id, company_name')->get();

        return view('leave/leave_period/list', compact('leave_period', 'country', 'company_location', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = mCountry::selectRaw('m_countries.id, m_countries.country')
                            ->join('m_company_locations', 'm_company_locations.country_id', 'm_countries.id')
                            ->groupBy('m_company_locations.country_id')
                            ->get();

        $company_location = mCompanyLocation::selectRaw('id, company_name')->get();

        return view('leave/leave_period/add', compact('country', 'company_location'));
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
            'location_id' => 'required',
            'sub_unit_id' => 'required',
            'start_month' => 'required',
            'start_date' => 'required'
        ]);

        // DB::connection()->enableQueryLog();

        // duplicate check
        $isExists = mLeavePeriod::where('country_id', $request->input('location_id'))
                                ->where('sub_unit_id', $request->input('sub_unit_id'))
                                ->whereRaw('(start_period <= "'.$request->input('start_period').'" AND end_period >= "'.$request->input('start_period').'" OR start_period <= "'.$request->input('end_period').'" AND end_period >= "'.$request->input('end_period').'")')
                                ->first();
        // dd(DB::getQueryLog());

        if($isExists){
            return redirect()->back()->with('warning', 'Failed, Leave Period Already Exist');
        }else{
            // to deactive other leave periods
            $deActivate = mLeavePeriod::where('country_id', $request->input('location_id'))
                                        ->where('sub_unit_id', $request->input('sub_unit_id'))
                                        ->update(['status' => 0]);

            // create mLeavePeriod
            $leave_period = mLeavePeriod::create([
                'start_month' => $request->input('start_month'),
                'start_date' => $request->input('start_date'),
                'start_period' => $request->input('start_period'),
                'end_period' => $request->input('end_period'),
                'country_id' => $request->input('location_id'),
                'sub_unit_id' => $request->input('sub_unit_id')
            ]);

            return redirect()->route('leavePeriod.index')->with('success', 'Leave Period Added Successfully');
        }
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
    public function edit($id)
    {
        $leave_period = mLeavePeriod::find($id);

        $country = mCountry::selectRaw('m_countries.id, m_countries.country')
                            ->join('m_company_locations', 'm_company_locations.country_id', 'm_countries.id')
                            ->groupBy('m_company_locations.country_id')
                            ->get();

        $company_location = mCompanyLocation::selectRaw('id, company_name')->where('country_id', $leave_period->country_id)->get();


        return view('leave/leave_period/edit', compact('leave_period', 'country', 'company_location'));
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
            // 'location_id' => 'required',
            // 'sub_unit_id' => 'required',
            // 'start_month' => 'required',
            // 'start_date' => 'required'
            'status' => 'required'
        ]);

        DB::connection()->enableQueryLog();
        // duplicate check
        $isExists = mLeavePeriod::where('country_id', $request->input('location_id'))
                                ->where('sub_unit_id', $request->input('sub_unit_id'))
                                ->whereRaw('(start_period <= "'.$request->input('start_period').'" AND end_period >= "'.$request->input('start_period').'" OR start_period <= "'.$request->input('end_period').'" AND end_period >= "'.$request->input('end_period').'")')
                                ->where('id','!=', $id)
                                ->first();
        // dd(DB::getQueryLog());

        if($isExists){
            return redirect()->back()->with('warning', 'Failed, Leave Period Already Exist');
        }else{
            // update mLeavePeriod
            $leave_period = mLeavePeriod::find($id);
            // $leave_period->start_month = $request->input('start_month');
            // $leave_period->start_date = $request->input('start_date');
            // $leave_period->start_period = $request->input('start_period');
            // $leave_period->end_period = $request->input('end_period');
            // $leave_period->country_id = $request->input('location_id');
            // $leave_period->sub_unit_id = $request->input('sub_unit_id');
            $leave_period->status = $request->input('status');
            $leave_period->save();

            return redirect('/leavePeriod')->with('success', 'Leave Period Updated successfully');
        }
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

    public function deleteMultiple(Request $request)
    {
        if($request->delete_ids) {     
            // check if the leave period is currently using or not
            $leavePeriods = mLeavePeriod::whereIn('id', $request->delete_ids)->get();
            foreach($leavePeriods as $leave_period) {
                //check any leaves applied using this leave period.
               $leavesAdded = tLeave::join('employees', 'employees.id', 't_leaves.employee_id')
                    ->where('employees.company_location_id', $leave_period->sub_unit_id)
                    ->whereRaw('t_leaves.date >= "'.$leave_period->start_period.'" AND t_leaves.date <= "'.$leave_period->end_period.'"')
                    ->first();
                    
                if($leavesAdded) {
                    //Leaves already added, You can't delete the leave period     
                    header('HTTP/1.1 500 Internal Server');
                    header('Content-Type: application/json; charset=UTF-8');
                    die(json_encode(array('message' => 'ERROR', 'code' => $leavesAdded)));
                } else {
                    // mLeavePeriod::whereIn('id', $leave_period->id)->delete();
                    // return true;
                }
            }            
            mLeavePeriod::whereIn('id', $request->delete_ids)
                    ->get()
                    ->map(function($news) {
                        $news->delete();
                    });
            return true;
        } else {
            return false;
        }       
    }
}
