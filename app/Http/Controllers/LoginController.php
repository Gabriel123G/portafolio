<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function viewLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $messages = [
            'name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ];
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ], $messages);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('admin');
        } else {
           return redirect()->route('login')->withErrors(['email' => 'Usuario o contraseña equivocado']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
