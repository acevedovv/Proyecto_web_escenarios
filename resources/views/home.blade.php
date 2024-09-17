@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>{{ __('Bienvenido a tu Panel de Control') }}</h4>
                    <p>{{ __('Aquí puedes gestionar roles, usuarios, escenarios deportivos y reservas.') }}</p>

                    <div class="row">
                        <!-- Roles Section -->
                        <div class="col-md-3">
                            <div class="card text-white bg-info mb-3">
                                <div class="card-header">Roles</div>
                                <div class="card-body">
                                    <h5 class="card-title">Gestionar Roles</h5>
                                    <p class="card-text">Ver, crear, editar o eliminar roles.</p>
                                    <a href="{{ route('roles.index') }}" class="btn btn-light">Ir a Roles</a>
                                </div>
                            </div>
                        </div>

                        <!-- Usuarios Section -->
                        <div class="col-md-3">
                            <div class="card text-white bg-success mb-3">
                                <div class="card-header">Usuarios</div>
                                <div class="card-body">
                                    <h5 class="card-title">Gestionar Usuarios</h5>
                                    <p class="card-text">Ver, crear, editar o eliminar usuarios.</p>
                                    <a href="{{ route('usuarios.index') }}" class="btn btn-light">Ir a Usuarios</a>
                                </div>
                            </div>
                        </div>

                        <!-- Funcionarios Section -->
                        <div class="col-md-3">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-header">Funcionarios</div>
                                <div class="card-body">
                                    <h5 class="card-title">Gestionar Funcionarios</h5>
                                    <p class="card-text">Ver, crear, editar o eliminar funcionarios.</p>
                                    <a href="{{ route('funcionarios.index') }}" class="btn btn-light">Ir a Funcionarios</a>
                                </div>
                            </div>
                        </div>

                        <!-- Escenarios Deportivos Section -->
                        <div class="col-md-3">
                            <div class="card text-white bg-warning mb-3">
                                <div class="card-header">Escenarios Deportivos</div>
                                <div class="card-body">
                                    <h5 class="card-title">Gestionar Escenarios</h5>
                                    <p class="card-text">Ver, crear, editar o eliminar escenarios deportivos.</p>
                                    <a href="{{ route('escenarios_deportivos.index') }}" class="btn btn-light">Ir a Escenarios</a>
                                </div>
                            </div>
                        </div>

                        <!-- Reservas Section -->
                        <div class="row">
                        <!-- Reservas Section -->
                        <div class="col-md-3">
                            <div class="card text-white bg-danger mb-3">
                                <div class="card-header">Reservas</div>
                                <div class="card-body">
                                    <h5 class="card-title">Gestionar Reservas</h5>
                                    <p class="card-text">Ver, crear, editar o eliminar reservas.</p>
                                    <a href="{{ route('reservas.index') }}" class="btn btn-light">Ir a Reservas</a>
                                </div>
                            </div>
                        </div>

                        <!-- Reportes Section -->
                        <div class="col-md-3">
                            <div class="card text-white bg-secondary mb-3">
                                <div class="card-header">Reportes</div>
                                <div class="card-body">
                                    <h5 class="card-title">Gestionar Reportes</h5>
                                    <p class="card-text">Crear reportes.</p>
                                    <a href="{{ route('reportes.create') }}" class="btn btn-light">Ir a Reportes</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                    

                   

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
