<?php

namespace App\Http\Controllers\Admin\Organization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\mCompany;
use App\mCompanyLocation;
use App\Employee;
use App\mCountry;
use Auth;
use App\Session;

class CompanyInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = mCompany::select('m_companies.*', 'm_countries.country as country')
                            ->leftjoin('m_countries', 'm_countries.id', 'm_companies.country_id')
                            ->first();
        $branches = mCompanyLocation::select('*')->count(); 
        $employees = Employee::whereNull('deleted_at')->count();
        $countries = mCountry::get();

        return view('admin/organization/company_info/edit', compact('company', 'branches', 'employees', 'countries'));
    }

    public function update_company_name(Request $request)
    {
        $validated = $request->validate([
            'modal_company_name' => 'string|max:255',
        ]);

        $isExists = mCompany::where('id', $request->modal_company_id)->first();
        $infoArr = ['company_name' => (empty($request->modal_company_name) ? '' :  $request->modal_company_name)];

        if($isExists) {
            $company = mCompany::where('id', $request->modal_company_id)
                            ->update($infoArr);
        } else {
            $company = mCompany::insert($infoArr);
        }
        return response()->json(['url'=> route('company.index')]); 

    }

    public function update_company_info(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'registration_number' => 'nullable|string|max:20',
            'tax_id' => 'nullable|string|min:11|max:11',
            // 'incorporation_date' => 'nullable|date|before:tomorrow',
            'address_street_1' => 'nullable|string|max:255',
            'address_street_2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:64',
            'state_province' => 'nullable|string|max:64',
            'zip_code' => 'nullable|string|max:7',
        ]);
        $isExists = mCompany::where('id', $request->modal_company_id)->first();

        $infoArr = [
            'company_name' => (empty($request->company_name) ? '' :  $request->company_name),
            'registration_number' => (empty($request->registration_number) ? '' :  $request->registration_number),
            'tax_id' => (empty($request->tax_id) ? '' :  $request->tax_id),
            'incorporation_date' => (empty($request->incorporation_date) ? '' :  date('Y-m-d', strtotime($request->incorporation_date))),
            'address_street_1' => (empty($request->address_street_1) ? '' :  $request->address_street_1),
            'address_street_2' => (empty($request->address_street_2) ? '' :  $request->address_street_2),
            'city' => (empty($request->city) ? '' :  $request->city),
            'state_province' => (empty($request->state_province) ? '' :  $request->state_province),
            'country_id' => (empty($request->country) ? '' :  $request->country),
            'zip_code' => (empty($request->zip_code) ? '' :  $request->zip_code)
        ];

        if($isExists) { 
            $company = mCompany::where('id', $request->modal_company_id)->update($infoArr);
        } else {
            //insert
            $company = mCompany::insert($infoArr);
        }
        return response()->json(['url'=> route('company.index')]);
    }

    public function update_company_contact(Request $request)
    {
        $validated = $request->validate([
            'phone_number' => 'nullable|string|min:10|max:10',
            'website' => 'nullable|url',
            'email' => 'nullable|email',
        ]);

        $isExists = mCompany::where('id', $request->modal_company_id)->first();

        $contactArr = [
            'phone_number' => (empty($request->phone_number) ? '' :  $request->phone_number),
            'website' => (empty($request->website) ? '' :  $request->website),
            'email' => (empty($request->email) ? '' :  $request->email)
        ];
        if($isExists) {
            $company = mCompany::where('id', $request->modal_company_id)
                            ->update($contactArr);
        } else {
            $company = mCompany::insert($contactArr);  
        }

        return response()->json(['url'=> route('company.index')]);
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
}
