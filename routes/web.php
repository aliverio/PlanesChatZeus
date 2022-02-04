<?php

use App\Http\Livewire\Cuentas\Cuenta;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuentaController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('cuentas', App\Http\Controllers\CuentaController::class)->middleware('auth');
//Route Hooks - Do not delete//
Route::view('cuentass', 'livewire.cuentas.index')->middleware('auth');
Route::view('cuenta/{id}', 'livewire.cuentas.index_update')->middleware('auth');
Route::get('/cuentax/{id}', Cuenta::class);

Route::view('licencia-opciones', 'livewire.opciones.index')->middleware('auth');
Route::view('licencia-planes', 'livewire.planes.index')->middleware('auth');
Route::view('planes-opciones', 'livewire.planesopciones.index')->middleware('auth');

Route::view('licencia-periodos', 'livewire.periodos.index')->middleware('auth');