<!DOCTYPE html>
<html>
<head>
    <title>Editar Reserva</title>
</head>
<body>
    <h1>Editar Reserva</h1>
    <form action="{{ route('reservas.update', $reserva->id_res) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="fecha_res">Fecha de Reserva:</label>
        <input type="date" name="fecha_res" id="fecha_res" value="{{ $reserva->fecha_res->format('Y-m-d') }}" required>
        <br>
        <label for="fecha_dev">Fecha de Devolución:</label>
        <input type="date" name="fecha_dev" id="fecha_dev" value="{{ $reserva->fecha_dev->format('Y-m-d') }}" required>
        <br>
        <label for="user_id">Usuario:</label> <!-- Cambié "usu_id" a "user_id" -->
        <select name="user_id" id="user_id" required> <!-- Cambié "usu_id" a "user_id" -->
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $reserva->user_id == $user->id ? 'selected' : '' }}>
                    {{ $user->nombre_usu }}
                </option>
            @endforeach
        </select>
        <br>
        <label for="id_esc">Escenario Deportivo:</label>
        <select name="id_esc" id="id_esc" required>
            @foreach($escenariosDeportivos as $escenario)
                <option value="{{ $escenario->id_esc }}" {{ $reserva->id_esc == $escenario->id_esc ? 'selected' : '' }}>
                    {{ $escenario->nombre_esc }}
                </option>
            @endforeach
        </select>
        <br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('reservas.index') }}">Volver a la lista</a>
</body>
</html>
