<?php

namespace App\Http\Controllers\Admin\Job\PayGrades;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\mPayGrade;
use App\tPayGradeCurrency;
use App\mCurrency;
use Session;
use DB;

class PayGradeCurrencyController extends Controller
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
        $validated = $request->validate([
            'currency' => 'required'
        ]);

        $pay_grade_currency = tPayGradeCurrency::create([
            'pay_grade_id'  => $request->input('pay_grade_id'),
            'currency_id'  => $request->input('currency_id'),
            'min_salary'  => $request->input('min_salary'),
            'max_salary'  => $request->input('max_salary')
        ]);

        // dd($pay_grade_currency);

        return redirect()->route('payGrades.edit', $request->input('pay_grade_id'))->with('currency_success', 'Currencie Assigned successfully');
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
        $pay_grade_currency = tPayGradeCurrency::find($id);
        return view('admin/job/pay_grade_currency/edit', compact('grade_currency'));
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
}
