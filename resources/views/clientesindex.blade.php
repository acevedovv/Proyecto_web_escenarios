<!DOCTYPE html>
<html>
<head>
    <title>Clientes</title>
</head>
<body>
    <h1>Clientes</h1>
    <a href="{{ route('clientes.create') }}">Agregar nuevo cliente</a>
    <ul>
        @foreach ($clientes as $cliente)
            <li>
                {{ $cliente->nombre_cli }} - {{ $cliente->num_cli }} - {{ $cliente->user->nombre_usu }}
                <a href="{{ route('clientes.show', $cliente->id_cli) }}">Ver</a>
                <a href="{{ route('clientes.edit', $cliente->id_cli) }}">Editar</a>
                <form action="{{ route('clientes.destroy', $cliente->id_cli) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
