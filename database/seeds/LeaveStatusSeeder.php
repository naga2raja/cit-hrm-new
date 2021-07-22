<?php

use Illuminate\Database\Seeder;

class LeaveStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            'PENDING',
            'APPROVED',
            'TAKEN',
            'REJECTED',
            'CANCELLED',
        ];

        foreach($status as $value) {
            DB::table('m_leave_status')->insert(['name' => $value]);
        }
    }
}
