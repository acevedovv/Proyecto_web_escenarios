<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EscenarioDeportivoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Estas son las rutas API para interactuar con los escenarios deportivos.
|
*/

Route::controller(EscenarioDeportivoController::class)->group(function () {
    Route::get('/escenarios_deportivos', 'index');             // Lista de escenarios deportivos en JSON
    Route::post('/escenarios_deportivos', 'store');            // Crear un nuevo escenario deportivo (POST)
    Route::get('/escenarios_deportivos/{id}', 'show');         // Mostrar un escenario deportivo específico en JSON
    Route::put('/escenarios_deportivos/{id}', 'update');       // Actualizar un escenario deportivo existente (PUT)
    Route::delete('/escenarios_deportivos/{id}', 'destroy');   // Eliminar un escenario deportivo (DELETE)
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

