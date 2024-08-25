<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-4">
        <h1>Usuarios</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary mb-3">Crear Usuario</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Número</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nombre_usu }}</td>
                        <td>{{ $user->num_usu }}</td>
                        <td>{{ $user->role->nombre_rol }}</td>
                        <td>
                            <a href="{{ route('usuarios.show', $user->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
