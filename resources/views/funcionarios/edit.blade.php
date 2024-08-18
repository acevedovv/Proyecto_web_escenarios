<!DOCTYPE html>
<html>
<head>
    <title>Editar Funcionario</title>
</head>
<body>
    <h1>Editar Funcionario</h1>
    <form action="{{ route('funcionarios.update', $funcionario->id_fun) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre_fun">Nombre:</label>
        <input type="text" name="nombre_fun" id="nombre_fun" value="{{ $funcionario->nombre_fun }}" required>
        <br>
        <label for="user_id">Usuario:</label>
        <select name="user_id" id="user_id" required>
            @foreach($users as $user)
            <option value="{{ $user->id }}" {{ $funcionario->user_id == $user->id ? 'selected' : '' }}> {{ $user->id }}{{ $user->name }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="{{ route('funcionarios.index') }}">Volver a la lista</a>
</body>
</html>

