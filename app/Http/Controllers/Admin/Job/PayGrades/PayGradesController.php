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
        $pay_grades = mPayGrade::get();
        $pay_grade_currency = tPayGradeCurrency::with('currencyName')->get();
        $mCurrency = mCurrency::get();
        return view('admin/job/pay_grades/list', compact('pay_grades', 'pay_grade_currency', 'mCurrency'));
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

        return redirect()->back()->with('success', 'Pay Grade Updated successfully');
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

    public function currencyNameSearch(Request $request)
    {
        DB::connection()->enableQueryLog();

        $currency = $request->currency;

        // dd($request->currency);

        if(!empty(trim($currency))){
            $query1 = mCurrency::where('currency_id', 'like', "%{$currency}%")
                                ->orwhere('currency_name', 'like', "%{$currency}%")
                                ->get();

            $query2 = mCurrency::where(DB::raw("CONCAT(currency_id, ' - ' ,currency_name)"), 'LIKE', "%$currency%")
                                ->get();

            // dd(DB::getQueryLog());

            $currencies = [];
            if(count($query1) != 0){
                $currencies = $query1;
            }
            elseif(count($query2) != 0){
                $currencies = $query2;
            }

            if(count($currencies) != 0){
                $output = '<ul class="list-group" style="display:block; position:relative;">';
                foreach($currencies as $row) {                    
                   $output .= '<li id='.$row->currency_id.' class="list-group-item currencies"><a class="dropdown-item">'.$row->currency_id.' - '.$row->currency_name.'</a></li>';
                }
                $output .= '</ul>';
                echo $output;
            } else{
                $output = "";
                echo $output;
            }
        } else{
            $output = "";
            echo $output;
        }
    }
}
