<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Escenario Deportivo</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-4">
        <h1>Editar Escenario Deportivo</h1>
        <form action="{{ route('escenarios_deportivos.update', $escenarioDeportivo->id_esc) }}" method="POST">
            @csrf
            @method('PUT') <!-- Utiliza PUT para actualizaciones -->

            <div class="mb-3">
                <label for="nombre_esc" class="form-label">Nombre:</label>
                <input type="text" id="nombre_esc" name="nombre_esc" class="form-control" value="{{ old('nombre_esc', $escenarioDeportivo->nombre_esc) }}">
            </div>

            <div class="mb-3">
                <label for="fecha_dis" class="form-label">Fecha de Disponibilidad:</label>
                <input type="date" id="fecha_dis" name="fecha_dis" class="form-control" value="{{ old('fecha_dis', $escenarioDeportivo->fecha_dis->format('Y-m-d')) }}">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>

        <a href="{{ route('escenarios_deportivos.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
    </div>
</body>
</html>
