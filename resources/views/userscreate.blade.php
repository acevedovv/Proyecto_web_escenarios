<!DOCTYPE html>
<html>
<head>
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Nuevo Usuario</h1>
    <script src="{{ asset('js/indexusu.js') }}" defer></script>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label for="nombre_usu">Nombre:</label>
        <input type="text" id="nombre_usu" name="nombre_usu" required>
        <br>
        <label for="num_usu">Numero:</label>
        <input type="text" id="num_usu" name="num_usu" required>
        <br>
        <label for="id_rol">Role:</label>
        <select id="id_rol" name="id_rol" required>
            @foreach ($roles as $role)
                <option value="{{ $role->id_rol }}">{{ $role->nombre_rol }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Crear Usuario</button>
    </form>
    <a href="{{ route('users.index') }}">Volver a la lista</a>
</body>
</html>


