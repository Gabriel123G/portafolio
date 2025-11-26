<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DetallesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WhatsappController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/detalles',[DetallesController::class,'detalles'])->name('detalles');
Route::get('/whatsapp', [WhatsappController::class , 'Mensaje'])->name('WhatsApp');
Route::get('/admin',[AdminController::class , 'admin'])->name('admin'); //->middleware('auth');