<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function send(Request $request){
        Mail::to('gabi132002@gmail.com')->
        send(new ContactoMailable($request->all()));
        return redirect()->route('home')->with('success','correo enviado correctamente');
    }
}
