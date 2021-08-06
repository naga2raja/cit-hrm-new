<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LeavesReportExport implements FromArray, WithHeadings
{
    use Exportable;
    protected $leaves;

    public function __construct(array $leaves)
    {
        $this->leaves = $leaves;
    }

    public function array(): array
    {
        return $this->leaves;
    }

    public function headings(): array
    {
        return [
            "Employee Name", "Leave Type", "From Date" , "To Date", "Leave Days", "Notes", "Status", "Created At"
        ];
    }
}
