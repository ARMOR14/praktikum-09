<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        // cek login
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect('/dashboard');
        }

        // jika gagal
        return back()->with('error', 'Email atau password salah');
    }
    public function logout()
    {
        Auth::logout(Auth::user());
        return redirect('/login');
    }
}
