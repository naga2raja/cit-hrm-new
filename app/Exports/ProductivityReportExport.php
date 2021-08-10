<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductivityReportExport implements FromArray, WithHeadings, WithMapping
{ 
    use Exportable;
    protected $timesheet;

    public function __construct(array $timesheet)
    {
        $this->timesheet = $timesheet;
    }

    public function map($timesheet): array
    {
        return [
            $timesheet['project_name'],
            $timesheet['customer_name'],
            hoursAndMins($timesheet['duration'])
        ];
    }

    public function array(): array
    {
        return $this->timesheet;
    }

    public function headings(): array
    {
        return [
            [' ', 'Productivity Report', ''],
            ["Project Name", "Customer Name", "Duration"]
        ];
    }
}
