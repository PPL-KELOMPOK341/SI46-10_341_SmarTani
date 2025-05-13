<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

class FortifyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Fortify::loginView(function () {
            return view('auth.login');
        });
    
        // Ganti route login default dengan controller custom
        app()->bind(
            \Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class,
            AuthenticatedSessionController::class
        );
    }
}