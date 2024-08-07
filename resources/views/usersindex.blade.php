<!DOCTYPE html>
<html>
<head>
    <title>Usuarios</title>
</head>
<body>
    <h1>Usuarios</h1>
    <a href="{{ route('users.create') }}">Agregar Nuevo Usuario</a>
    <ul>
        @foreach ($users as $user)
            <li>
                {{ $user->nombre_usu }} - {{ $user->num_usu }} - {{ $user->role->nombre_rol }}
                <a href="{{ route('users.show', $user->id_usu) }}">Ver</a>
                <a href="{{ route('users.edit', $user->id_usu) }}">Editar</a>
                <form action="{{ route('users.destroy', $user->id_usu) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
