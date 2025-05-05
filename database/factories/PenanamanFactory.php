<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penanaman>
 */
class PenanamanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'nama_tanaman' => $this->faker->word(),
            'lokasi_lahan' => $this->faker->address(),
            'luas_lahan' => $this->faker->numberBetween(50, 500),
            'periode' => $this->faker->randomElement(['Periode I', 'Periode II']),
            'tanggal_penanaman' => $this->faker->date('Y-m-d'),
            'jumlah_pupuk' => $this->faker->numberBetween(50, 500),
            'jumlah_bibit' => $this->faker->numberBetween(10, 100),
            'jenis_pestisida' => $this->faker->randomElement(['Herbisida', 'Insektisida', 'Fungisida', 'Moluskisida']),
            'jenis_pupuk' => $this->faker->randomElement(['Urea', 'HCL', 'NPK']),
            'kendala' => $this->faker->sentence(3),
            'catatan' => $this->faker->sentence(5),
        ];
    }
}