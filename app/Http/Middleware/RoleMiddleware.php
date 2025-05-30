<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
    if (!Auth::check()) {
        return redirect('/login');
    }

    $user = Auth::user();

    // Cek apakah role pengguna valid
    if (empty($user->role) || !in_array($user->role, $roles)) {
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }

    return $next($request);
    }

}
