<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precios - Escenarios Deportivos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header-bg {
            background-image: url('{{ asset('images/portada3.jpg') }}'); /* Reemplaza con la ruta a tu imagen de fondo */
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 5rem 0;
        }
    </style>
</head>
<body>
  
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
                        <a class="nav-link" href="{{ route('escenarios_deportivos/info') }}">Escenarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('escenarios_deportivos/precios') }}">Precios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('escenarios_deportivos/contactanos') }}">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="header-bg">
        <div class="container">
            <h1>Nuestros Precios</h1>
            <p class="lead">Elige la franja horaria que mejor se adapte a tus necesidades</p>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <div class="row text-center">
                
                <div class="col-lg-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-header bg-dark text-white">
                            <h4 class="my-0 fw-normal">Mañana</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$30,000 <small class="text-muted">/ hora</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>6:00 AM - 12:00 PM</li>
                                <li>Acceso a todos los escenarios</li>
                                <li>Soporte básico</li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-primary">Reservar</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-header bg-dark text-white">
                            <h4 class="my-0 fw-normal">Tarde</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$35,000 <small class="text-muted">/ hora</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>12:00 PM - 6:00 PM</li>
                                <li>Acceso a todos los escenarios</li>
                                <li>Soporte prioritario</li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-primary">Reservar</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card mb-4 box-shadow">
                        <div class="card-header bg-dark text-white">
                            <h4 class="my-0 fw-normal">Noche</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$40,000 <small class="text-muted">/ hora</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>6:00 PM - 12:00 AM</li>
                                <li>Acceso a todos los escenarios</li>
                                <li>Soporte VIP</li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-primary">Reservar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p>&copy; 2024 Escenarios Deportivos. Todos los derechos reservados.</p>
            <p><a href="#" class="text-white">Política de Privacidad</a> | <a href="#" class="text-white">Términos de Servicio</a></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>