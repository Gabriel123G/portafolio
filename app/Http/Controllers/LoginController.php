<?php

namespace App\Http\Controllers;

use App\Mail\VerificacionUsuarioMailable;
use App\Models\User;
use App\Models\UserVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Pest\Support\Str;

class LoginController extends Controller
{
    public function viewLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $messages = [
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ];
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ], $messages);

        $credentias = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if ($credentias) {
            if (Auth::user()->email_verified_at) {
                $request->session()->regenerate();
                return redirect()->intended('admin');
            } else {
                $token = Str::random(64);
                $hashToken = hash::make($token);
                UserVerification::insert([
                    'idUser' => Auth::user()->id,
                    'token' => $hashToken,
                    'expires_at' => now()->addHours(1)
            ]); 
                Mail::to(env('MAIL_FROM_ADDRESS'))->send(new VerificacionUsuarioMailable(Auth::user(), $hashToken));
                Auth::logout();
                return redirect()->route('login')->with('success','usuario no verificado se a enviado el correo al administrador');
            }

        } else {
            return redirect()->route('login')->with('success', 'Usuario o contraseña equivocado');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    public function signUp(Request $request)
    {
        $messages = [
            'name.required' => 'Debe ingresar un nombre',
            'name.max' => 'el nombre debe tener maximo 200 caracteres',
            'email.required' => 'Debe ingresar un email',
            'email.email' => 'El el correo en formato email ejemplo: "usuario@email.com"',
            'password.required' => 'Debes igresar una contraseña',
            'password.min' => 'La contraseña debe tener minimo 8 carecteres'
        ];
        $validations = $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ], $messages);

        $user = User::create([
            'name' => $validations['name'],
            'email' => $validations['email'],
            'password' => Hash::make($validations['password'])
        ]);
        
        $token = Str::random(64);
        $hashToken = hash::make($token);
        if ($user) {
            UserVerification::insert([
                'idUser' => $user->id,
                'token' => $hashToken,
                'expires_at' => now()->addHours(1)
            ]);
        }

       Mail::to(env('MAIL_FROM_ADDRESS'))->send(new VerificacionUsuarioMailable($user, $hashToken));
        return redirect()->route('login')->with('success','usuario guardado correctamente, el usuario aun necesita autorizacion del administrador');
    }
}
