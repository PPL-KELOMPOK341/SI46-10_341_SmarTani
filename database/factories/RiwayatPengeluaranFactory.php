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
            'nama_tanaman' => $this->faker->word(),
            'periode' => $this->faker->regexify('[0-9]{4}-0[1-9]'),
            'tanggal_penanaman' => $this->faker->date(),
            'tanggal_pengeluaran' => $this->faker->date(),
            'biaya_bibit' => $this->faker->numberBetween(10000, 50000),
            'biaya_pupuk' => $this->faker->numberBetween(10000, 50000),
            'upah_panen' => $this->faker->numberBetween(10000, 50000),
            'jumlah_pupuk' => $this->faker->numberBetween(1, 20),
            'jumlah_bibit' => $this->faker->numberBetween(1, 100),
            'keterangan' => $this->faker->sentence(3),
            'jumlah' => $this->faker->numberBetween(10000, 500000),
        ];
    }
}
