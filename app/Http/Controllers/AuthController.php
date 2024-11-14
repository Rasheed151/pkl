<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');  // Mengarahkan ke view login
    }

    // Menangani login request
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        // Mendapatkan data inputan name dan password
        $credentials = $request->only('name', 'password');

        // Coba login dengan kredensial yang diberikan
        if (Auth::attempt($credentials)) {
            // Regenerasi session setelah login berhasil
            $request->session()->regenerate();

            // Redirect ke halaman home atau halaman tujuan
            return redirect()->intended('home')->with('success', 'Login berhasil!');
        }

        // Jika login gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'name' => 'Username atau password yang Anda masukkan salah.',
        ])->withInput();
    }

    // Menangani logout
    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();

        // Invalidate session
        $request->session()->invalidate();

        // Regenerasi token CSRF
        $request->session()->regenerateToken();

        // Redirect ke halaman login setelah logout
        return redirect('/login')->with('success', 'Logout berhasil.');
    }

    
}
