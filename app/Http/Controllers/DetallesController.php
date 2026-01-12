<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetallesController extends Controller
{
    public function detalles(){
        return view('detalles');
    }
}

//$proyecto = Project::with(['skills', 'images'])->find(1);
// Filtrar en memoria
//$skill = $proyecto->skills->where('idSkill', 2)->first();
//$image = $proyecto->images->where('idImage', 2)->first();