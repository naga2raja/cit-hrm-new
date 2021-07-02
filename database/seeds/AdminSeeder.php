<?php
use App\User;
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
        $user->assignRole('Admin');

        $user = User::create([
            'name' => 'Employee',
            'email' => 'employee@yopmail.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('Employee');
    }
}
