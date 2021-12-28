<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route Hooks - Do not delete//
Route::view('cuentas', 'livewire.cuentas.index')->middleware('auth');
Route::view('opciones', 'livewire.opciones.index')->middleware('auth');
Route::view('planes', 'livewire.planes.index')->middleware('auth');
Route::view('planesopciones', 'livewire.planesopciones.index')->middleware('auth');