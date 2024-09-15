<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\EscenarioDeportivoController;
use App\Http\Controllers\ReservaController;


Route::get('/', function () {
    return view('welcome');
});



//----------------------Rutas para Roles
Route::resource('roles', RoleController::class);

// Mostrar lista de roles
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');

// Mostrar formulario para crear un nuevo rol
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');

// Guardar un nuevo rol
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');

// Mostrar un rol específico
Route::get('/roles/{rol}', [RoleController::class, 'show'])->name('roles.show');

// Mostrar formulario para editar un rol existente
Route::get('/roles/{rol}/edit', [RoleController::class, 'edit'])->name('roles.edit');

// Actualizar un rol existente
Route::post('/roles/{rol}', [RoleController::class, 'update'])->name('roles.update');

// Eliminar un rol existente
Route::delete('/roles/{rol}', [RoleController::class, 'destroy'])->name('roles.destroy');

//---------------------- Rutas para Usuarios
Route::resource('usuarios', UserController::class);

// Mostrar lista de usuarios
Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');

// Mostrar formulario para crear un nuevo usuario
Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');

// Guardar un nuevo usuario
Route::post('/usuarios', [UserController::class, 'store'])->name('usuarios.store');

// Mostrar un usuario específico
Route::get('/usuarios/{usuario}', [UserController::class, 'show'])->name('usuarios.show');

// Mostrar formulario para editar un usuario existente
Route::get('/usuarios/{usuario}/edit', [UserController::class, 'edit'])->name('usuarios.edit');

// Actualizar un usuario existente
Route::post('/usuarios/{usuario}', [UserController::class, 'update'])->name('usuarios.update');

// Eliminar un usuario existente
Route::delete('/usuarios/{usuario}', [UserController::class, 'destroy'])->name('usuarios.destroy');

//----------------------Rutas para Funcionarios

Route::resource('funcionarios', FuncionarioController::class);

// Mostrar lista de roles
Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name('funcionarios.index');

// Mostrar formulario para crear un nuevo funcionario
Route::get('/funcionarios/create', [FuncionarioController::class, 'create'])->name('funcionarios.create');

// Guardar un nuevo funcionario
Route::post('/funcionarios', [FuncionarioController::class, 'store'])->name('funcionarios.store');

//Mostar un funcionario específico
Route::get('/funcionarios/{funcionario}', [FuncionarioController::class, 'show'])->name('funcionarios.show');

// Mostrar formulario para editar un funcionario existente
Route::get('/funcionarios/{funcionario}/edit', [FuncionarioController::class, 'edit'])->name('funcionarios.edit');

// Actualizar un funcionario existente
Route::post('/funcionarios/{funcionario}', [FuncionarioController::class, 'update'])->name('funcionarios.update');

// Eliminar un funcionario existente
Route::delete('/funcionarios/{funcionario}', [FuncionarioController::class, 'destroy'])->name('funcionarios.destroy');

//----------------------Rutas para Escenarios Deportivos

Route::get('/escenarios_deportivos/info', function () {
    return view('escenarios_deportivos.info');
})->name('escenarios_deportivos/info');

Route::get('/escenarios_deportivos/precios', function () {
    return view('escenarios_deportivos.precios');
})->name('escenarios_deportivos/precios');

Route::get('/escenarios_deportivos/contactanos', function () {
    return view('escenarios_deportivos.contactanos');
})->name('escenarios_deportivos/contactanos');


Route::resource('escenarios_deportivos', EscenarioDeportivoController::class);

// Mostrar lista de escenarios deportivos
Route::get('/escenarios_deportivos', [EscenarioDeportivoController::class, 'index'])->name('escenarios_deportivos.index');

// Mostrar formulario para crear un nuevo escenario deportivo
Route::get('/escenarios_deportivos/create', [EscenarioDeportivoController::class, 'create'])->name('escenarios_deportivos.create');

// Guardar un nuevo escenario deportivo
Route::post('/escenarios_deportivos', [EscenarioDeportivoController::class, 'store'])->name('escenarios_deportivos.store');

// Mostrar un escenario deportivo específico
Route::get('/escenarios_deportivos/{escenarioDeportivo}', [EscenarioDeportivoController::class, 'show'])->name('escenarios_deportivos.show');

// Mostrar formulario para editar un escenario deportivo existente
Route::get('/escenarios_deportivos/{escenarioDeportivo}/edit', [EscenarioDeportivoController::class, 'edit'])->name('escenarios_deportivos.edit');

// Actualizar un escenario deportivo existente
Route::post('/escenarios_deportivos/{escenarioDeportivo}', [EscenarioDeportivoController::class, 'update'])->name('escenarios_deportivos.update');

// Eliminar un escenario deportivo existente
Route::delete('/escenarios_deportivos/{escenarioDeportivo}', [EscenarioDeportivoController::class, 'destroy'])->name('escenarios_deportivos.destroy');

//----------------------Rutas para Reservas

Route::resource('reservas', ReservaController::class);

// Mostrar lista de reservas
Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');

// Mostrar formulario para crear una nueva reserva
Route::get('/reservas/create', [ReservaController::class, 'create'])->name('reservas.create');

// Guardar una nueva reserva
Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');

// Mostrar una reserva específica
Route::get('/reservas/{reserva}', [ReservaController::class, 'show'])->name('reservas.show');

// Mostrar formulario para editar una reserva existente
Route::get('/reservas/{reserva}/edit', [ReservaController::class, 'edit'])->name('reservas.edit');

// Actualizar una reserva existente
Route::post('/reservas/{reserva}', [ReservaController::class, 'update'])->name('reservas.update');

// Eliminar una reserva existente
Route::delete('/reservas/{reserva}', [ReservaController::class, 'destroy'])->name('reservas.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
