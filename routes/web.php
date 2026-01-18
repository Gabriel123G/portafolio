<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DetallesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OAuthController;
use App\Http\Controllers\WhatsappController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/detalles/{idProject}',[DetallesController::class,'detalles'])->name('detalles');
Route::get('/whatsapp', [WhatsappController::class , 'Mensaje'])->name('WhatsApp');
Route::get('/admin',[AdminController::class , 'admin'])->name('admin'); //->middleware('auth');
Route::post('/admin/crear',[AdminController::class , 'crear'])->name('crear');//->middleware('auth');
Route::get('/oauth2/redirect', [OAuthController::class, 'redirect'])->name('google.redirect');
Route::get('/oauth2/callback', [OAuthController::class, 'callback'])->name('google.callback');
Route::get('/imagen/{id}', [DetallesController::class, 'actualizar'])->name('imagen.proxy');
Route::get('/login',[LoginController::class,'login'])->name('login');