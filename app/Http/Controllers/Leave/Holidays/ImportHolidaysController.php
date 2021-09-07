<?php

namespace App\Http\Controllers\Leave\Holidays;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\mHoliday;
use App\mCountry;
use App\mCompanyLocation;

class ImportHolidaysController extends Controller
{
    public function index(Request $request) {
        return view('leave/holidays/import');
    }

    public function import(Request $request) {
        $validator = Validator::make(
            [
                'file'      => $request->upload_file,
                'extension' => strtolower($request->upload_file->getClientOriginalExtension()),
            ],
            [
                'file'          => 'required',
                'extension'      => 'required|in:csv,xlsx,xls',
            ]
          );
        
        $fileName = $_FILES['upload_file']['name'];
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);

        $tmpName = $_FILES['upload_file']['tmp_name'];
        if($ext == 'xls') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }
        if($ext == 'csv') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        }
        if($ext == 'xlsx') {            
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $reader->load($tmpName);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        $output = $this->importData($sheetData);
        // dd($output);
        
        return redirect()->back()
                            ->with('success', 'Holiday imported successfully')
                            ->with('output', $output); 
    }

    public function importData($csvAsArray)
	{
        $output = [];
        $output['errors'] = [];
        $output['success'] = [];

        array_shift($csvAsArray); // remove the header        
        foreach($csvAsArray as $data) {
            $holidayName = trim($data[0]);
            $date = date( 'Y-m-d', strtotime(trim($data[1])) );
            $country = trim($data[2]);
            $companyName = trim($data[3]);
            $repeatsAnnually = trim($data[4]);
            $duration = trim($data[5]);

            //Get Country id
            $countryDet = mCountry::where('country', $country)->first();
            $countryId = ($countryDet) ? $countryDet->id : NULL;

            //Get Company id
            $companyDet = mCompanyLocation::where('company_name', $companyName)->first();                
            $companyId = ($companyDet) ? $companyDet->id : NULL;

            if($holidayName && $date && $countryId && $companyId && $repeatsAnnually && $duration) {
                // Duplicate check
                $isExists = mHoliday::where('operational_country_id', $countryId)
                    ->where('operational_sub_unit_id', $companyId)
                    ->where('date', $date)
                    ->first();

                if(!$isExists) {
                    $recurring = ($repeatsAnnually == 'Yes') ? 1 : 0;
                    $holiday_duration = ($duration == '0.5') ? 1 : 0;

                    $holidays = mHoliday::create([
                        'description'  => $holidayName,
                        'date'  => $date,
                        'recurring' => $recurring,
                        'length' => $holiday_duration, // 0 => fullday, 1 => halfday
                        'operational_country_id'  => $countryId,
                        'operational_sub_unit_id'  => $companyId
                    ]);

                    $output['success'][] = $data;
                } else {
                    $output['errors'][] = $data;
                }
            } else {
                $output['errors'][] = $data;
            }
        }
        return $output;
    }
}
