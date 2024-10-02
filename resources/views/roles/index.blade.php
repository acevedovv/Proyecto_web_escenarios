<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Roles</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-4">
        <h1>Lista de Roles</h1>
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Agregar Nuevo Rol</a>
        <ul class="list-group">
            @foreach ($roles as $role)
                <li class="list-group-item">
                    {{ $role->nombre_rol }} - {{ $role->desc_rol }}
                    <div class="float-end">
                        <a href="{{ route('roles.show', $role->id_rol) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('roles.edit', $role->id_rol) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('roles.destroy', $role->id_rol) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este rol?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
