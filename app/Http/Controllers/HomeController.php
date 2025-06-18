<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $proyectos = ['nombre'=>'Café Beraca', // codigo ejemplo ruta del ejemplo :https://dunks1980.com/
                      'url'=>'jhsdkfnskdf',
                      'descripcion'=>'Pagina web de venta de café entre otros alimentos relacionadas con el café'];
        return view('home', compact('proyectos'));

    }
}
