<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;


use App\User;

class EmployeesReportExport implements FromArray, WithHeadings
{
    use Exportable;

    protected $employees;

    /**
    * @return \Illuminate\Support\Collection
    */
   

    public function __construct(array $employees)
    {
        $this->employees = $employees;
    }

    public function array(): array
    {
        return $this->employees;
    }

    public function headings(): array
    {
        return [
            "Employee id", "First Name", "Middle Name" , "Last Name", "Email", "DOB", "Gender", "Date of Joining", "Status", "Created At", "Marital Status", "street_address_1", "street_address_2", "city", "State", "Country", "Zip code", "Home Telephone", "Mobile", "Work Telephone", "Alt Email", "job_title", "report_to"
        ];
    }

}
