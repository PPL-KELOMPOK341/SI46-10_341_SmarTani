<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class FortifyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Fortify::loginView(function () {
            if (request()->is('admin/login')) {
                return view('admin.auth.login'); // Tampilan login khusus admin
            }
            return view('auth.login'); // Tampilan login umum untuk user
        });

        Fortify::authenticateUsing(function ($request) {
            $user = \App\Models\User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                return $user;
            }

            return null;
        });

        Fortify::redirects([
            'login' => function () {
                if (Auth::check() && Auth::user()->role === 'admin') {
                    return '/admin/dashboard'; // Arahkan ke dashboard admin
                }
                return '/user/dashboard'; // Arahkan ke dashboard user biasa
            },
        ]);
    }
}
