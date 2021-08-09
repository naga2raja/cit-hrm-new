<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class AttendanceReportExport implements FromArray, WithHeadings, WithMapping
{
    use Exportable;
    protected $attendance;

    public function __construct(array $attendance)
    {
        $this->attendance = $attendance;
    }

    public function map($attendance): array
    {
        return [
            $attendance['emp_name'],
            $attendance['punch_in_user_time'],
            $attendance['punch_out_user_time'],
            $attendance['punch_in_note'],
            $attendance['punch_out_note'],
            hoursAndMins($attendance['duration']),
            $attendance['current_status'],
            ($attendance['is_import']) ? 'Import' : 'Manual',
        ];
    }

    public function array(): array
    {
        return $this->attendance;
    }

    public function headings(): array
    {
        return [
            "Employee Name", "Punch In", "Punch Out" , "Punch In Note", "Punch Out Note", "Duration", "Status", "Type"
        ];
    }
}
