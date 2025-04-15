<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Berita;

class BeritaSeeder extends Seeder
{
    public function run()
    {
        DB::table('beritas')->insert([
            [
                'judul' => 'Harga Cabai Meningkat di Bandung',
                'konten' => 'Harga cabai naik karena musim hujan.',
                'gambar' => 'cabai.jpg',
                'tanggal' => '2024-06-03',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Cabe lagi mahal',
                'konten' => 'Permintaan meningkat, suplai berkurang.',
                'gambar' => 'cabai.jpg',
                'tanggal' => '2024-06-03',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
