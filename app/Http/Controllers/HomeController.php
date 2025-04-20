<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $proyectos = ['nombre'=>'hola', // codigo ejemplo 
                      'url'=>'jhsdkfnskdf',
                      'descripcion'=>'lksdlfknsdklf'];
        return view('home', compact('proyectos'));
    }
}
