<!DOCTYPE html>
<html>
<head>
    <title>Crear Role</title>
</head>
<body>
    <h1>Crear Nuevo Role</h1>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <label for="nombre_rol">Nombre del role:</label>
        <input type="text" id="nombre_rol" name="nombre_rol" required>
        <br>
        <label for="desc_rol">Descripcion role:</label>
        <input type="text" id="desc_rol" name="desc_rol" required>
        <br>
        <button type="submit">Crear Role</button>
    </form>
    <a href="{{ route('roles.index') }}">Volver a la lista</a>
</body>
</html>

