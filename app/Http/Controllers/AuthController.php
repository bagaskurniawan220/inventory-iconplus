<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Memproses form login
    public function login(Request $request)
    {
        $data = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required'    => 'Email harus diisi.',
            'email.email'       => 'Format email tidak benar.',
            'password.required' => 'Password harus diisi.',
        ]);

        if (Auth::attempt($data, $request->boolean('remember'))) {
            $request->session()->regenerate();

            ActivityLog::create([
                'user_id'     => Auth::id(),
                'action'      => 'login',
                'description' => Auth::user()->name . ' masuk ke aplikasi',
            ]);

            return redirect()->intended('/dashboard');
        }

        return back()
            ->withErrors(['email' => 'Email atau password salah.'])
            ->onlyInput('email');
    }

    // Keluar dari aplikasi
    public function logout(Request $request)
    {
        ActivityLog::create([
            'user_id'     => Auth::id(),
            'action'      => 'logout',
            'description' => Auth::user()->name . ' keluar dari aplikasi',
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
