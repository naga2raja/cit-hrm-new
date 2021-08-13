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
            'currency' => 'required',
            'min_salary' => 'lte:max_salary',
            'max_salary' => 'gte:min_salary'
        ]);

        $isExists = tPayGradeCurrency::where('currency_id', $request->input('currency_id'))
                                        ->where('pay_grade_id', $request->input('pay_grade_id'))
                                        ->first();
        // dd($isExists);
        if($isExists) {            
            return redirect()->route('payGrades.edit', $request->input('pay_grade_id'))->with('currency_warning', 'Currencie Already Exist');
        }else{
            $pay_grade_currency = tPayGradeCurrency::create([
                'pay_grade_id'  => $request->input('pay_grade_id'),
                'currency_id'  => $request->input('currency_id'),
                'min_salary'  => $request->input('min_salary'),
                'max_salary'  => $request->input('max_salary')
            ]);
            return redirect()->route('payGrades.edit', $request->input('pay_grade_id'))->with('currency_success', 'Currencie Assigned successfully');
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
        $pay_grade_currency = tPayGradeCurrency::with('currencyName')->find($id);
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

    public function deleteMultiple(Request $request)
    {
        if($request->delete_ids) {
            tPayGradeCurrency::where('id', $request->delete_ids)
                ->get()
                ->map(function($pay_currency) {
                    $pay_currency->delete();
                });
                
            return true;
        } else {   
            return false;
        }       
    }

    public function searchCurrencyAjax(Request $request)
    {
        DB::connection()->enableQueryLog();
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $string = str_replace(' ', '', $search);
            $data = mCurrency::select("m_currencies.id")
                    ->selectRaw('currency_id, CONCAT_WS (" - ", currency_name, currency_id) as currency_name')
                    ->where('currency_id','LIKE',"%$search%")
                    ->orWhere('currency_name','LIKE',"%$search%");      
            $data = $data->groupBy('m_currencies.id')->get();
        }

        return response()->json($data);
    }
}
