<?php

namespace App\Http\Controllers;

use App\Models\ImageUrl;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $proyectos = Project::with(['images_urls'])->get();
        return view('home', compact('proyectos'));

    }
}
