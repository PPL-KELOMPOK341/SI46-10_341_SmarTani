<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Proses autentikasi user
        $request->authenticate();

        // Regenerasi session untuk mencegah session fixation
        $request->session()->regenerate();

        // Cek role pengguna setelah login
        $user = Auth::user();
        if ($user->role === 'admin') {
            // Redirect ke dashboard admin jika user adalah admin
            return redirect()->route('admin.dashboard');  // Ganti 'admin.home' dengan 'admin.dashboard'
        }

        // Redirect ke dashboard biasa jika bukan admin
        return redirect()->route('dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
