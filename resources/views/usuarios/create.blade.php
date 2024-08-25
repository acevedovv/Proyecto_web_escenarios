<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-4">
        <h1>Crear Usuario</h1>
        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre_usu">Nombre:</label>
                <input type="text" name="nombre_usu" id="nombre_usu" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="num_usu">Número:</label>
                <input type="text" name="num_usu" id="num_usu" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="id_rol">Rol:</label>
                <select name="id_rol" id="id_rol" class="form-control" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id_rol }}">{{ $role->nombre_rol }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Crear Usuario</button>
        </form>
    </div>
</body>
</html>



