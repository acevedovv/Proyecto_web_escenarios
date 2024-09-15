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
                    </div>

                    <hr>

                    <h4>Últimos Escenarios Deportivos Registrados</h4>
                    <!-- Aquí podrías mostrar una tabla con datos -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Ubicación</th>
                                <th>Capacidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($escenarios as $escenario)
                                <tr>
                                    <td>{{ $escenario->nombre }}</td>
                                    <td>{{ $escenario->ubicacion }}</td>
                                    <td>{{ $escenario->capacidad }}</td>
                                    <td>
                                        <a href="{{ route('escenarios_deportivos.show', $escenario->id) }}" class="btn btn-sm btn-primary">Ver</a>
                                        <a href="{{ route('escenarios_deportivos.edit', $escenario->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('escenarios_deportivos.destroy', $escenario->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
