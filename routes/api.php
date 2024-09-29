<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\EscenarioDeportivoController;
use App\Http\Controllers\ReservaController;

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

Route::controller(RoleController::class)->group(function () {
    Route::get('/roles', 'index');             // Lista de roles en JSON
    Route::post('/roles', 'store');            // Crear un nuevo rol (POST)
    Route::get('/roles/{id}', 'show');         // Mostrar un rol específico en JSON
    Route::put('/roles/{id}', 'update');       // Actualizar un rol existente (PUT)
    Route::delete('/roles/{id}', 'destroy');   // Eliminar un rol (DELETE)
});

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');             // Lista de usuarios en JSON
    Route::post('/users', 'store');            // Crear un nuevo usuario (POST)
    Route::get('/users/{id}', 'show');         // Mostrar un usuario específico en JSON
    Route::put('/users/{id}', 'update');       // Actualizar un usuario existente (PUT)
    Route::delete('/users/{id}', 'destroy');   // Eliminar un usuario (DELETE)
});

Route::controller(FuncionarioController::class)->group(function () {
    Route::get('/funcionarios', 'index');             // Lista de funcionarios en JSON
    Route::post('/funcionarios', 'store');            // Crear un nuevo funcionario (POST)
    Route::get('/funcionarios/{id}', 'show');         // Mostrar un funcionario específico en JSON
    Route::put('/funcionarios/{id}', 'update');       // Actualizar un funcionario existente (PUT)
    Route::delete('/funcionarios/{id}', 'destroy');   // Eliminar un funcionario (DELETE)
});

Route::controller(EscenarioDeportivoController::class)->group(function () {
    Route::get('/escenarios_deportivos', 'index');             // Lista de escenarios deportivos en JSON
    Route::post('/escenarios_deportivos', 'store');            // Crear un nuevo escenario deportivo (POST)
    Route::get('/escenarios_deportivos/{id}', 'show');         // Mostrar un escenario deportivo específico en JSON
    Route::put('/escenarios_deportivos/{id}', 'update');       // Actualizar un escenario deportivo existente (PUT)
    Route::delete('/escenarios_deportivos/{id}', 'destroy');   // Eliminar un escenario deportivo (DELETE)
});

Route::controller(ReservaController::class)->group(function () {
    Route::get('/reservas', 'index');             // Lista de reservas en JSON
    Route::post('/reservas', 'store');            // Crear una nueva reserva (POST)
    Route::get('/reservas/{id}', 'show');         // Mostrar una reserva específica en JSON
    Route::put('/reservas/{id}', 'update');       // Actualizar una reserva existente (PUT)
    Route::delete('/reservas/{id}', 'destroy');   // Eliminar una reserva (DELETE)
});
