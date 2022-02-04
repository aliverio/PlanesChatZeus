<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiChatZeusController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('detalle-cuenta-plan',[ApiChatZeusController::class, 'DetalleCuentaPlan']);
Route::get('permiso-cuenta-canal',[ApiChatZeusController::class, 'PermisoCuentaCanal']);
Route::get('permiso-agregar-agente',[ApiChatZeusController::class, 'PermisoAgregarAgente']);
Route::get('permiso-canal',[ApiChatZeusController::class, 'PermisoCanal']);
Route::get('verifica-licencia',[ApiChatZeusController::class, 'VerificaLicencia']);

