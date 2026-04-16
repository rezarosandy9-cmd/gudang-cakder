<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login web
     */
    public function index()
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }

    /**
     * Logika Login Web (Anti-Bcrypt)
     */
    public function authenticate(Request $request)
    {
        // 1. Validasi input sederhana
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // 2. Cari user secara manual di database (Plain Text Mode)
        // Kita tidak pakai Auth::attempt karena itu pemicu error Bcrypt
        $user = DB::table('users')
            ->where('username', $request->username)
            ->where('password', $request->password)
            ->first();

        // 3. Jika user ditemukan
        if ($user) {
            // Login-kan user ke sistem Laravel secara manual menggunakan ID-nya
            Auth::loginUsingId($user->id);

            // Buat session baru agar aman
            $request->session()->regenerate();

            // Lempar ke halaman dashboard utama (route '/')
            return redirect()->intended('/');
        }

        // 4. Jika gagal, balikkan ke login dengan pesan error
        return back()->with('loginError', 'Login Gagal! Username atau password salah.');
    }

    /**
     * Logika Logout Web
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}