<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserVerification;
use Illuminate\Http\Request;

class AdminVerificationController extends Controller
{
    public function verify($token)
    {
        $record = UserVerification::where('token',$token)->first();
       if (!$record || $record->expires_at < now()) {
            return redirect()->route('login')->with('error','no se a verificado o token invalido');
        }
        $user = User::find($record->idUser);
        $user->email_verified_at = now();
        $user->save();

        UserVerification::where('token',$record->token)->delete();
        return redirect()->route('login')->with('success', 'Usuario verificado correctamente');
    }

}
