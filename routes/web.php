<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WhatsappController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/whatsapp', [WhatsappController::class , 'Mensaje'])->name('WhatsApp');
