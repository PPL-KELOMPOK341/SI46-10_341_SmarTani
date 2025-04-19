<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenanamanController;
//use App\Http\Controllers\RiwayatPengeluaranController;
use App\Http\Controllers\BeritaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Route::get('/riwayat-pengeluaran', [RiwayatPengeluaranController::class, 'index'])->name('riwayat.index');
//Route::get('/riwayat-pengeluaran/{id}', [RiwayatPengeluaranController::class, 'show'])->name('riwayat.show');


Route::get('/dashboard', [BeritaController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/berita/{slug}', function ($slug) {
    $beritas = [
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

    $berita = collect($beritas)->firstWhere('slug', $slug);

    if (!$berita) {
        abort(404);
    }

    return view('berita.show', compact('berita'));
});



// Form Penanaman
Route::get('/form-penanaman', [PenanamanController::class, 'create'])->name('penanaman.create');
Route::post('/form-penanaman', [PenanamanController::class, 'store'])->name('penanaman.store');

