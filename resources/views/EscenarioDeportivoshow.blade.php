<!DOCTYPE html>
<html>
<head>
    <title>Detalle Cliente</title>
</head>
<body>
    <h1>Detalle Cliente</h1>
    <p>Nombre: {{ $cliente->nombre_cli }}</p>
    <p>Numero: {{ $cliente->num_cli }}</p>
    <p>Usuario: {{ $cliente->user->nombre_usu }}</p>
    <a href="{{ route('clientes.index') }}">Volver a la lista</a>
</body>
</html>
