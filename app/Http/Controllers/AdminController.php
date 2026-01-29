<?php

namespace App\Http\Controllers;

use App\Models\ImageUrl;
use App\Models\Project;
use App\Models\Skill;
use App\Services\ImagesServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin(ImagesServices $refreshToken)
    {
        if (!Auth::user()->refresh_token) {
            return redirect()->route('google.redirect')
                ->with('error', 'Debes autorizar Google Drive primero.');
        } else {
            $refreshToken->refreshToken();
            $project = Project::with(['skills', 'images_urls'])->get();
            return view('admin', compact('project'));
        }
    }
    
    public function crear(Request $request, ImagesServices $drive)
    {
        // Validar proyecto
        $messages = [
            'name.required' => 'El nombre es obligatorio.',
            'details.required' => 'Los detalles son obligatorios',
            'nombre-h1' => 'el dombre de habilidad es obligatorio',
            'nombre-h2' => 'el dombre de habilidad es obligatorio',
            'nombre-h3' => 'el dombre de habilidad es obligatorio',
            'nombre-h4' => 'el dombre de habilidad es obligatorio',
            'descripcion-h1' => 'descripcion de habilidad 1 es obligatorio y no debe superar los 200 caracteres',
            'descripcion-h2' => 'descripcion de habilidad 2 es obligatorio y no debe superar los 200 caracteres',
            'descripcion-h3' => 'descripcion de habilidad 3 es obligatorio y no debe superar los 200 caracteres',
            'descripcion-h4' => 'descripcion de habilidad 4 es obligatorio  y no debe superar los 200 caracteres',
        ];
        $validaciones = $request->validate([
            'name' => 'required|string|max:20',
            'details' => 'required|string|max:250',
            'nombre-h1' => 'required|string|max:20',
            'nombre-h2' => 'required|string|max:20',
            'nombre-h3' => 'required|string|max:20',
            'nombre-h4' => 'required|string|max:20',
            'descripcion-h1' => 'required|string|max:200',
            'descripcion-h2' => 'required|string|max:200',
            'descripcion-h3' => 'required|string|max:200',
            'descripcion-h4' => 'required|string|max:200',
        ], $messages);


        $request->validate([
            'images'   => 'required|array|size:6',
            'images.*' => 'image|mimes:jpg,png|max:5120'
        ]);

        $token = session('google_token');
        $drive->setAccessToken($token);

        $project = Project::create([
            'name' => $validaciones['name'],
            'details' => $validaciones['details'],
            'github' => $request->github,
            'web' => $request->web
        ]);

        for ($i = 0; $i <= 3; $i++) {
            Skill::create([
                'idProject' => $project->idProject,
                'skill' => $validaciones['nombre-h' . $i + 1],
                'details' => $validaciones['descripcion-h' . $i + 1],
            ]);
        }

        foreach ($request->file('images') as $uploadedFile) {
            $path = $uploadedFile->getRealPath();
            $fileName = $uploadedFile->getClientOriginalName();

            // Subir a Google Drive
            $url = $drive->uploadFile($path, $fileName);
            $query = parse_url($url, PHP_URL_QUERY);
            parse_str($query, $params);

            // Guardar URL en la base de datos
            ImageUrl::create([
                'idProject' => $project->idProject,
                'url' => $params['id']
            ]);
        }

        return redirect()->route('admin')->with('success', 'Proyecto creado y archivo subido');
    }
    public function editar(Request $request)
    {
        $messages = [
            'idProject.required' => 'debe seleccionar un proyecto para editar',
            'name.required' => 'El nombre es obligatorio.',
            'details.required' => 'Los detalles son obligatorios',
            'nombre-h1' => 'el dombre de habilidad es obligatorio',
            'nombre-h2' => 'el dombre de habilidad es obligatorio',
            'nombre-h3' => 'el dombre de habilidad es obligatorio',
            'nombre-h4' => 'el dombre de habilidad es obligatorio',
            'descripcion-h1' => 'descripcion de habilidad 1 es obligatorio y no debe superar los 200 caracteres',
            'descripcion-h2' => 'descripcion de habilidad 2 es obligatorio y no debe superar los 200 caracteres',
            'descripcion-h3' => 'descripcion de habilidad 3 es obligatorio y no debe superar los 200 caracteres',
            'descripcion-h4' => 'descripcion de habilidad 4 es obligatorio y no debe superar los 200 caracteres',
        ];
        $validaciones = $request->validate([
            'idProject' => 'required|string',
            'name' => 'required|string|max:20',
            'details' => 'required|string|max:250',
            'nombre-h1' => 'required|string|max:20',
            'nombre-h2' => 'required|string|max:20',
            'nombre-h3' => 'required|string|max:20',
            'nombre-h4' => 'required|string|max:20',
            'descripcion-h1' => 'required|string|max:250',
            'descripcion-h2' => 'required|string|max:250',
            'descripcion-h3' => 'required|string|max:250',
            'descripcion-h4' => 'required|string|max:250',
        ], $messages);

        $proyecto = Project::with(['skills'])->find($request->idProject);
        $proyecto->update($validaciones);
        foreach ($proyecto->skills as $i => $skill) {
            $skill->update([
                'skill' => $validaciones['nombre-h' . $i + 1],
                'details' => $validaciones['descripcion-h' . $i + 1],
            ]);
        }


        return redirect()->route('admin');
    }
    public function eliminar(Request $request)
    {
        $proyecto = Project::with(['images_urls'])->find($request->input('proyecto'));
        $token = session('google_token');
        $imageService = new ImagesServices();
        $imageService->setAccessToken($token);

        foreach ($proyecto->images_urls as $image) {
            $imageService->deleteFile($image->url);
            $image->delete();
        }
        $proyecto->delete();
        return redirect()->route('admin');
    }
}
