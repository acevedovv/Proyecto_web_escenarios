<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Usuarios</title>
</head>
<body>
    <h1>Listado de Usuarios</h1>

    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Numero de celular</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->nombre_usu }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->num_usu }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
