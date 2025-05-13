<?php

namespace Database\Factories;

use App\Models\Pengeluaran;
use App\Models\Penanaman;
use Illuminate\Database\Eloquent\Factories\Factory;

class PengeluaranFactory extends Factory
{
    protected $model = Pengeluaran::class;

    public function definition()
    {
        return [
            'penanaman_id' => Penanaman::factory(), // otomatis buat Penanaman baru
            'nama_pengeluaran' => $this->faker->words(2, true), // contoh: "Pupuk Organik"
            'jumlah' => $this->faker->numberBetween(1, 100),
            'harga' => $this->faker->numberBetween(10000, 100000),
            'total_harga' => function (array $attributes) {
                return $attributes['jumlah'] * $attributes['harga'];
            },
            'tanggal_pengeluaran' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
        ];
    }
}