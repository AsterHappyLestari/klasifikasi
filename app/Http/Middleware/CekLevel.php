<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
    // Memeriksa apakah pengguna telah login
    if (Auth::check()) {
        // Memeriksa apakah peran pengguna sesuai dengan yang diizinkan
        if (Auth::user()->level == $ceklevel) {
            return $next($request);
        }
    }

    // Jika peran tidak sesuai, arahkan pengguna ke halaman yang sesuai
    return redirect('/login'); // Ganti dengan halaman yang sesuai

    
}
}