<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;

//--------------------Rutas para Clientes
Route::resource('clientes', ClienteController::class);

// Mostrar lista de clientes
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');

// Mostrar formulario para crear un nuevo cliente
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');

// Guardar un nuevo cliente
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');

// Mostrar un cliente específico
Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');

// Mostrar formulario para editar un cliente existente
Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');

// Actualizar un cliente existente
Route::post('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');

// Eliminar un cliente existente
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

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

//----------------------Rutas para Roles
Route::resource('roles', RolController::class);

// Mostrar lista de roles
Route::get('/roles', [RolController::class, 'index'])->name('roles.index');

// Mostrar formulario para crear un nuevo rol
Route::get('/roles/create', [RolController::class, 'create'])->name('roles.create');

// Guardar un nuevo rol
Route::post('/roles', [RolController::class, 'store'])->name('roles.store');

// Mostrar un rol específico
Route::get('/roles/{rol}', [RolController::class, 'show'])->name('roles.show');

// Mostrar formulario para editar un rol existente
Route::get('/roles/{rol}/edit', [RolController::class, 'edit'])->name('roles.edit');

// Actualizar un rol existente
Route::post('/roles/{rol}', [RolController::class, 'update'])->name('roles.update');

// Eliminar un rol existente
Route::delete('/roles/{rol}', [RolController::class, 'destroy'])->name('roles.destroy');
