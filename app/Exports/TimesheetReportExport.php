<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TimesheetReportExport implements FromArray, WithHeadings, WithMapping
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
            $timesheet['employee_name'],
            $timesheet['project_name'],
            $timesheet['date'],
            hoursAndMins($timesheet['duration']),
            currentPunchStatus($timesheet['status']),
            date('Y-m-d H:i:s a', strtotime($timesheet['created_at'])),
        ];
    }

    public function array(): array
    {
        return $this->timesheet;
    }

    public function headings(): array
    {
        return [
            "Employee Name", "Project Name", "Date", "Duration", "Status", "Type", "Created at"
        ];
    }
}
