<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAdminController;



Route::get('/admin/login', [LoginAdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginAdminController::class, 'login']);

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [LoginAdminController::class, 'dashboard'])->name('admin.dashboard');
});

use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

//Setting Website
use App\Http\Controllers\SettingWebsiteController;

Route::get('/setting-website', [SettingWebsiteController::class, 'index'])->name('setting.website');
Route::post('/setting-website', [SettingWebsiteController::class, 'store']);



