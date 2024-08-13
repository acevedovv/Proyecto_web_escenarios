<!DOCTYPE html>
<html>
<head>
    <title>Lista de Escenarios Deportivos</title>
</head>
<body>
    <h1>Lista de Escenarios Deportivos</h1>
    <a href="{{ route('escenarios_deportivos.create') }}">Agregar Nuevo Escenario</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha de Disponibilidad</th>
                <th>Funcionario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($escenariosDeportivos as $escenario)
                <tr>
                    <td>{{ $escenario->id_esc }}</td>
                    <td>{{ $escenario->nombre_esc }}</td>
                    <td>{{ \Carbon\Carbon::parse($escenario->fecha_dis)->format('Y-m-d') }}</td>
                    <td>{{ $escenario->funcionario->nombre_fun }}</td>
                    <td>
                        <a href="{{ route('escenarios_deportivos.show', $escenario->id_esc) }}">Ver</a>
                        <a href="{{ route('escenarios_deportivos.edit', $escenario->id_esc) }}">Editar</a>
                        <form action="{{ route('escenarios_deportivos.destroy', $escenario->id_esc) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
