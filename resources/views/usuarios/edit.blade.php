<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-4">
        <h1>Editar Usuario</h1>
        <form action="{{ route('usuarios.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre_usu">Nombre:</label>
                <input type="text" name="nombre_usu" id="nombre_usu" class="form-control" value="{{ $user->nombre_usu }}" required>
            </div>
            <div class="form-group">
                <label for="num_usu">Número:</label>
                <input type="text" name="num_usu" id="num_usu" class="form-control" value="{{ $user->num_usu }}" required>
            </div>
            <div class="form-group">
                <label for="id_rol">Rol:</label>
                <select name="id_rol" id="id_rol" class="form-control" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id_rol }}" {{ $user->id_rol == $role->id_rol ? 'selected' : '' }}>
                            {{ $role->nombre_rol }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
        </form>
    </div>
</body>
</html>

