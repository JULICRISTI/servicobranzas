<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Auth extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('menu');
        }

        return redirect()->route('login')->with('error', 'Usuario o contraseña incorrectos');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }

    public function home()
    {
        $user = auth()->user();
        return view('home', compact('user'));
    }
}
