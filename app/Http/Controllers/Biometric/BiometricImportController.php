<?php

namespace App\Http\Controllers\Biometric;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use App\tPunchInOut;
use Auth;

class BiometricImportController extends Controller
{
    public function index()
    {
        return view('biometric/import');
    }

    public function import(Request $request) {
        $request->validate([
            'upload_file' => 'max:10240|required|mimes:xls',
        ]);

        $fileName = $_FILES['upload_file']['name'];
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);

        $tmpName = $_FILES['upload_file']['tmp_name'];
        if($ext == 'xls') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }
        if($ext == 'csv') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        }
        $spreadsheet = $reader->load($tmpName);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        if($ext == 'csv') {
            $csvAsArray = array_map('str_getcsv', file($tmpName));
            unset($csvAsArray[0]); //Remove header from the csv array
            $output = $this->importData($csvAsArray);
        } else {
            $csvAsArray = $this->formatXlsData($sheetData);
            $output = $this->importData($csvAsArray);
        }
        return redirect()->back()
                            ->with('success', 'Data imported successfully')
                            ->with('output', $output); 

        // return view('biometric/import', compact('output'));
    }

    public function formatXlsData($sheetData)
    {
        $year = $sheetData[3][9];
        $month = $sheetData[5][9];
        $output = [];

        // format and group per employee
        $finalDataArray = [];
        $newXlsArray = [];
        $j = 0;
        for ($i=10; $i < count($sheetData); $i++) { 

            if($sheetData[$i][10] != '0:0') {
                $newXlsArray[$j]['title'] = $sheetData[$i];
                $newXlsArray[$j]['s'] = $sheetData[$i+1];
                $newXlsArray[$j]['i'] = $sheetData[$i+2];
                $newXlsArray[$j]['o'] = $sheetData[$i+3];
                $newXlsArray[$j]['w'] = $sheetData[$i+4];
                $newXlsArray[$j]['ot'] = $sheetData[$i+5];  
                        
                $finalDataArray[$j]['employee_id'] = $sheetData[$i][3];
                $finalDataArray[$j]['employee_name'] = $sheetData[$i][0];
                $finalDataArray[$j]['total_hours'] = $sheetData[$i][10];
                $finalDataArray[$j]['attendance'] = [];

                $presentStatus = $newXlsArray[$j]['s'];
                $punchIn = $newXlsArray[$j]['i'];
                $punchOut = $newXlsArray[$j]['o'];
                $workingHours = $newXlsArray[$j]['w'];
                $employeeId = $finalDataArray[$j]['employee_id'];

                foreach ($presentStatus as $key => $value) {
                    if($key != 0 && $key != 5 && $key != 7 && $key != 9 && $key != 13 && $key != 16 && $key != 19 && $key != 27 && $key != 29) {
                        $currentDate = $key;
                        if($key == 6) {
                            $currentDate = 5;
                        }
                        if($key == 8) {
                            $currentDate = $key - 2;
                        }
                        if($key == 10) {
                            $currentDate = $key - 3;
                        }
                        if($key > 10 && $key <= 13) {
                            $currentDate = $key - 3;
                        }
                        if($key > 13 && $key <= 16 ) {
                            $currentDate = $key - 4;
                        }
                        if($key > 16 && $key <= 19 ) {
                            $currentDate = $key - 5;
                        }
                        if($key > 19 && $key <= 27) {
                            $currentDate = $key - 6;
                        }
                        if($key > 27 && $key <= 29) {
                            $currentDate = $key - 7;
                        }
                        if($key > 29) {
                            $currentDate = ($key - 8);
                        }
                        $date = $year.'-'.$month.'-'.$currentDate;
                        $date = date('Y-m-d', strtotime($date));

                        if($date != '1970-01-01') {
                            $finalDataArray[$j]['attendance'][$date] = [
                                            'in' => $punchIn[$key] , 
                                            'out'=> $punchOut[$key],
                                            'work_hours'  => $workingHours[$key]
                                        ];        
                            $output[] = [
                                $employeeId,
                                $date,
                                $punchIn[$key],
                                $punchOut[$key],
                                $finalDataArray[$j]['employee_name']
                            ];                            
                        }
                    }
                }

            }

            $i = $i + 5;
            
            $j++;
        }
        return $output;
    }

    public function importData($csvAsArray)
	{
		$output = [];
		$output['exists'] = [];
        $output['success'] = [];
        $output['errors'] = [];
        $output['punch_in_missing'] = [];
        $output['punch_out_missing'] = [];

		foreach ($csvAsArray as $row) {
        	$employeeId 	= trim($row[0]);
        	$date 			= trim($row[1]);
        	$punchInTime 	= trim($row[2]);
        	$punchOutTime   = trim($row[3]);
        	$employeeName 	= trim($row[4]);
        	$todayDate = date('Y-m-d');
        	
        	if($employeeId && strtotime($date) <= strtotime($todayDate) && ($punchInTime || $punchOutTime))
        	{ 
            	// get employee id
            	$employeeDetails = Employee::where('employee_id', $employeeId)->first();            	
            	if($employeeDetails) {
            		$employeePrimayId = $employeeDetails->id;                		
                    $employeeName = $employeeDetails->first_name.' '.$employeeDetails->last_name;
                    $row[5] = $employeeName;

            		//check the time already imported
            		$exists = tPunchInOut::where('employee_id', $employeePrimayId)
                        ->whereRaw(' DATE_FORMAT(punch_in_user_time, "%Y-%m-%d") = "'.date('Y-m-d', strtotime($date)).'"')
                        ->first();
            		if($exists) {
            			//alreay Exists       	                			       			
            			$output['exists'][] = $row;
            		} else {
            			//insert
            			$entryDate = date('Y-m-d', strtotime($date));

            			$punch_in_utc_time = '';
            			$punch_in_user_time = '';
            			$punchTimeOffset = '5.5';

            			$punch_out_utc_time = '';
            			$punch_out_user_time = '';
            			$offset = $punchTimeOffset * 60 * 60;

            			//punch in
                        if($punchInTime) {
                			$punchInDateTime = $entryDate . " " . date('H:i:s', strtotime($punchInTime));
                			$punchInDateTime = date('Y-m-d H:i:s', strtotime($punchInDateTime));
                			// convert local time to UTC
    						$punchInUtcTime = date('Y-m-d H:i:s', strtotime($punchInDateTime) - $offset);
                        } else {
                            $punchInDateTime = null;
                            $punchInUtcTime = null;
                            $output['punch_in_missing'][] = $row;
                        }
            			
                        if($punchOutTime) {
    						$punchOutDateTime = $entryDate . " " . date('H:i:s', strtotime($punchOutTime));
    						$punchOutDateTime = date('Y-m-d H:i:s', strtotime($punchOutDateTime));
    						// convert local time to UTC
                			$punchOutUtcTime = date('Y-m-d H:i', strtotime($punchOutDateTime) - $offset);
                        } else {
                            $punchOutDateTime = null;
                            $punchOutUtcTime = null;
                            $output['punch_out_missing'][] = $row; 
                        }

                        $insert = new tPunchInOut;
                        $insert->employee_id = $employeePrimayId;
                        $insert->punch_in_utc_time = $punchInUtcTime;
                        $insert->punch_in_time_offset = $punchTimeOffset;
                        $insert->punch_in_user_time = $punchInDateTime;
                        $insert->punch_out_utc_time = $punchOutUtcTime;
                        $insert->punch_out_time_offset = $punchTimeOffset;
                        $insert->punch_out_user_time = $punchOutDateTime;
                        $insert->state = 'PUNCHED OUT';
                        $insert->status = 2;
                        $insert->created_by = Auth::user()->id;
                        $insert->updated_by = Auth::user()->id;
                        $insert->is_import = 1;
                        $insert->comments = 'Created from Biometric Data Import';
                        $insert->save();            			

            			if($insert && $insert->id){
            				$output['success'][] = $row;
            			} else {
            				$output['errors'][] = $row;
            			}
            		}
            	} else {
                    $output['emp_not_found'][] = $row;
                }
            } else {
            	$output['errors'][] = $row;
            }                	                	
        }
        return $output;
	}


}
