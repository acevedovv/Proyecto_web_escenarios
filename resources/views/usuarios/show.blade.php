<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-4">
        <h1>Detalles del Usuario</h1>
        <p><strong>ID:</strong> {{ $user->id }}</p>
        <p><strong>Nombre:</strong> {{ $user->nombre_usu }}</p>
        <p><strong>Número:</strong> {{ $user->num_usu }}</p>
        <p><strong>Rol:</strong> {{ $user->role->nombre_rol }}</p>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Regresar</a>
    </div>
</body>
</html>
