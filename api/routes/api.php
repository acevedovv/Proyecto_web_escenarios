<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EscenarioDeportivoController;
use App\Http\Controllers\FuncionarioController;

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

Route::controller(EscenarioDeportivoController::class)->group(function () {
    Route::get('/escenarios_deportivos', 'index');             // Lista de escenarios deportivos en JSON
    Route::post('/escenarios_deportivos', 'store');            // Crear un nuevo escenario deportivo (POST)
    Route::get('/escenarios_deportivos/{id}', 'show');         // Mostrar un escenario deportivo específico en JSON
    Route::put('/escenarios_deportivos/{id}', 'update');       // Actualizar un escenario deportivo existente (PUT)
    Route::delete('/escenarios_deportivos/{id}', 'destroy');   // Eliminar un escenario deportivo (DELETE)
});

Route::controller(FuncionarioController::class)->group(function () {
    Route::get('/funcionarios', 'index');             // Lista de funcionarios en JSON
    Route::post('/funcionarios', 'store');            // Crear un nuevo funcionario (POST)
    Route::get('/funcionarios/{id}', 'show');         // Mostrar un funcionario específico en JSON
    Route::put('/funcionarios/{id}', 'update');       // Actualizar un funcionario existente (PUT)
    Route::delete('/funcionarios/{id}', 'destroy');   // Eliminar un funcionario (DELETE)
});

