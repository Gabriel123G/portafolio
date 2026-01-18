<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Http;


class DetallesController extends Controller
{
    public function detalles($idProject){
        $project = Project::with(['skills', 'images_urls'])->find($idProject);
        return view('detalles', compact('project'));
    }

     public function actualizar($id)
    {
        $url = "https://drive.google.com/uc?export=download&id={$id}";
        $response = Http::get($url);

        // Detecta tipo de archivo si quieres hacerlo dinámico
        $contentType = $response->header('Content-Type') ?? 'image/jpeg';

        return response($response->body(), 200)
            ->header('Content-Type', $contentType)
            ->header('Content-Disposition', 'inline');
    }

}

//$proyecto = Project::with(['skills', 'images'])->find(1);
// Filtrar en memoria
//$skill = $proyecto->skills->where('idSkill', 2)->first();
//$image = $proyecto->images->where('idImage', 2)->first();