<!DOCTYPE html>
<html>
<head>
    <title>Clientes</title>
</head>
<body>
    <h1>Clientes</h1>
    <a href="{{ url('clientes.create') }}">Agregar nuevo cliente</a>
    <ul>
        @foreach ($clientes as $cliente)
            <li>
                {{ $cliente->nombre_cli }} - {{ $cliente->num_cli }} - {{ $cliente->user->nombre_usu }}
                <a href="{{ url('clientes.show', $cliente->id_cli) }}">Ver</a>
                <a href="{{ url('clientes.edit', $cliente->id_cli) }}">Editar</a>
                <form action="{{ url('clientes.destroy', $cliente->id_cli) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
