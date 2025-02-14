<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CekLevel
{
    public function handle(Request $request, Closure $next, $level)
    {
        // Cek apakah user sudah login
        if (!Session::has('user_id')) {
            return redirect('/login')->with('failed', 'Silakan login terlebih dahulu.');
        }

        // Cek level user
        if (Session::get('user_level') !== $level) {
            return abort(403, 'Akses ditolak'); // Bisa redirect ke halaman lain
        }

        return $next($request);
    }
}
