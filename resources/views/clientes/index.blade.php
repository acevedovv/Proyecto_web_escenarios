<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>
<body>
    <h1>Lista de Clientes</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Numero</th>
                <th>Usuario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombre_cli }}</td>
                    <td>{{ $cliente->num_cli }}</td>
                    <td>
                        @if ($cliente->user)
                            {{ $cliente->user->nombre_usu }}
                        @else
                            Usuario no disponible
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

