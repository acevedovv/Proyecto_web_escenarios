<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Funcionarios</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-4">
        <h1>Lista de Funcionarios</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <a href="{{ route('funcionarios.create') }}" class="btn btn-primary mb-3">Agregar Nuevo Funcionario</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($funcionarios as $funcionario)
                    <tr>
                        <td>{{ $funcionario->id_fun }}</td>
                        <td>{{ $funcionario->nombre_fun }}</td>
                        <td>{{ $funcionario->user->id }}</td>
                        <td>
                            <a href="{{ route('funcionarios.show', $funcionario->id_fun) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('funcionarios.edit', $funcionario->id_fun) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('funcionarios.destroy', $funcionario->id_fun) }}" method="POST" style="display:inline;">
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
    <h1>Lista de Funcionarios</h1>
    <a href="{{ route('funcionarios.create') }}">Agregar un Nuevo Funcionario</a>
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
