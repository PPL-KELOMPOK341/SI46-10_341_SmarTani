<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BeritaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence,
            'konten' => $this->faker->paragraph,
            'tanggal' => now(),
            'gambar' => public_path('storage/berita-images/test-petani.jpg'), // pakai gambar tetap
        ];
    }
}
