<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\Http;


class DetallesController extends Controller
{
    public function detalles($idProject)
    {
        $project = Project::with(['skills', 'images_urls'])->find($idProject);
        return view('detalles', compact('project'));
    }

    public function actualizar($id)
    {
        $url = "https://drive.google.com/uc?export=download&id={$id}";
        $response = Http::get($url);

        // Detecta tipo de archivo si quieres hacerlo dinámico
        $contentType = $response->header('Content-Type') ?? 'image/jpeg';
        $etag = md5($response->body());
        if (request()->header('If-None-Match') === $etag) {
            return response('', 304)
                ->header('ETag', $etag);
        }

        return response($response->body(), 200)
            ->header('Content-Type', $contentType)
            ->header('Content-Disposition', 'inline')
            ->header('Cache-Control', 'public, max-age=3600') 
            ->header('ETag', md5($etag));
    }
}
