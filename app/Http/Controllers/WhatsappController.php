<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WhatsappController extends Controller
{
    public function mensaje(){
        $numero = '62902893';
        return Redirect::to("https://wa.me/$numero");
    }
}
