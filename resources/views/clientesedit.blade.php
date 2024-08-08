<!DOCTYPE html>
<html>
<head>
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar Cliente</h1>
    <form action="{{ route('clientes.update', $cliente->id_cli) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre_cli">Nombre:</label>
        <input type="text" id="nombre_cli" name="nombre_cli" value="{{ $cliente->nombre_cli }}" required>
        <br>
        <label for="num_cli">Numero:</label>
        <input type="text" id="num_cli" name="num_cli" value="{{ $cliente->num_cli }}" required>
        <br>
        <label for="id_usu">Usuario:</label>
        <select id="id_usu" name="id_usu" required>
            @foreach ($users as $user)
                <option value="{{ $user->id_usu }}" {{ $cliente->id_usu == $user->id_usu ? 'selected' : '' }}>
                    {{ $user->nombre_usu }}
                </option>
            @endforeach
        </select>
        <br>
        <button type="submit">Actualizar Cliente</button>
    </form>
    <a href="{{ route('clientes.index') }}">Volver a la lista</a>
</body>
</html>
