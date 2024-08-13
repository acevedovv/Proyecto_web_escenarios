<!DOCTYPE html>
<html>
<head>
    <title>Ver Reserva</title>
</head>
<body>
    <h1>Detalles de la Reserva</h1>
    <p><strong>ID:</strong> {{ $reserva->id_res }}</p>
    <p><strong>Fecha de Reserva:</strong> {{ $reserva->fecha_res->format('d/m/Y') }}</p>
    <p><strong>Fecha de Devolución:</strong> {{ $reserva->fecha_dev->format('d/m/Y') }}</p>
    <p><strong>Cliente:</strong> {{ $reserva->cliente->nombre_cli }}</p>
    <p><strong>Escenario Deportivo:</strong> {{ $reserva->escenarioDeportivo->nombre_esc }}</p>
    <a href="{{ route('reservas.index') }}">Volver a la lista</a>
</body>
</html>
