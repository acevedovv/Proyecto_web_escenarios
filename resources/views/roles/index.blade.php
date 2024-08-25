<!DOCTYPE html>
<html>
<head>
    <title>Roles</title>
</head>
<body>
    <h1>Roles</h1>
    <a href="{{ route('roles.create') }}">Add New Role</a>
    <ul>
        @foreach ($roles as $role)
            <li>
                {{ $role->nombre_rol }} - {{ $role->desc_rol }}
                <a href="{{ route('roles.show', $role->id_rol) }}">Ver</a>
                <a href="{{ route('roles.edit', $role->id_rol) }}">Editar</a>
                <form action="{{ route('roles.destroy', $role->id_rol) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este rol?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
    
</body>
</html>
