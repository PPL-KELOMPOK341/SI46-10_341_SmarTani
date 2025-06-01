<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update an existing user to be admin or create a new admin user
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@example.com'], // Change to your admin email
            
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'), // Change to a secure password
                'role' => 'admin',
                'is_admin' => true,
                'phone' => '0000000000',
            ]
        );
    }
}
