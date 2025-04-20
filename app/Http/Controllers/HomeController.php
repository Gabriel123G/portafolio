<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $proyectos = ['nombre'=>'hola', // codigo ejemplo ruta del ejemplo :https://dunks1980.com/
                      'url'=>'jhsdkfnskdf',
                      'descripcion'=>'lksdlfknsdklf'];
        return view('home', compact('proyectos'));
    }
}
