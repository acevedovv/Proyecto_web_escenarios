<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>escenarios_deportivos - {{ count($escenariosDeportivos) }}</h1>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fecha disponible</th>
                    <th>Nombre escenario</th>
                    <th>id</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($escenariosDeportivos as $escenario)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$escenario->fecha_dis}}</td>
                    <td>{{$escenario->nombre_esc}}</td>
                    <td>{{$escenario->id_fun}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
