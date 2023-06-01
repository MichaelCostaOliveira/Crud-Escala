<?php

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

Route::prefix('v1')->group(function (){
    Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::middleware('auth:api')->group(function () {
        Route::get('colaborador',[App\Http\Controllers\Api\ColaboradorController::class, 'index']);
        Route::post('colaborador/store',[App\Http\Controllers\Api\ColaboradorController::class, 'store']);
        Route::get('colaborador/show/{id}',[App\Http\Controllers\Api\ColaboradorController::class, 'show']);
        Route::put('colaborador/update/{id}',[App\Http\Controllers\Api\ColaboradorController::class, 'update']);
        Route::delete('colaborador/delete/{id}',[App\Http\Controllers\Api\ColaboradorController::class, 'destroy']);
        Route::post('colaborador/restore/{id}', [App\Http\Controllers\Api\ColaboradorController::class, 'restore']);

        Route::get('escala-trabalho',[App\Http\Controllers\Api\EscalaTrabalhoController::class, 'index']);
        Route::post('escala-trabalho/store',[App\Http\Controllers\Api\EscalaTrabalhoController::class, 'store']);
        Route::get('escala-trabalho/show/{id}',[App\Http\Controllers\Api\EscalaTrabalhoController::class, 'show']);
        Route::put('escala-trabalho/update/{id}',[App\Http\Controllers\Api\EscalaTrabalhoController::class, 'update']);
        Route::delete('escala-trabalho/delete/{id}',[App\Http\Controllers\Api\EscalaTrabalhoController::class, 'destroy']);
        Route::post('escala-trabalho/restore/{id}', [App\Http\Controllers\Api\EscalaTrabalhoController::class, 'restore']);
        Route::post('escala-trabalho/restore/{id}', [App\Http\Controllers\Api\EscalaTrabalhoController::class, 'restore']);
    });
});
