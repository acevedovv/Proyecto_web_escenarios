<!DOCTYPE html>
<html>
<head>
    <title>Editar Escenario Deportivo</title>
</head>
<body>
    <h1>Editar Escenario Deportivo</h1>
    <form action="{{ route('escenarios_deportivos.update', $escenarioDeportivo->id_esc) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre_esc">Nombre:</label>
        <input type="text" name="nombre_esc" id="nombre_esc" value="{{ $escenarioDeportivo->nombre_esc }}" required>
        <br>
        <label for="fecha_dis">Fecha de Disponibilidad:</label>
        <input type="date" name="fecha_dis" id="fecha_dis" value="{{ $escenarioDeportivo->fecha_dis->format('Y-m-d') }}" required>
        <br>
        <label for="id_fun">Funcionario:</label>
        <select name="id_fun" id="id_fun" required>
            @foreach($funcionarios as $funcionario)
                <option value="{{ $funcionario->id_fun }}" {{ $escenarioDeportivo->id_fun == $funcionario->id_fun ? 'selected' : '' }}>{{ $funcionario->nombre_fun }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('escenarios_deportivos.index') }}">Volver a la lista</a>
</body>
</html>

