<!DOCTYPE html>
<html>
<head>
    <title>Editar Escenario Deportivo</title>
</head>
<body>
    <h1>Editar Escenario Deportivo</h1>
    <form action="{{ route('escenarios_deportivos.update', $escenarioDeportivo->id_esc) }}" method="POST">
        @csrf
        @method('PUT') <!-- Utiliza PUT para actualizaciones -->

        <label for="nombre_esc">Nombre:</label>
        <input type="text" id="nombre_esc" name="nombre_esc" value="{{ old('nombre_esc', $escenarioDeportivo->nombre_esc) }}">

        <label for="fecha_dis">Fecha de Disponibilidad:</label>
        <input type="date" id="fecha_dis" name="fecha_dis" value="{{ old('fecha_dis', $escenarioDeportivo->fecha_dis->format('Y-m-d')) }}">

        <label for="funcionario_id">Funcionario:</label>
        <select id="funcionario_id" name="funcionario_id">
            @foreach($funcionarios as $funcionario)
                <option value="{{ $funcionario->id }}" {{ $funcionario->id == $escenarioDeportivo->funcionario_id ? 'selected' : '' }}>
                    {{ $funcionario->nombre_fun }}
                </option>
            @endforeach
        </select>

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('escenarios_deportivos.index') }}">Volver a la lista</a>
</body>
</html>


