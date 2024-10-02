<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Estas son las rutas API para interactuar con los escenarios deportivos.
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas para el controlador RoleController
Route::controller(RoleController::class)->group(function () {
    Route::get('/roles', 'index');             // Lista de roles en JSON
    Route::post('/roles', 'store');            // Crear un nuevo rol (POST)
    Route::get('/roles/{id}', 'show');         // Mostrar un rol específico en JSON
    Route::put('/roles/{id}', 'update');       // Actualizar un rol existente (PUT)
    Route::delete('/roles/{id}', 'destroy');   // Eliminar un rol (DELETE)
});
