<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'phone' => '081234567890',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'Admin Tani',
            'email' => 'admin@example.com',
            'phone' => '081111111111',
            'password' => Hash::make('adminpass'),
        ]);

        User::create([
            'name' => 'Petani Uji',
            'email' => 'petani@example.com',
            'phone' => '082222222222',
            'password' => Hash::make('petanipass'),
        ]);
    }
}
