<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::where('email', 'admin@smartani.id')
            ->orWhere('phone', '081234567890')
            ->delete();

        User::create([
            'name' => 'Admin SmarTani',
            'email' => 'admin@smartani.id',
            'password' => Hash::make('admin12345'),
            'role' => 'admin',
            'phone' => '081234567890',
        ]);
    }
}
