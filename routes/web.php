<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendapatanController;
use App\Http\Controllers\RiwayatPengeluaranController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\RiwayatPendapatanController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenanamanController;
use App\Http\Controllers\HasilPanenController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\SettingWebsiteController;
use App\Http\Controllers\Admin\AdminController;

// ============================
// Default Route
// ============================
Route::get('/', function () {
    return view('welcome');
});

// ============================
// Admin Authentication Routes
// ============================
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
});

// Admin Logout (terpisah dari group karena redirect bisa custom)
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// ============================
// Admin Protected Routes
// ============================
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Dashboard Admin
    Route::get('/beranda', [AdminController::class, 'index'])->name('admin.beranda');

    // Setting Website
    Route::get('/setting-website', [SettingWebsiteController::class, 'index'])->name('setting.website');
    Route::post('/setting-website', [SettingWebsiteController::class, 'store']);
    Route::post('/setting-website', [SettingWebsiteController::class, 'store'])->name('setting.website.store');

    // Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('admin.pengaduan');
    // Route::get('/data-user', [UserController::class, 'index'])->name('admin.data-user');
});

// ============================
// User Authentication Routes
// ============================
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
});

// ============================
// User Protected Routes
// ============================
Route::middleware(['auth'])->group(function () {
    // Dashboard Berita
    Route::get('/dashboard', [BeritaController::class, 'index'])->name('dashboard');
    Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Penanaman
    Route::prefix('penanaman')->group(function () {
        Route::get('/form', [PenanamanController::class, 'create'])->name('penanaman.create');
        Route::post('/form', [PenanamanController::class, 'store'])->name('penanaman.store');
        Route::get('/riwayat', [PenanamanController::class, 'index'])->name('penanaman.index');
        Route::get('/form/hasil/{id}', [PenanamanController::class, 'hasilForm'])->name('penanaman.hasil-form');
        Route::get('/riwayat/detail/{id}', [PenanamanController::class, 'lihatDetail'])->name('penanaman.lihat-detail');
        Route::get('/{id}/edit', [PenanamanController::class, 'edit'])->name('penanaman.edit');
        Route::put('/{id}', [PenanamanController::class, 'update'])->name('penanaman.update');
        Route::delete('/{id}', [PenanamanController::class, 'destroy'])->name('penanaman.destroy');
    });

    // Hasil Panen
    Route::prefix('hasil-panen')->group(function () {
        Route::get('/', [HasilPanenController::class, 'index'])->name('hasil-panen.index');
        Route::get('/create', [HasilPanenController::class, 'create'])->name('hasil-panen.create');
        Route::post('/store', [HasilPanenController::class, 'store'])->name('hasil-panen.store');
        Route::get('/{id}', [HasilPanenController::class, 'show'])->name('hasil-panen.show');
        Route::get('/{id}/edit', [HasilPanenController::class, 'edit'])->name('hasil-panen.edit');
        Route::put('/{id}', [HasilPanenController::class, 'update'])->name('hasil-panen.update');
        Route::delete('/{id}', [HasilPanenController::class, 'destroy'])->name('hasil-panen.destroy');
    });

    // Pengeluaran
    Route::resource('pengeluaran', PengeluaranController::class);
    Route::post('pengeluaran/search', [PengeluaranController::class, 'search'])->name('pengeluaran.search');

    // Pendapatan
    Route::prefix('pendapatan')->group(function () {
        Route::get('/form', [PendapatanController::class, 'create'])->name('pendapatan.create');
        Route::post('/form', [PendapatanController::class, 'store'])->name('pendapatan.store');
        Route::get('/riwayat', [PendapatanController::class, 'index'])->name('riwayat_pendapatan.index');
        Route::get('/{id}', [PendapatanController::class, 'show'])->name('pendapatan.show');
        Route::get('/{id}/print', [PendapatanController::class, 'print'])->name('pendapatan.print');
        Route::get('/{id}/edit', [PendapatanController::class, 'edit'])->name('pendapatan.edit');
        Route::put('/{id}', [PendapatanController::class, 'update'])->name('pendapatan.update');
        Route::delete('/{id}', [PendapatanController::class, 'destroy'])->name('pendapatan.destroy');
    });

    // Form Pencatatan Manual
    Route::get('/form-pencatatan', function () {
        return view('form-pencatatan');
    })->name('form-pencatatan');
});

// ============================
// Fortify (or Laravel UI) Auth Routes
// ============================
require __DIR__ . '/auth.php';
