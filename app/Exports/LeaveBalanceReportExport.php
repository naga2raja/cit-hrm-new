<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LeaveBalanceReportExport implements FromArray, WithHeadings, WithMapping
{
    use Exportable;
    protected $leaveBalance;

    public function __construct(array $leaveBalance)
    {
        $this->leaveBalance = $leaveBalance;
    }

    public function map($leaveBalance): array
    {
        return [
            $leaveBalance['employee_name'],
            $leaveBalance['leave_type'],
            ($leaveBalance['from_date'] .' - '. $leaveBalance['to_date']), 
            $leaveBalance['no_of_days'], 
            (float) $leaveBalance['leaves_taken'],
            (float) ($leaveBalance['no_of_days']  - $leaveBalance['leaves_taken'] )            
        ];
    }

    public function array(): array
    {
        return $this->leaveBalance;
    }

    public function headings(): array
    {
        return ["Employee Name", "Leave Type", "Leave Period", "Total Leaves", "Leaves Taken", "Leave Balance"];
    }
}
