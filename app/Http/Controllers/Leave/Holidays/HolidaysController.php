<?php

namespace App\Http\Controllers\Leave\Holidays;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use DateTime;
use Carbon\Carbon;
use App\mHoliday;
use Session;
use DB;

class HolidaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $from_date = ''; $to_date = '';
        // convertion of date format
        if($request->input('from_date') != ""){
            $from = DateTime::createFromFormat('d/m/Y', $request->input('from_date'));
            $from_date = $from->format('Y-m-d');
        }
        // convertion of date format
        if($request->input('from_date') != ""){
            $to = DateTime::createFromFormat('d/m/Y', $request->input('to_date'));
            $to_date = $to->format('Y-m-d');
        }

        DB::connection()->enableQueryLog();

        $holidays = mHoliday::orderBy('date', 'asc');
        if (($from_date)&&($from_date != '1970-01-01')&&($to_date)&&($to_date != '1970-01-01')) {
            $holidays->whereBetween('date',[$from_date, $to_date]);
        }
        $holidays = $holidays->paginate(5);
        // dd(DB::getQueryLog());
        return view('leave/holidays/list', compact('holidays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leave/holidays/add');
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
            'description' => 'required',
            'date' => 'required'
        ]);

        $date = '';
        if ((!empty($request->input('date')))&&($request->input('date') != '1970-01-01')) {
            $date = $request->input('date');
        }

        $recurring = '0';
        if ($request->input('recurring') == "on") {
            $recurring = '1';
        }
        $date = str_replace('/', '-', $request->date );
        $date = date('Y-m-d', strtotime($date ));
        $holidays = mHoliday::create([
            'description'  => $request->input('description'),
            'date'  => date('Y-m-d', strtotime($date)),
            'recurring' => $recurring,
            'length' => $request->input('length')
        ]);

        return redirect()->route('holidays.index')->with('success', 'Holidays Added successfully');
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
        $holidays = mHoliday::select(DB::raw('DATE_FORMAT(date, "%d/%m/%Y") AS holiday_date'),'m_holidays.*')
                    ->where('id', $id)
                    ->get();
        // dd($holidays);

        return view('leave/holidays/edit', compact('holidays'));
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
        $validated = $request->validate([
            'description' => 'required',
            'date' => 'required'
        ]);

        $date = '';
        if ((!empty($request->input('date')))&&($request->input('date') != '1970-01-01')) {
            $date = $request->input('date');
        }

        $recurring = '0';
        if ($request->input('recurring') == "on") {
            $recurring = '1';
        }

        $holidays = mHoliday::find($id);
        $holidays->description = $request->input('description');
        $holidays->date = date('Y-m-d', strtotime($date));
        $holidays->recurring = $recurring;
        $holidays->save();

        return redirect()->back()->with('success', 'System User Updated successfully');
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

    public function deleteMultiple(Request $request)
    {
        if($request->delete_ids) {
            mHoliday::whereIn('id', $request->delete_ids)
                ->get()
                ->map(function($holidays) {
                    $holidays->delete();
                });
            return true;
        } else {   
            return false;
        }       
    }
}
