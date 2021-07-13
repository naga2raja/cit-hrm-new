<?php

namespace App\Imports;

use App\User;
use App\Employee;
use App\ContactDetails;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Auth;
use Illuminate\Support\Facades\Log;

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
        $isExists = User::where('email', $email)->first();
        $isExistsEmployee = Employee::where('employee_id', $employee_id)->first();

       if($first_name && $last_name && $email && !$isExists && !$isExistsEmployee) {            
            // return new User([
            //     'name' => $first_name . ' '.$middle_name.' '.$last_name,
            //     'email' => $email,
            //     'password' => 'hello'
            // ]);
            // Log::info('here');
            $user = new User;
            $user->name = $first_name . ' '.$middle_name.' '.$last_name;
            $user->email = $email;
            $user->password = bcrypt(time());
            $user->save();
            Log::info($user);  
            $this->results['success'][] = $user;
            ++$this->rows;

            $user->assignRole('Employee');

            $employee = new Employee;
            $employee->user_id = $user->id;
            $employee->first_name = $first_name;
            $employee->middle_name = $middle_name;
            $employee->last_name = $last_name;
            $employee->employee_id = $employee_id;
            $employee->status = 'Active';
            $employee->created_by = Auth::User()->id;
            $employee->updated_by = Auth::User()->id;        
            $employee->save();

            $contact = new ContactDetails;
            $contact->user_id = $user->id;
            $contact->street_address_1 = $street_address_1;
            $contact->street_address_2 = $street_address_2;
            $contact->city = $city;
            $contact->state = $state;
            $contact->zip_code = $zip_code;
            $contact->country = $country;
            $contact->home_telephone = $home_telephone;
            $contact->mobile = $mobile;
            $contact->save();

            return $user;
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
