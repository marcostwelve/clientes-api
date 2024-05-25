<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AuthController;

Route::group(['middleware' => ['auth:sanctum', 'custom.unauthorized']], function () {

    Route::get('/clientes', [ClienteController::class, 'index']);
    Route::get('/clientes/{id}', [ClienteController::class, 'show']);
    Route::get('/clientes/razao-social/{razaoSocial}', [ClienteController::class, 'showByRazaoSocial']);
    Route::post('/clientes', [ClienteController::class, 'store']);
    Route::put('/clientes/{id}', [ClienteController::class, 'update']);
    Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
