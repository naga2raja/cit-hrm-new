<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;

class ReportsController extends Controller
{
    public function index(Request $request) {
        $data = [];
        if($request->report == 'employee') {
           $data = $this->getEmployeesReport($request);
        }
        return view('reports/index', $data);
    }

    public function getEmployeesReport($request) {
        $data = Employee::get();
        return $data;
    }
}
