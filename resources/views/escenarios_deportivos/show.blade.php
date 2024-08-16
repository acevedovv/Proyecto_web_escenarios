<!DOCTYPE html>
<html>
<head>
    <title>Detalle del Escenario Deportivo</title>
</head>
<body>
    <h1>Detalle del Escenario Deportivo</h1>

    <p><strong>ID:</strong> {{ $escenarioDeportivo->id_esc }}</p>
    <p><strong>Nombre:</strong> {{ $escenarioDeportivo->nombre_esc }}</p>
    <p><strong>Fecha de Disponibilidad:</strong> {{ \Carbon\Carbon::parse($escenarioDeportivo->fecha_dis)->format('Y-m-d') }}</p>
    <p><strong>Funcionario:</strong> 
        @if($escenarioDeportivo->funcionario)
            {{ $escenarioDeportivo->funcionario->nombre_fun }}
        @else
            No disponible
        @endif
    </p>

    <a href="{{ route('escenarios_deportivos.index') }}">Volver a la lista</a>
    <a href="{{ route('escenarios_deportivos.edit', $escenarioDeportivo->id_esc) }}">Editar</a>

    <form action="{{ route('escenarios_deportivos.destroy', $escenarioDeportivo->id_esc) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
</body>
</html>


