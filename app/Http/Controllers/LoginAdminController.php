<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
public function showLoginForm() {
    return view('admin.loginAdmin'); // Sesuaikan dengan nama Blade kamu
}

public function login(Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
        return redirect()->intended(route('admin.dashboard'));
    }

    return back()->with('login_error', 'Email atau password salah');
}

public function dashboard() {
    return view('admin.dashboard'); // Buat file dashboard.blade.php
}

}
