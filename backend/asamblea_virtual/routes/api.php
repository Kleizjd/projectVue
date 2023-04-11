<?php

use App\Http\Controllers\AsambleaController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\OpcionesController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\TemarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::apiResource('/persona', PersonaController::class)->middleware('api');  
Route::apiResource('/asamblea', AsambleaController::class)->middleware('api');  
Route::apiResource('/temario', TemarioController::class)->middleware('api');  
Route::apiResource('/formulario', FormularioController::class)->middleware('api');  
Route::apiResource('/opciones', OpcionesController::class)->middleware('api');  

