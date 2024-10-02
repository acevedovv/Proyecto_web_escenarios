<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Reservas</title>
    <!-- Importar Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Lista de Reservas</h1>
        <a href="{{ route('reservas.create') }}" class="btn btn-primary mb-3">Agregar Nueva Reserva</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Fecha de Reserva</th>
                    <th>Fecha de Devolución</th>
                    <th>Usuario</th>
                    <th>Escenario Deportivo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $reserva)
                    <tr>
                        <td>{{ $reserva->id_res }}</td>
                        <td>{{ \Carbon\Carbon::parse($reserva->fecha_res)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($reserva->fecha_dev)->format('d/m/Y') }}</td>
                        <td>{{ $reserva->user->nombre_usu }}</td>
                        <td>{{ $reserva->escenarioDeportivo->nombre_esc }}</td>
                        <td>
                        @if(auth()->user()->role->nombre_rol === 'administrador') <!-- Reemplaza 'Administrador' con el rol deseado -->
                      
                        <a href="{{ route('reservas.edit', $reserva->id_res) }}" class="btn btn-warning btn-sm">Editar</a>
                        @endif
                            

                           
                            <form action="{{ route('reservas.destroy', $reserva->id_res) }}" method="POST" style="display:inline;">
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

    <!-- Importar Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
