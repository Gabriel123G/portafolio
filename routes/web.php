<?php

use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/home',[homeController::class, 'call_home'])->name('home');