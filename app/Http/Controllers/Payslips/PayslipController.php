<?php

namespace App\Http\Controllers\Payslips;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tPayslip;
use App\Employee;
use Auth;

class PayslipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = tPayslip::join('employees', 'employees.id', 't_payslips.employee_id')
            ->when(request()->filled('employee_id'), function ($query) {
                $query->where('t_payslips.employee_id', request('employee_id'));
            }) 
            ->when(request()->filled('from_date'), function ($query) {
                $fromDate = str_replace('/', '-', request('from_date'));
                $fromDate = date('Y-m-d', strtotime($fromDate));
                $query->where('t_payslips.pay_month', '>=', $fromDate);
            })
            ->when(request()->filled('to_date'), function ($query) {
                $toDate = str_replace('/', '-', request('to_date'));
                $toDate = date('Y-m-d', strtotime($toDate));
                $query->where('t_payslips.pay_month', '<=', $toDate);
            });
        if(Auth::user()->hasRole('Admin')) {

        } else {
            $currentEmployeeId = getEmployeeId(Auth::user()->id);

            $data = $data->where('t_payslips.employee_id', $currentEmployeeId);

            $empData = tPayslip::where('t_payslips.employee_id', $currentEmployeeId)
                    ->selectRaw('t_payslips.*, DATE_FORMAT(t_payslips.pay_month,"%b %Y") AS payslip_month')
                    ->orderBy('t_payslips.pay_month', 'DESC')
                    ->get();
            return view('payslips/employees_list', compact('empData'));
        } 
        $data = $data->selectRaw('t_payslips.*, DATE_FORMAT(t_payslips.pay_month,"%b %Y") AS payslip_month, CONCAT_WS (" ", first_name, middle_name, last_name) as employee_name');
        $total = $data->count();
        if($request->sort_by && $request->sort_field) {
            $data = $data->orderBy($request->sort_field, $request->sort_by);
        } else {
            $data = $data->orderBy('t_payslips.pay_month', 'DESC');
        }   
        $data = $data->paginate(10);
                
        $employees = Employee::where('status', 'Active')->selectRaw('id, CONCAT_WS (" ", first_name, middle_name, last_name) as name')->get();        
        return view('payslips/list', compact('data', 'employees', 'total'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->hasRole('Admin')) {
            return redirect()->back()->with('error', 'You don\'t have rights');
        }
        return view('payslips/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::user()->hasRole('Admin')) {
            return redirect()->back()->with('error', 'You don\'t have rights');
        }
        $request->validate([
            'employee_id' => 'required',
            'pay_month' => 'required',
            'payslip_doc' => 'max:1024|required|mimes:pdf',
        ]); 

        //check the payslip if exists
        $isExists = tPayslip::where('employee_id', $request->employee_id)
            ->where('pay_month', $request->pay_month.'-01')
            ->first();
        if($isExists) {
            return redirect()->back()->with('error', 'Payslip already Exists');     
        }
        $payslipPath = $request->file('payslip_doc');
        $payslipDocName = $payslipPath->getClientOriginalName();
        $path = $request->file('payslip_doc')->storeAs('uploads/payslips', $payslipDocName, 'public');
        
        $payroll = new tPayslip;
        $payroll->pay_slip_pdf = '/storage/'.$path;
        $payroll->employee_id = $request->employee_id;
        $payroll->pay_month = $request->pay_month.'-01';
        $payroll->comments = $request->comments;
        $payroll->save();

        return redirect('payslips')->with('success', 'Payslip uploaded successfully');
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
        if(!Auth::user()->hasRole('Admin')) {
            return redirect()->back()->with('error', 'You don\'t have rights');
        }
        $payslip = tPayslip::where('id', $id)->first();
        $payslip->delete();
        return redirect('payslips')->with('success', 'Payslip Deleted successfully');
    }

    public function download(Request $request) {
        $id = base64_decode($request->file);
        $payslip = tPayslip::join('employees', 'employees.id', 't_payslips.employee_id')->where('t_payslips.id', $id)
            ->selectRaw('t_payslips.*, employees.employee_id as emp_number')
            ->first();

        $file = public_path().$payslip->pay_slip_pdf;

        if (file_exists($file)) {            
            // $fileNameArr = explode('/', $payslip->pay_slip_pdf);            
            // $fileName = @$fileNameArr[4]; //
            $fileName = $payslip->emp_number.'_'.date('F_Y', strtotime($payslip->pay_month)).'.pdf';
            return response()->download($file, $fileName); 
        } else {
            return redirect()->back()->with('error', 'File Not Found');
        }         
    }

    public function sampleDownload(Request $request) {
        $file =  public_path().'/sample/employee-import.csv';  

        if (file_exists($file)) {
            $fileName = 'employee-import.csv';
            return response()->download($file, $fileName);
        } else {
            return redirect()->back()->with('error', 'File Not Found');
        }
    }

    public function uploadMultiple(Request $request) {        
        if(!Auth::user()->hasRole('Admin')) {
            return redirect()->back()->with('error', 'You don\'t have rights');
        }
        $out = [];
        return view('payslips/multiple_upload', compact('out'));
    }

    public function storeMultipleFiles(Request $request) {
        if(!Auth::user()->hasRole('Admin')) {
            return redirect()->back()->with('error', 'You don\'t have rights');
        }
        $request->validate([ 
            'payslip_doc'  => 'required', 
            'payslip_doc.*' => 'max:1024|mimes:pdf',
        ]);
        $out = [];
        $out['error'] =  [];
        $out['success'] =  [];
        if($request->hasfile('payslip_doc')) { 

            foreach($request->file('payslip_doc') as $file)
            {
                $payslipPath = $file;
                $payslipDocName = $payslipPath->getClientOriginalName();

                $payslipDocName = explode('.', $payslipDocName);
                $payslipDocName = $payslipDocName[0];
                $fileNameArray = explode('_', $payslipDocName);                
                $employee_id = $fileNameArray[0];
                $pay_month = date('M-Y', strtotime(@$fileNameArray[1]));
                $pay_month = date('Y-m', strtotime($pay_month));

                $employee = Employee::where('employee_id', $employee_id)->first();
                if($employee_id && $pay_month && $employee) {
                    //check the payslip if exists
                    $isExists = tPayslip::where('employee_id', $employee->id)
                        ->where('pay_month', $pay_month.'-01')
                        ->first();
                    if($isExists) {
                        $out['error'][] = ['file' => $payslipDocName, 'msg' => 'Payslip Already Exists'];
                    } else {
                        // $payslipPath = $file('payslip_doc');
                        // $payslipDocName = $payslipPath->getClientOriginalName();
                        $path = $file->storeAs('uploads/payslips', $payslipDocName, 'public');
                        $payroll = new tPayslip;
                        $payroll->pay_slip_pdf = '/storage/'.$path;
                        $payroll->employee_id = $employee->id;
                        $payroll->pay_month = $pay_month.'-01';
                        $payroll->comments = $request->comments;
                        $payroll->save();

                        $out['success'][] = ['pay_month' => $pay_month, 'employee_id'=> $employee_id];
                    }
                } else {
                    $out['error'][] = ['file' => $payslipDocName, 'msg' => ($employee) ? 'Invalid file name' : 'Invalid Employee ID'];
                }
            }
        }        
        return redirect()->back()
            ->with('results', $out)
            ->with('success', count($out['success']) ? '('.count($out['success']).') Payslips uploaded successfully' : '');
    }

    public function downloadAjax(Request $request) {
        
        $currentEmployeeId = getEmployeeId(Auth::user()->id);
        if($request->date) {
            $date = date('Y-m-d', strtotime($request->date.'-01'));
    
            $data = tPayslip::where('t_payslips.employee_id', $currentEmployeeId)
                    ->where('pay_month', $date)
                    ->first();
           return response()->json($data);
        } else {
            return 'Please select a month';
        }
    }
}
