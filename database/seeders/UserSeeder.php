<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ],
            [
                'name' => 'client',
                'email' => 'client@client.com',
                'password' => Hash::make('password'),
                'role' => 'client'
            ]
        ];
        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password']
            ])->assignRole($user['role']);
        }
    }
}
