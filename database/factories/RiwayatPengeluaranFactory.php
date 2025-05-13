<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RiwayatPengeluaran>
 */
class RiwayatPengeluaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'tanggal' => $this->faker->date(),
            'keterangan' => $this->faker->sentence(3),
            'jumlah' => $this->faker->numberBetween(10000, 500000),
        ];
    }
}
