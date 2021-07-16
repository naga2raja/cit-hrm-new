<?php
use App\User;
use App\Employee;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Administrator',
            'email' => 'cithrm@yopmail.com',
            'password' => bcrypt('password'),
        ]);
        Employee::insert([
            'user_id' => $user->id,
            'email' => 'cithrm@yopmail.com',
            'first_name' => 'Admin',
            'last_name' => ' Admin',
            'employee_id' => '001',
            'status' => 'Active'     
        ]);
        $user->assignRole('Admin');

        $user = User::create([
            'name' => 'Employee',
            'email' => 'employee@yopmail.com',
            'password' => bcrypt('password'),
        ]);
        Employee::insert([
            'user_id' => $user->id,
            'email' => 'employee@yopmail.com',
            'first_name' => 'employee',
            'last_name' => ' Demo',
            'employee_id' => '002',
            'status' => 'Active'  
        ]);
        $user->assignRole('Employee');
    }
}
