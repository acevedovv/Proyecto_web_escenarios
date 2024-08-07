<!DOCTYPE html>
<html>
<head>
    <title>Usuarios Detalles</title>
</head>
<body>
    <h1>Usuarios Detalles</h1>
    <p>Name: {{ $user->nombre_usu }}</p>
    <p>Number: {{ $user->num_usu }}</p>
    <p>Role: {{ $user->role->nombre_rol }}</p>
    <a href="{{ route('users.index') }}">Volver a la lista</a>
</body>
</html>
