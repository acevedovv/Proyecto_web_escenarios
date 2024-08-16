<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>
<body>
    <h1>Lista de Clientes</h1>
    <a href="{{ route('clientes.create') }}">Crear Nuevo Cliente</a>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Numero</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombre_cli }}</td>
                    <td>{{ $cliente->num_cli }}</td>
                    <td>
                        @if ($cliente->user)
                            {{ $cliente->user->nombre_usu }}
                        @else
                            Usuario no disponible
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('clientes.show', $cliente->id_cli) }}">Ver</a>
                        <a href="{{ route('clientes.edit', $cliente->id_cli) }}">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente->id_cli) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar este cliente?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
