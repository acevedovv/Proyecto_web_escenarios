<!DOCTYPE html>
<html>
<head>
    <title>Agregar Escenario Deportivo</title>
</head>
<body>
    <h1>Agregar Escenario Deportivo</h1>
    <form action="{{ route('escenarios_deportivos.store') }}" method="POST">
        @csrf
        <label for="nombre_esc">Nombre:</label>
        <input type="text" name="nombre_esc" id="nombre_esc" required>
        <br>
        <label for="fecha_dis">Fecha de Disponibilidad:</label>
        <input type="date" name="fecha_dis" id="fecha_dis" required>
        <br>
        <label for="id_fun">Funcionario:</label>
        <select name="id_fun" id="id_fun" required>
            @foreach($funcionarios as $funcionario)
                <option value="{{ $funcionario->id_fun }}">{{ $funcionario->nombre_fun }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Guardar</button>
    </form>
    <a href="{{ route('escenarios_deportivos.index') }}">Volver a la lista</a>
</body>
</html>
