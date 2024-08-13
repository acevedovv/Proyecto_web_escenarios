<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="{{ route('users.update', $user->id_usu) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre_usu">Nombre:</label>
        <input type="text" id="nombre_usu" name="nombre_usu" value="{{ $user->nombre_usu }}" required>
        <br>
        <label for="num_usu">Numero:</label>
        <input type="text" id="num_usu" name="num_usu" value="{{ $user->num_usu }}" required>
        <br>
        <label for="id_rol">Role:</label>
        <select id="id_rol" name="id_rol" required>
            @foreach ($roles as $role)
                <option value="{{ $role->id_rol }}" {{ $user->id_rol == $role->id_rol ? 'selected' : '' }}>
                    {{ $role->nombre_rol }}
                </option>
            @endforeach
        </select>
        <br>
        <button type="submit">Actualizar Usuario</button>
    </form>
    <a href="{{ route('users.index') }}">Volver a la lista</a>
</body>
</html>

