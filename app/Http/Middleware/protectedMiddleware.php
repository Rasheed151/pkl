<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class protectedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah pengguna sudah login dan memiliki nama "admin"
        if ($request->user() && $request->user()->name === 'admin') {
            // Mengarahkan ke halaman admin jika nama pengguna adalah "admin"
            return $next($request);
        }

        // Jika bukan "admin", lanjutkan ke halaman biasa
        return redirect('/home');
    }
}
