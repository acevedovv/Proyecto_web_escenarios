<!DOCTYPE html>
<html>
<head>
    <title>Lista de Funcionarios</title>
</head>
<body>
    <h1>Lista de Funcionarios</h1>
    <a href="{{ route('funcionarios.create') }}">Agregar Nuevo Funcionario</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->id_fun }}</td>
                    <td>{{ $funcionario->nombre_fun }}</td>
                    <td>{{ $funcionario->user->id }}</td>
                    <td>
                        <a href="{{ route('funcionarios.show', $funcionario->id_fun) }}">Ver</a>
                        <a href="{{ route('funcionarios.edit', $funcionario->id_fun) }}">Editar</a>
                        <form action="{{ route('funcionarios.destroy', $funcionario->id_fun) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
