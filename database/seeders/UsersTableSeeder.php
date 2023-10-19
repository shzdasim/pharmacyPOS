<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    // Additional users with different roles and permissions as needed
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
    DB::table('users')->insert([
        'name' => 'Admin User',
        'username' => 'admin',
        'email' => 'admin@example.com',
        'password' => Hash::make('password'),
        'role' => 'admin',
        'permissions' => json_encode(['manage_users' => true, 'manage_products' => true]),
    ]);

    // Salesman user
    DB::table('users')->insert([
        'name' => 'Salesman User',
        'username' => 'salesman',
        'email' => 'salesman@example.com',
        'password' => Hash::make('password'),
        'role' => 'salesman',
        'permissions' => json_encode(['manage_products' => true]),
    ]);
    }
}
