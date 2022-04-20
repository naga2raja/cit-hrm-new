<?php

namespace App\Http\Controllers\Leave\Holidays;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use DateTime;
use Carbon\Carbon;
use App\mHoliday;
use App\mCountry;
use App\mCompanyLocation;
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
            $from_date = '';
            if($from){
                $from_date = $from->format('Y-m-d');
            }
        }
        // convertion of date format
        if($request->input('to_date') != ""){
            $to = DateTime::createFromFormat('d/m/Y', $request->input('to_date'));
            $to_date = '';
            if($to){
                $to_date = $to->format('Y-m-d');
            }
        }

        DB::connection()->enableQueryLog();

        $holidays = mHoliday::where('id', '>', 0);
        //orderBy('date', 'asc');
        if (($from_date)&&($from_date != '1970-01-01')) {
            $holidays->where('date', '>=', $from_date);
        }
        if (($to_date)&&($to_date != '1970-01-01')) {
            $holidays->where('date', '<=', $to_date);
        }
        if (($request->input('location_id')) && $request->input('location_id') != "All") {
            $holidays->where('operational_country_id', $request->input('location_id'));
        }
        if($request->sort_by && $request->sort_field) {
            $holidays = $holidays->orderBy($request->sort_field, $request->sort_by);
        } else {
            $holidays = $holidays->orderBy('m_holidays.id', 'asc');
        }

        $holidays = $holidays->with('countryName', 'subUnitName');
        $total = $holidays->count();
        $holidays = $holidays->paginate(10);
        // dd(DB::getQueryLog());

        $country = mCountry::selectRaw('m_countries.id, m_countries.country')
                            ->join('m_company_locations', 'm_company_locations.country_id', 'm_countries.id')
                            ->groupBy('m_company_locations.country_id')
                            ->get();

        $company_location = mCompanyLocation::selectRaw('id, company_name')->get();

        return view('leave/holidays/list', compact('holidays', 'country', 'company_location', 'total'));
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
        $holidays = '';

        return view('leave/holidays/add', compact('holidays', 'country', 'company_location'));
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
        $date = date('Y-m-d', strtotime($date));

        DB::connection()->enableQueryLog();

        // duplicate check
        $isExists = mHoliday::where('operational_country_id', $request->input('location_id'))
                            ->where('operational_sub_unit_id', $request->input('sub_unit_id'))
                            ->where('date', $date)
                            ->first();
        // dd(DB::getQueryLog());

        if($isExists){
            return redirect()->back()->with('warning', 'Failed, Holidays Already Exist');
        }else{

            $holidays = mHoliday::create([
                'description'  => $request->input('description'),
                'date'  => $date,
                'recurring' => $recurring,
                'length' => $request->input('length'), // 0 => fullday, 1 => halfday
                'operational_country_id'  => $request->input('location_id'),
                'operational_sub_unit_id'  => $request->input('sub_unit_id')
            ]);

            return redirect()->route('holidays.index')->with('success', 'Holiday Added successfully');
        }
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
                    ->find($id);
        // dd($holidays);

        $country = mCountry::selectRaw('m_countries.id, m_countries.country')
                            ->join('m_company_locations', 'm_company_locations.country_id', 'm_countries.id')
                            ->groupBy('m_company_locations.country_id')
                            ->get();

        $company_location = mCompanyLocation::selectRaw('id, company_name')->where('country_id', $holidays->operational_country_id)->get();

        return view('leave/holidays/edit', compact('holidays', 'country', 'company_location'));
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
        $date = str_replace('/', '-', $request->date );
        $date = date('Y-m-d', strtotime($date ));

        // duplicate check
        $isExists = mHoliday::where('operational_country_id', $request->input('location_id'))
                            ->where('operational_sub_unit_id', $request->input('sub_unit_id'))
                            ->where('date', $date)
                            ->where('id','!=', $id)
                            ->first();
        // dd(DB::getQueryLog());

        if($isExists){
            return redirect()->back()->with('warning', 'Failed, Holidays Already Exist');
        }else{
            // update mHoliday
            $holidays = mHoliday::find($id);
            $holidays->description = $request->input('description');
            $holidays->date = date('Y-m-d', strtotime($date));
            $holidays->recurring = $recurring;
            $holidays->length = $request->input('length'); // 0 => fullday, 1 => halfday
            $holidays->operational_country_id  = $request->input('location_id');
            $holidays->operational_sub_unit_id  = $request->input('sub_unit_id');
            $holidays->save();

            return redirect()->route('holidays.index')->with('success', 'Holiday Updated successfully');
        }
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
