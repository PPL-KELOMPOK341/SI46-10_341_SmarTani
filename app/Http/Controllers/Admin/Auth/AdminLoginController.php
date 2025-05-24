<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only(['showLoginForm', 'login']);
    }

    public function showLoginForm()
    {
        return view('admin.auth.login'); // pastikan view ini ada
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user && $user->role === 'admin') {
                return redirect()->route('admin.beranda'); // pastikan route ini sesuai
            }

            Auth::logout();
            return back()->withErrors(['email' => 'Anda tidak memiliki akses sebagai admin.']);
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login'); // sesuaikan dengan route login admin kamu
    }
}
