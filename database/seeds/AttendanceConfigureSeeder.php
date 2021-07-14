<?php

use Illuminate\Database\Seeder;

class AttendanceConfigureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_attendance_configures')->truncate();
 
        $attendance_configures = [
            ['action' => 'Employee can change current time when punching in/out', 'action_flag' => '0'],
            ['action' => 'Employee can edit/delete own attendance records', 'action_flag' => '0'],
            ['action' => 'Supervisor can add/edit/delete attendance records of subordinates', 'action_flag' => '0'],
        ];
 
        DB::table('m_attendance_configures')->insert($attendance_configures);
    }
}
