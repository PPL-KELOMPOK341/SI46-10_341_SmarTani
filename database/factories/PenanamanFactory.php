<?php

namespace Database\Factories;

use App\Models\Penanaman;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenanamanFactory extends Factory
{
    protected $model = Penanaman::class;

    public function definition()
    {
        return [
            'user_id' => User::first()->id,  // Mengambil ID user pertama yang ada di database
            'nama_tanaman' => $this->faker->word,
            'lokasi_lahan' => $this->faker->address,
            'luas_lahan' => $this->faker->randomFloat(2, 1, 100),
            'periode' => $this->faker->randomElement(['Periode I', 'Periode II']),
            'tanggal_penanaman' => $this->faker->date(),
            'jumlah_pupuk' => $this->faker->numberBetween(1, 100),
            'jumlah_bibit' => $this->faker->numberBetween(1, 100),
            'jenis_pestisida' => $this->faker->word,
            'jenis_pupuk' => $this->faker->word,
            'kendala' => $this->faker->sentence,
            'catatan' => $this->faker->sentence,
        ];
    }
}
