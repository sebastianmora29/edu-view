<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    // Mostrar formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    //procesa el login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'alumno') {
                return redirect()->route('alumno.dashboard');
            } elseif ($user->role === 'profesor') {
                return redirect()->route('profesor.dashboard');
            }

            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Credenciales inválidas'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home'); // mejor mandar a login que a home si ya no tienes home
    }
}
