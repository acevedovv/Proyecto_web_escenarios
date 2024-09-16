<!DOCTYPE html>
<html>
<head>
    <title>Lista de Reservas</title>
    <div class="col-md-12">
        <a href="{{ route('reservas.create') }}" class="btn btn-primary">Generate PDF</a>
    </div>
</head>
<body>
    <h1>Lista de Reservas</h1>
    <a href="{{ route('reservas.create') }}">Agregar Nueva Reserva</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha de Reserva</th>
                <th>Fecha de Devolución</th>
                <th>Usuario</th>
                <th>Escenario Deportivo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->id_res }}</td>
                    <td>{{ \Carbon\Carbon::parse($reserva->fecha_res)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($reserva->fecha_dev)->format('d/m/Y') }}</td>
                    <td>{{ $reserva->user->nombre_usu }}</td>
                    <td>{{ $reserva->escenarioDeportivo->nombre_esc }}</td>
                    <td>
                        <a href="{{ route('reservas.show', $reserva->id_res) }}">Ver</a>
                        <a href="{{ route('reservas.edit', $reserva->id_res) }}">Editar</a>
                        <form action="{{ route('reservas.destroy', $reserva->id_res) }}" method="POST" style="display:inline;">
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

