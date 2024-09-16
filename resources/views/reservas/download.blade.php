<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Lista de Reservas</h1>
        <a href="{{ route('reservas.create') }}">Agregar nueva Reserva</a>
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
                            <a href="{{ route('reservas.show', $escenario->id_esc) }}">Ver</a>
                            <a href="{{ route('reservas.edit', $escenario->id_esc) }}">Editar</a>
                            <form action="{{ route('reservas.destroy', $escenario->id_esc) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>