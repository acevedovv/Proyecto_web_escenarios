<!DOCTYPE html>
<html>
<head>
    <title>Agregar Funcionario</title>
</head>
<body>
    <h1>Agregar Funcionario</h1>
    <form action="{{ route('funcionarios.store') }}" method="POST">
        @csrf
        <label for="nombre_fun">Nombre:</label>
        <input type="text" name="nombre_fun" id="nombre_fun" required>
        <br>
        <label for="user_id">Usuario:</label>
        <select name="user_id" id="user_id" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Guardar</button>
    </form>
    <a href="{{ route('funcionarios.index') }}">Volver a la lista</a>
</body>
</html>
