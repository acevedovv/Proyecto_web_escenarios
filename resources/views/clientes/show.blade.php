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
    <a href="{{ route('clientes.edit', $cliente->id_cli) }}">Editar</a>
    <form action="{{ route('clientes.destroy', $cliente->id_cli) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este cliente?');">Eliminar</button>
    </form>
</body>
</html>
