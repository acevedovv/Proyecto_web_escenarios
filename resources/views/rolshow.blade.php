<!DOCTYPE html>
<html>
<head>
    <title>Detalles Role</title>
</head>
<body>
    <h1>Detalles Role</h1>
    <p>Name: {{ $role->nombre_rol }}</p>
    <p>Description: {{ $role->desc_rol }}</p>
    <a href="{{ route('roles.index') }}">Volver a la lista</a>
</body>
</html>
