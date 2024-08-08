<!DOCTYPE html>
<html>
<head>
    <title>Editar Role</title>
</head>
<body>
    <h1>Editar Role</h1>
    <form action="{{ route('roles.update', $role->id_rol) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre_rol">Nombre Role:</label>
        <input type="text" id="nombre_rol" name="nombre_rol" value="{{ $role->nombre_rol }}" required>
        <br>
        <label for="desc_rol">Descripcion Role:</label>
        <input type="text" id="desc_rol" name="desc_rol" value="{{ $role->desc_rol }}" required>
        <br>
        <button type="submit">Actualiza Role</button>
    </form>
    <a href="{{ route('roles.index') }}">Volver a la lista</a>
</body>
</html>
