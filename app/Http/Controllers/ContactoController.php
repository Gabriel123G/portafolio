<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function send(Request $request){
        Mail::to(env('MAIL_FROM_ADDRESS'))->
        send(new ContactoMailable($request->all()));
        return redirect()->route('home')->with('success','correo enviado correctamente');
    }
}
