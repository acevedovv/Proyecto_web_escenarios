<!DOCTYPE html>
<html>
<head>
    <title>Agregar Reserva</title>
</head>
<body>
    <h1>Agregar Reserva</h1>
    <form action="{{ route('reservas.store') }}" method="POST">
        @csrf
        <label for="fecha_res">Fecha de Reserva:</label>
        <input type="date" name="fecha_res" id="fecha_res" required>
        <br>
        <label for="fecha_dev">Fecha de Devolución:</label>
        <input type="date" name="fecha_dev" id="fecha_dev" required>
        <br>
        <label for="id_cli">Usuario:</label>
        <select name="id_cli" id="id_cli" required>
            @foreach($users as $user)
                <option value="{{ $user->id  }}">{{ $user->nombre_usu }}</option>
            @endforeach
        </select>
        <br>
        <label for="id_esc">Escenario Deportivo:</label>
        <select name="id_esc" id="id_esc" required>
            @foreach($escenariosDeportivos as $escenario)
                <option value="{{ $escenario->id_esc }}">{{ $escenario->nombre_esc }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Guardar</button>
    </form>
    <a href="{{ route('reservas.index') }}">Volver a la lista</a>
</body>
</html>
