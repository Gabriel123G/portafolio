<?php

namespace App\Http\Controllers;

use App\Models\ImageUrl;
use App\Models\Project;
use App\Models\Skill;
use App\Services\ImagesServices;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $token = session('google_token');
        if (!$token) {
            return redirect()->route('google.redirect')
                ->with('error', 'Debes autorizar Google Drive primero.');
        }
        return view('admin');
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
            'descripcion-h1' => 'descripcion de habilidad 1 es obligatorio',
            'descripcion-h2' => 'descripcion de habilidad 2 es obligatorio',
            'descripcion-h3' => 'descripcion de habilidad 3 es obligatorio',
            'descripcion-h4' => 'descripcion de habilidad 4 es obligatorio ',
        ];
        $validaciones = $request->validate([
            'name' => 'required|string|max:20',
            'details' => 'required|string|max:50',
            'nombre-h1' => 'required|string|max:20',
            'nombre-h2' => 'required|string|max:20',
            'nombre-h3' => 'required|string|max:20',
            'nombre-h4' => 'required|string|max:20',
            'descripcion-h1' => 'required|string|max:100',
            'descripcion-h2' => 'required|string|max:100',
            'descripcion-h3' => 'required|string|max:100',
            'descripcion-h4' => 'required|string|max:100',
        ], $messages);

        // Validar imágenes (ajusta size según lo que quieras)
        $request->validate([
            'images'   => 'required|array|size:6',
            'images.*' => 'image|mimes:jpg,png|max:5120'
        ]);

        // Recuperar token de sesión
        $token = session('google_token');
        $drive->setAccessToken($token);

        $project = Project::create([
            'name' => $validaciones['name'],
            'details' => $validaciones['details'],
        ]);

        for($i = 0; $i<=3;$i++){
        Skill::create([
            'idProject' => $project->idProject,
            'skill' => $validaciones['nombre-h'.$i+1],
            'details' => $validaciones['descripcion-h'.$i+1],
        ]);
        }

        foreach ($request->file('images') as $uploadedFile) {
            $path = $uploadedFile->getRealPath();
            $fileName = $uploadedFile->getClientOriginalName();

            // Subir a Google Drive
            $url = $drive->uploadFile($path, $fileName);

            // Guardar URL en la base de datos
            ImageUrl::create([
                'idProject' => $project->idProject,
                'url' => $url
            ]);
        }

        return redirect()->route('admin')->with('success', 'Proyecto creado y archivo subido');
    }
    public function editar(Request $request) {}
    public function eliminar(Request $request) {}
}
