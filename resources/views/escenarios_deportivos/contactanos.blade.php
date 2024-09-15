<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contáctanos - Escenarios Deportivos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-control, .form-group {
            margin-bottom: 1rem;
        }
        .contact-header {
            background-color: #f8f9fa;
            padding: 2rem 0;
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
                        <a class="nav-link" href="{{ route('escenarios_deportivos/precios') }}">Precios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('escenarios_deportivos/contactanos') }}">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <header class="contact-header text-center">
        <div class="container">
            <h1>Contáctanos</h1>
            <p class="lead">Estamos aquí para ayudarte. Completa el formulario y nos pondremos en contacto contigo.</p>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" placeholder="Tu nombre">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" placeholder="Tu correo electrónico">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Mensaje</label>
                            <textarea class="form-control" id="message" rows="5" placeholder="Tu mensaje"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
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
