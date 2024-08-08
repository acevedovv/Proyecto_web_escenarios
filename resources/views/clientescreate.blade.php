<!DOCTYPE html>
<html lang="en">
<head>
    <title>Crear Cliente</title>
</head>
<body>
    <h1>Crear Nuevo Cliente</h1>
    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <label for="nombre_cli">Nombre:</label>
        <input type="text" id="nombre_cli" name="nombre_cli" required>
        <br>
        <label for="num_cli">Numero:</label>
        <input type="text" id="num_cli" name="num_cli" required>
        <br>
        <label for="id_usu">Usuario:</label>
        <select id="id_usu" name="id_usu" required>
            @foreach ($users as $user)
                <option value="{{ $user->id_usu }}">{{ $user->nombre_usu }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Crear Cliente</button>
    </form>
    <a href="{{ route('clientes.index') }}">Back to List</a>
</body>
</html>
