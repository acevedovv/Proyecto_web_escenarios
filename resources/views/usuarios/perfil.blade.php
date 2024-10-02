<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Perfil de Usuario</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Información del Usuario</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('usuarios.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre_usu" value="{{ $user->nombre_usu }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Número</label>
                        <input type="text" class="form-control" id="numero" name="num_usu" value="{{ $user->num_usu }}" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Actualizar Información</button>
                    <a href="{{ url('/') }}" class="btn btn-outline-secondary">Cancelar</a>
                    <a href="{{ route('reservas.index') }}" class="btn btn-outline-success">Reservas</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
