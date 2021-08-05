<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use App\Exports\EmployeesReportExport;
use Excel;


class ReportsController extends Controller
{
    public function index(Request $request) {
        $data = [];
        if($request->report == 'employee_report') {
           $data = $this->getEmployeesReport($request);

            if($request->export)
                return (new EmployeesReportExport($data))->download('employees.xlsx');
            
        }
        return view('reports/index', compact('data'));
    }

    public function getEmployeesReport($request) {
        $data = Employee::when(request()->filled('status'), function ($query) {
            $query->where('employees.status', request('status'));
        })
        ->when(request()->filled('from_date'), function ($query) {
            $fromDate = str_replace('/', '-', request('from_date'));
            $fromDate = date('Y-m-d', strtotime($fromDate));
            $query->where('employees.created_at', '>=', $fromDate);
        })        
        ->when(request()->filled('to_date'), function ($query) {
            $fromDate = str_replace('/', '-', request('to_date'));
            $fromDate = date('Y-m-d', strtotime($fromDate));
            $query->where('employees.created_at', '<=', $fromDate);
        })
        ->selectRaw('employee_id, first_name, middle_name, last_name, email, date_of_birth, gender, joined_date, status, created_at')
        ->get()
        ->toArray();
        return $data;
    }
}
