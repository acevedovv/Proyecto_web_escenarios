<!DOCTYPE html>
<html>
<head>
    <title>Ver Funcionario</title>
</head>
<body>
    <h1>Detalles del Funcionario</h1>
    <p><strong>ID:</strong> {{ $funcionario->id_fun }}</p>
    <p><strong>Nombre:</strong> {{ $funcionario->nombre_fun }}</p>
    <p><strong>Usuario:</strong> {{ $funcionario->user->id }}</p>
    <a href="{{ route('funcionarios.index') }}">Volver a la lista</a>
</body>
</html>
