<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => 'Aplikasi THT | Halaman Login'
        ]);
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard')->with('success', 'Login success');
        }

        return back()->with('loginError', 'Email atau password salah')->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Sampai jumpa kembali');
    }
}
