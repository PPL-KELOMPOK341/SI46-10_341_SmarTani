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
            'user_id' => User::factory(), // buat user sekalian
            'nama_tanaman' => $this->faker->word(),
            'periode' => $this->faker->yearMonth(), // contoh 202504
        ];
    }
}
