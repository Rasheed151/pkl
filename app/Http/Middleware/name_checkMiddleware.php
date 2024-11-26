<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class name_checkMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah pengguna sudah login dan memiliki nama "admin"
        if ($request->user() && $request->user()->name === 'admin') {
            // Mengarahkan ke halaman admin jika nama pengguna adalah "admin"
            return redirect('/admin');
        }

        // Jika bukan "admin", lanjutkan ke halaman biasa
        return $next($request);
    }

    
}
