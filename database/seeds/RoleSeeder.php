<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'admin'             => 'Admin',
            'manager'     		=> 'Manager',
            'employee'          => 'Employee'
        ];

        foreach ($roles as $permission => $role) {
            $user = Role::create([
                'name' => $role
            ]);            
        }
    }
}
