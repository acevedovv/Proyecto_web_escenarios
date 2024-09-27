<!-- resources/views/reportes/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear un Nuevo Reporte</h2>

    <!-- Botones con información corta -->
    <div class="row">
        <!-- Botón para ver reservas -->
        <div class="col-md-6">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Generar Reporte de usuarios</div>
                <div class="card-body">
                    <h5 class="card-title">Revisa las reservas existentes</h5>
                    <p class="card-text">Consulta la lista de reservas para incluir información en el reporte.</p>
                    <a href="{{ route('descargar-usuariopdf') }}" class="btn btn-light">Crear Reporte de Usuarios</a>

                </div>
            </div>
        </div>

        <!-- Botón para generar reporte -->
        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Generar Reporte de escenarios</div>
                <div class="card-body">
                    <h5 class="card-title">Crea un nuevo reporte</h5>
                    <p class="card-text">Proporciona detalles para generar un reporte detallado.</p>
                    <a href="{{ route('descargar-pdf') }}" class="btn btn-light">Crear Reporte</a>
                </div>
            </div>
        </div>
    </div>

    


   
</div>
@endsection
