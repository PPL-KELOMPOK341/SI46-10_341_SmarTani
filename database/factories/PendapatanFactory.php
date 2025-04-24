<?php

namespace Database\Factories;

use App\Models\Pendapatan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PendapatanFactory extends Factory
{
    protected $model = Pendapatan::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'tanggal_pemasukan' => now(),
            'total_hasil_pendapatan' => $this->faker->numberBetween(100000, 1000000),
            'sumber_pendapatan' => $this->faker->randomElement(['Penjualan', 'Subsidi', 'Lainnya']),
        ];
    }
}
