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

class PayGradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pay_grades = mPayGrade::get();
        // $pay_grade_currency = tPayGradeCurrency::with('currencyName')->get();
        // $mCurrency = mCurrency::get();
        $payGrade = mPayGrade::join('t_pay_grade_currencies', 't_pay_grade_currencies.pay_grade_id', '=' , 'm_pay_grades.id')
            ->join('m_currencies', 'm_currencies.currency_id', '=', 't_pay_grade_currencies.currency_id')
            ->selectRaw('m_pay_grades.*, GROUP_CONCAT(m_currencies.currency_name) as currencies_name')
            ->groupBy('m_pay_grades.id')
            ->get();

        return view('admin/job/pay_grades/list', compact('payGrade')); //'pay_grades', 'pay_grade_currency', 'mCurrency',
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currency = mCurrency::get();
        return view('admin/job/pay_grades/add', compact('currency'));
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
            'pay_grade' => 'required'
        ]);

        $add_grades = mPayGrade::create([
            'name'  => $request->input('pay_grade')
        ]);

        return redirect()->route('payGrades.edit', $add_grades->id)->with('success', 'PayGrades Added successfully');
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
        $grades = mPayGrade::find($id);
        $grade_currency = tPayGradeCurrency::where('pay_grade_id', $id)->get();
        $mCurrency = mCurrency::get();
        return view('admin/job/pay_grades/edit', compact('grades', 'grade_currency', 'mCurrency'));
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
            'name' => 'required'
        ]);

        $grades = mPayGrade::find($id);
        $grades->name = $request->input('name');
        $grades->save();

        return redirect()->route('payGrades.index')->with('success', 'Pay Grade Updated successfully');
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
            mPayGrade::whereIn('id', $request->delete_ids)
                ->get()
                ->map(function($pay_grade) {
                    $pay_grade->delete();
                });

            tPayGradeCurrency::whereIn('pay_grade_id', $request->delete_ids)
                ->get()
                ->map(function($pay_currency) {
                    $pay_currency->delete();
                });
                
            return true;
        } else {   
            return false;
        }       
    }
}
