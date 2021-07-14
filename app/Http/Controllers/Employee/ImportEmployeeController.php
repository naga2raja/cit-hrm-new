<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployeesImport;



class ImportEmployeeController extends Controller
{
    public function index(Request $request) {
        return view('employees/import');
    }

    public function import(Request $request) {
        $request->validate([
            'upload_file' => 'max:10240|required|mimes:csv,txt',
        ]);
        try {

            $import = new EmployeesImport;
            $data = Excel::import($import, request()->file('upload_file'));
            $count = $import->getRowCount();
            $results = $import->getResultsArray();
                        
            return redirect()->back()
                            ->with('success', '('.$count.') Employees imported successfully')
                            ->with('results', $results);            
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) 
        {
            $failures = $e->failures();
            
            foreach ($failures as $failure) {
                $failure->row(); // row that went wrong
                $failure->attribute(); // either heading key (if using heading row concern) or column index
                $failure->errors(); // Actual error messages from Laravel validator
                $failure->values(); // The values of the row that has failed.
            }
            return redirect()->back()->with('error', 'Something went wrong!');        
        }
    }
}