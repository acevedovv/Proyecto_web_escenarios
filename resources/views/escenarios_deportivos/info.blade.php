<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escenarios Deportivos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .card-body {
            height: 150px;
        }
        .map-container {
            height: 200px;
            width: 100%;
        }
    </style>
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
                        <a class="nav-link active" href="{{ route('escenarios_deportivos/info') }}">Escenarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('escenarios_deportivos/precios') }}">Precios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('escenarios_deportivos/contactanos') }}">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1>Escenarios Deportivos</h1>
            <p class="lead">Explora las fotos e información de nuestros escenarios deportivos</p>
        </div>
    </header>

    <!-- Sección de Escenarios -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Escenario 1 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('images/imagen1.jfif') }}" class="card-img-top" alt="Escenario 1">
                        <div class="card-body">
                            <h5 class="card-title">Pista de Patinaje</h5>
                            <p class="card-text">Una pista moderna y bien equipada, ideal para entrenamientos y competencias de patinaje. Ubicada en un entorno deportivo de alto nivel en Manizales, ofrece instalaciones de calidad para patinadores de todos los niveles.</p>
                        </div>
                        <div class="map-container">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d417.7461518731231!2d-75.4891474656521!3d5.0560845334073035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e47657c7bcfcbdf%3A0x8ac115f9c8bdfb12!2sPista%20de%20Patinaje%20-%20Unidad%20Deportiva%20Palogrande!5e0!3m2!1ses-419!2sco!4v1724719430678!5m2!1ses-419!2sco"
                                width="100%" 
                                height="100%" 
                                frameborder="0" 
                                style="border:0;" 
                                allowfullscreen="" 
                                aria-hidden="false" 
                                tabindex="0">
                            </iframe>
                        </div>
                    </div>
                </div>

                <!-- Escenario 2 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('images/imagen2.jfif') }}" class="card-img-top" alt="Escenario 2">
                        <div class="card-body">
                            <h5 class="card-title">Coliseo Mayor Jorge Arango Uribe</h5>
                            <p class="card-text">Un recinto destacado para el baloncesto, con una cancha profesional y capacidad para grandes eventos. Su infraestructura moderna y sus excelentes instalaciones lo convierten en el lugar ideal para partidos, torneos y entrenamientos de baloncesto en Manizales.</p>
                        </div>
                        <div class="map-container">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d590.7803818618039!2d-75.48859984127294!3d5.058157766886534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e47657c4a4bd6c9%3A0xe390c0e299b20d12!2sColiseo%20Mayor%20Jorge%20Arango%20Uribe!5e0!3m2!1ses-419!2sco!4v1724719255162!5m2!1ses-419!2sco"
                                width="100%" 
                                height="100%" 
                                frameborder="0" 
                                style="border:0;" 
                                allowfullscreen="" 
                                aria-hidden="false" 
                                tabindex="0">
                            </iframe>
                        </div>
                    </div>
                </div>

                <!-- Escenario 3 -->
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('images/imagen3.jfif') }}" class="card-img-top" alt="Escenario 3">
                        <div class="card-body">
                            <h5 class="card-title">Canchas de Tenis Palogrande
                            </h5>
                            <p class="card-text">Excelentes instalaciones para el tenis en un entorno deportivo de primer nivel. Equipadas con canchas de alta calidad, ofrecen el espacio perfecto para entrenamientos y competiciones en Manizales.</p>
                        </div>
                        <div class="map-container">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d496.7859093807671!2d-75.48837344124345!3d5.05710993098956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e47657c3ff931c5%3A0x56aa6ab51be835af!2sCanchas%20de%20Tenis%20Palogrande!5e0!3m2!1ses-419!2sco!4v1724718949202!5m2!1ses-419!2sco" 
                                    width="100%" 
                                    height="100%" 
                                    frameborder="0" 
                                    style="border:0;" 
                                    allowfullscreen="" 
                                    aria-hidden="false" 
                                    tabindex="0">
                                </iframe>
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
