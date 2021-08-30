<?php

namespace App\Http\Controllers\Time\ProjectInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Employee;
use App\mProject;
use App\mCustomer;
use App\tProjectAdmin;
use App\tProjectManager;
use App\tProjectEmployee;
use App\tActivity;

class ProjectsImportController extends Controller
{
    public function index() {        
        return view('time/project_info/projects/import');
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

        // $request->validate([
        //     'upload_file' => 'max:1024|required|mimes: xlsx,xls,csv,txt', //csv,txt
        // ]);

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
        
        return redirect()->back()
                            ->with('success', 'Data imported successfully')
                            ->with('output', $output); 
    }

    public function importData($csvAsArray)
	{
        $output = [];
		$output['errors'] = [];
        $output['success'] = [];

        array_shift($csvAsArray); // remove the header
        foreach($csvAsArray as $data) {
            $projectName = trim($data[0]);
            $customerName = trim($data[1]);
            $projectActivities = trim($data[2]);
            $projectAdmin = trim($data[3]);
            $projectManagerIds = trim($data[4]);
            $projectEmployeeIds = trim($data[5]);

            if($projectName && $customerName) {
                //check project is already exists
                $projectInfo = mProject::where('project_name', $projectName)->first();
                $projectCustomer = mCustomer::where('customer_name', $customerName)->first();
                $insertFlag = false;

                if(!$projectCustomer) {
                    //create customer
                    $projectCustomer = new mCustomer;
                    $projectCustomer->customer_name = $customerName;
                    $projectCustomer->customer_description = '';
                    $projectCustomer->save();
                }
                if(!$projectInfo && $projectCustomer) {
                    // insert
                    $projectInfo = new mProject;
                    $projectInfo->project_name = $projectName;
                    $projectInfo->project_description = '';
                    $projectInfo->customer_id = $projectCustomer->id;
                    $projectInfo->save();

                    $insertFlag = true;                    
                }

                //Activities
                if($projectActivities) {
                    $activies = explode(',', $projectActivities);
                    foreach ($activies as $task) {
                        $task = trim($task);
                        $isExists = tActivity::where('project_id', $projectInfo->id)
                            ->where('activity_name', $task)
                            ->first();
                        if(!$isExists) {
                            tActivity::create([
                                'project_id' => $projectInfo->id,
                                'activity_name' => $task,
                            ]);
                        }
                    }
                }

                //project Admin
                if($projectAdmin) {                    
                    $adminEmp = Employee::where('employee_id', $projectAdmin)->first();
                    if($adminEmp) {
                        $isExists = tProjectAdmin::where('project_id', $projectInfo->id)->where('admin_id', $adminEmp->id)->first();
                        if(!$isExists) {
                            $projectAdmin = new tProjectAdmin;   
                            $projectAdmin->project_id = $projectInfo->id;
                            $projectAdmin->admin_id = $adminEmp->id;
                            $projectAdmin->save();
                        }
                    }                   
                }

                //Project Managers
                if($projectManagerIds) {
                    $managerIds = explode(',', $projectManagerIds);
                    if(count($managerIds)) {                                
                        foreach($managerIds as $employeeId) {
                            $empDet = Employee::where('employee_id', trim($employeeId))->first();
                            if($empDet) {  
                                $isExists = tProjectManager::where('project_id', $projectInfo->id)
                                    ->where('employee_id', $empDet->id)
                                    ->first();
                                if(!$isExists) {
                                    $projectManager = new tProjectManager;
                                    $projectManager->project_id = $projectInfo->id;                                  
                                    $projectManager->employee_id = $empDet->id;                             
                                    $projectManager->save();                                            
                                }
                            }
                        }
                    }
                }

                //Project Employees
                if($projectEmployeeIds) {
                    $employeeIds = explode(',', $projectEmployeeIds);
                    if(count($employeeIds)) {
                        foreach($employeeIds as $employeeId) {
                            $empDet = Employee::where('employee_id', trim($employeeId))->first();
                            if($empDet) {   
                                $isExists = tProjectEmployee::where('project_id', $projectInfo->id)
                                    ->where('employee_id', $empDet->id)
                                    ->first();
                                if(!$isExists) {
                                    $tProjectEmployee = new tProjectEmployee;                                         
                                    $tProjectEmployee->project_id = $projectInfo->id;
                                    $tProjectEmployee->employee_id = $empDet->id;
                                    $tProjectEmployee->save();                                            
                                }
                            }                            
                        }  
                    }
                }

                if($insertFlag){
                    $output['success'][] = $data;
                } else {
                    $output['errors'][] = $data;
                }
            } else {
                $output['errors'][] = $data;
            }
        } // for each end
        return $output;
    }

}
