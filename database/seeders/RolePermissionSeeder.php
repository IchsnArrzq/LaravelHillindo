<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'client',
                'guard_name' => 'web'
            ]
        ];
        foreach($roles as $role){
            Role::create([
                'name' => $role['name'],
                'guard_name' => $role['guard_name']
            ]);
        }
    }
}
