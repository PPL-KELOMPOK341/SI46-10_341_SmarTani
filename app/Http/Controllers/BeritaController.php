<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BeritaController extends Controller
{
    private $beritas = [
        [
            'judul' => 'Harga Cabai Meningkat di Bandung',
            'tanggal' => '2024-06-03',
            'isi' => 'Harga cabai mengalami kenaikan yang signifikan di daerah Bandung...',
            'gambar' => 'path/to/image1.jpg',
            'slug' => 'harga-cabai-meningkat-di-bandung'
        ],
        [
            'judul' => 'Cabe lagi mahal',
            'tanggal' => '2024-06-01',
            'isi' => 'Kenaikan harga cabe berlanjut...',
            'gambar' => 'path/to/image2.jpg',
            'slug' => 'cabe-lagi-mahal'
        ],
        [
            'judul' => 'Panen Raya Membuat Harga Sayur Turun',
            'tanggal' => '2024-05-25',
            'isi' => 'Karena panen raya, harga sayuran menurun drastis...',
            'gambar' => 'path/to/image3.jpg',
            'slug' => 'panen-raya-sayur'
        ]
    ];

    public function index(Request $request)
    {
        // Bisa tambahkan filter jika perlu, tapi untuk sekarang langsung kirim data statis
        $beritas = $this->beritas;

        return view('dashboard', compact('beritas'));
    }

    public function show($slug)
    {
        $berita = collect($this->beritas)->firstWhere('slug', $slug);

        if (!$berita) {
            abort(404);
        }

        return view('berita.show', compact('berita'));
    }
}
