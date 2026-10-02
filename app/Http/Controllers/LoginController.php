<?php
// TARO FILE INI DI: app/Http/Controllers/LoginController.php (REPLACE file yang lama)

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        // ===== Username & password yang diizinkan (hardcode) =====
        if ($username === 'admin' && $password === 'admin123') {
            // Simpan status login ke session
            $request->session()->put('is_admin_logged_in', true);

            return redirect('/dashboard');
        }

        // Kalau salah, balik ke halaman login dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('is_admin_logged_in');
        return redirect('/login-admin');
    }
}