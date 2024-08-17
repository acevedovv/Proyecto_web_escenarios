<!DOCTYPE html>
<html>
<head>
    <title>Ver Escenario Deportivo</title>
</head>
<body>
    <h1>Detalles del Escenario Deportivo</h1>
    <p><strong>ID:</strong> {{ $escenarioDeportivo->id_esc }}</p>
    <p><strong>Nombre:</strong> {{ $escenarioDeportivo->nombre_esc }}</p>
    <p><strong>Fecha de Disponibilidad:</strong> {{ $escenarioDeportivo->fecha_dis->format('d/m/Y') }}</p>
    <p><strong>Funcionario:</strong> {{ $escenarioDeportivo->funcionario->nombre_fun }}</p>

    <form action="{{ route('escenarios_deportivos.destroy', $escenarioDeportivo->id_esc) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE') <!-- Utiliza DELETE para eliminar -->
        <button type="submit">Eliminar</button>
    </form>
    <a href="{{ route('escenarios_deportivos.edit', $escenarioDeportivo->id_esc) }}">Editar</a>
    <a href="{{ route('reservas.index') }}">Volver a la lista</a>
</body>
</html>
