<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Escenarios Deportivos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Escenarios Deportivos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Escenarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Detalles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1>Detalles de Escenarios Deportivos</h1>
            <p class="lead">Explora las fotos e información de nuestros escenarios deportivos</p>
        </div>
    </header>

    <!-- Sección de Escenarios -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Escenario 1 -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Escenario 1">
                        <div class="card-body">
                            <h5 class="card-title">Escenario 1</h5>
                            <p class="card-text">Descripción breve del Escenario 1. Ideal para eventos deportivos y entrenamientos.</p>
                        </div>
                    </div>
                </div>
                <!-- Escenario 2 -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Escenario 2">
                        <div class="card-body">
                            <h5 class="card-title">Escenario 2</h5>
                            <p class="card-text">Descripción breve del Escenario 2. Perfecto para partidos y torneos.</p>
                        </div>
                    </div>
                </div>
                <!-- Escenario 3 -->
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Escenario 3">
                        <div class="card-body">
                            <h5 class="card-title">Escenario 3</h5>
                            <p class="card-text">Descripción breve del Escenario 3. Ideal para eventos grandes y entrenamientos intensivos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p>&copy; 2024 Escenarios Deportivos. Todos los derechos reservados.</p>
            <p><a href="#" class="text-white">Política de Privacidad</a> | <a href="#" class="text-white">Términos de Servicio</a></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>