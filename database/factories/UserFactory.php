<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->unique()->phoneNumber(), // ✅ Tambahkan phone!
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // Default password
            'remember_token' => Str::random(10),
        ];
    }
}
