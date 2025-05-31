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
                'konten' => 'Harga cabai mengalami kenaikan yang signifikan di daerah Bandung. Hal ini disebabkan oleh cuaca ekstrem yang mempengaruhi hasil panen. Para petani mengalami kesulitan dalam mempertahankan produksi cabai karena curah hujan yang tinggi.',
                'gambar' => 'public\storage\berita-images\cabai-bandung.jpg',
                'tanggal' => '2024-06-03',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Cabe lagi mahal',
                'konten' => 'Kenaikan harga cabe berlanjut di berbagai daerah. Permintaan yang tinggi tidak diimbangi dengan pasokan yang memadai. Petani menghadapi berbagai tantangan dalam produksi, termasuk serangan hama dan penyakit tanaman.',
                'gambar' => 'images/berita/cabai-mahal.jpg',
                'tanggal' => '2024-06-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Panen Raya Membuat Harga Sayur Turun',
                'konten' => 'Karena panen raya, harga sayuran menurun drastis di pasaran. Petani di berbagai daerah melaporkan hasil panen yang melimpah. Hal ini memberikan keuntungan bagi konsumen namun menjadi tantangan bagi petani dalam menjaga stabilitas harga.',
                'gambar' => 'images/berita/panen-raya.jpg',
                'tanggal' => '2024-05-25',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
