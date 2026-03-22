<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // 1. Menampilkan Halaman Login
    public function index()
    {
        // Pastikan file login.blade.php ada di folder resources/views/
        return view('login'); 
    }

    // 2. Logika Memeriksa Username & Password (Fungsi yang tadi Hilang)
    public function authenticate(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Cek ke database apakah cocok
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Selamat Datang, ' . Auth::user()->name);
        }

        // Jika salah, balikkan ke login dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    // 3. Logika Log Out
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function apilogin(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Ambil user
        $user = User::where('username', $request->username)->first();

        // Jika user tidak ditemukan
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User tidak ditemukan'
            ], 404);
        }

        // Cek password (WAJIB pakai Hash)
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Password salah'
            ], 401);
        }

        // Jika berhasil login
        return response()->json([
            'status' => 'success',
            'message' => 'Login berhasil',
            'data' => $user->only([
                'id',
                'name',
                'username',
                'created_at',
                'updated_at'
            ])
        ], 200);
    }
}