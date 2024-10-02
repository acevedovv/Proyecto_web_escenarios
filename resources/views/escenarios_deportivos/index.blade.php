<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Escenarios Deportivos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-4">
        <h1>Lista de Escenarios Deportivos</h1>
        <a href="{{ route('escenarios_deportivos.create') }}" class="btn btn-primary mb-3">Agregar Nuevo Escenario</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fecha de Disponibilidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($escenariosDeportivos as $escenario)
                    <tr>
                        <td>{{ $escenario->id_esc }}</td>
                        <td>{{ $escenario->nombre_esc }}</td>
                        <td>{{ \Carbon\Carbon::parse($escenario->fecha_dis)->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('escenarios_deportivos.show', $escenario->id_esc) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('escenarios_deportivos.edit', $escenario->id_esc) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('escenarios_deportivos.destroy', $escenario->id_esc) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
