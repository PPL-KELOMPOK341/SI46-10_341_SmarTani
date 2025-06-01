<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class BeritaFactory extends Factory
{
    public function definition(): array
    {
        // Path ke folder gambar dalam storage publik
        $imageDirectory = public_path('storage/berita-images');

        // Ambil semua file dari folder
        $images = File::files($imageDirectory);

        // Pilih satu gambar secara acak, fallback ke 'test-petani.jpg'
        $randomImage = count($images) > 0
            ? 'storage/berita-images/' . $images[array_rand($images)]->getFilename()
            : 'storage/berita-images/test-petani.jpg';

        return [
            'judul' => $this->faker->sentence,
            'konten' => $this->faker->paragraph,
            'tanggal' => now(),
            'gambar' => $randomImage,
        ];
    }
}