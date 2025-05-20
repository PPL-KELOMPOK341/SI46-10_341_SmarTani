<?php

namespace Database\Factories;

use App\Models\Pendapatan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PendapatanFactory extends Factory
{
    protected $model = Pendapatan::class;

    public function definition()
    {
        return [
            'tanggal_pemasukan' => $this->faker->date(),
            'total_pendapatan' => $this->faker->numberBetween(10000, 1000000),
            'sumber_pendapatan' => $this->faker->word,
            'deskripsi' => $this->faker->sentence,
        ];
    }
}
