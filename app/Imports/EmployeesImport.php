<?php

namespace App\Imports;

use App\User;
use App\Employee;
use App\ContactDetails;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\mJobTitle;
use App\mJobCategory;
use App\mCompanyLocation;
use App\tEmployeeReportTo;
use App\mCountry;

class EmployeesImport implements ToModel, WithStartRow
{
    private $rows = 0;
    private $results = [];

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $first_name = $row[0];
        $middle_name = $row[1];
        $last_name = $row[2];        
        $employee_id = $row[3];
        $email = $row[4];
        $gender = $row[5];
        $dob = $row[6];
        $marital_status = $row[7];
        $street_address_1 = $row[8];
        $street_address_2 = $row[9];
        $city = $row[10];
        $state = $row[11];
        $zip_code = $row[12];
        $country = $row[13];
        $home_telephone = $row[14];
        $mobile = $row[15];
        $work_telephone = $row[16];
        $alternate_email = $row[17];
        $status = $row[18];
        $job_title = $row[19];
        $job_category = $row[20];
        $date_of_join = $row[21];
        $company_name = $row[22];
        $company_country = $row[23];
        $company_state = $row[24];
        $company_city = $row[25];
        $company_address = $row[26];
        $report_to = $row[27]; //Emmployee_id Comma Separated
        $user_role = $row[28];
        $user_password = $row[29];
        //$isExists = User::where('email', $email)->first();
        $isExistsEmployee = Employee::where('employee_id', $employee_id)->orWhere('email', $email)->withTrashed()->first();

       if($first_name && $last_name && $email && !$isExistsEmployee) {            
            // $user = new User;
            // $user->name = $first_name . ' '.$middle_name.' '.$last_name;
            // $user->email = $email;
            // $user->password = bcrypt(time());
            // $user->save();
            // Log::info($user); 

            // $user->assignRole('Employee');

            //job_title
            
            //check the job_title is there
            $jobTitle = mJobTitle::where('job_title', $job_title)->first();
            if(!$jobTitle && $job_title) {
                //insert job title
                $jobTitle = new mJobTitle;
                $jobTitle->job_title = $job_title;
                $jobTitle->save();
                $job_id = $jobTitle->id;
            }
            $job_id = ($jobTitle) ? $jobTitle->id : NULL; 
            //job_category
            $jobCategory = mJobCategory::where('name', $job_category)->first();
            if(!$jobCategory && $job_category) {
                $jobCategory = new mJobCategory;
                $jobCategory->name = $job_category;
                $jobCategory->save();
            }
            $job_category_id = ($jobCategory) ? $jobCategory->id : NULL;

            $locationId = NULL;
            $companyLocation = mCompanyLocation::where('company_name', $company_name)->first();
            if($companyLocation) {
                $locationId = $companyLocation->id;
            } else {
                //insert Company
                $countryDet = mCountry::where('country', $company_country)->first();
                $countryId = ($countryDet) ? $countryDet->id : NULL;
                if($countryId && $company_name && $company_country && $company_state && $company_city) {
                   $company = new mCompanyLocation;
                   $company->company_name = $company_name;
                   $company->country_id = $countryId;
                   $company->state_province = $company_state;
                   $company->city = $company_city;
                   $company->address = ($company_address) ? $company_address : '';
                   $company->zip_code = '';
                   $company->phone_number = '';
                   $company->fax = '';
                   $company->notes = '';
                   $company->save();
                   $locationId = $company->id;
                }
            }

            $user_id = NULL;
            if($user_password) {
                $isExists = User::where('email', $email)->first();
                if($isExists) {
                    // 'Email already Exists');        
                } else {
                    $user = new User;
                    $user->name = $first_name . ' '.$last_name;
                    $user->email = $email;
                    $user->password =  Hash::make($user_password);
                    $user->save();  

                    $user_id = $user->id;

                    if($user_role == 'Employee' || $user_role == 'Admin' || $user_role == 'Manager') {
                        $user->assignRole($user_role); 
                    } else {
                        $user->assignRole('Employee');                  
                    }
                }
                
            }

            $employee = new Employee;
            $employee->user_id = $user_id;
            $employee->first_name = $first_name;
            $employee->middle_name = $middle_name;
            $employee->last_name = $last_name;
            $employee->email = $email;
            $employee->employee_id = $employee_id;
            $employee->status = ($status == 'in active' || $status == 'In active' || $status == 'In Active') ? 'In active' : 'Active';
            $employee->gender = $gender;
            $employee->joined_date = date('Y-m-d', strtotime($date_of_join));
            $employee->date_of_birth = date('Y-m-d', strtotime($dob));
            $employee->job_id = $job_id;
            $employee->job_category_id = $job_category_id;
            $employee->company_location_id = $locationId;
            $employee->created_by = Auth::User()->id;
            $employee->updated_by = Auth::User()->id;        
            $employee->save();

            $contact = new ContactDetails;
            $contact->user_id = $employee->id;
            $contact->street_address_1 = $street_address_1;
            $contact->street_address_2 = $street_address_2;
            $contact->city = $city;
            $contact->state = $state;
            $contact->zip_code = $zip_code;
            $contact->country = $country;
            $contact->home_telephone = $home_telephone;
            $contact->mobile = $mobile;
            $contact->work_telephone = $work_telephone;
            $contact->alternate_email = $alternate_email;
            $contact->save();

            //Report To
            if($report_to) {
                $managerIds = explode(',', $report_to);
                if(count($managerIds)) {
                    foreach ($managerIds as $manager) {
                        //get employee primary id in employees table
                        $managerEmp = Employee::where('employee_id', $manager)->first();
                        if($managerEmp) {
                            $report = new tEmployeeReportTo;
                            $report->employee_id = $employee->id;
                            $report->manager_id = $managerEmp->id;
                            $report->save();                            
                        }
                    }
                }
            }            

            $this->results['success'][] = ['name' => $first_name . ' '.$middle_name.' '.$last_name, 'email' => $email];
            ++$this->rows;
            Log::info("==== Inserted Success====");
            Log::info($employee);
            return $employee;
       } else {
            Log::info("==== Not Inserted ====");
            Log::info($email);
            $this->results['failed'][] = ['name' => $first_name . ' '.$middle_name.' '.$last_name, 'email' => $email];
       } 
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }

    public function getResultsArray(): array
    {
        return $this->results;
    }
}
