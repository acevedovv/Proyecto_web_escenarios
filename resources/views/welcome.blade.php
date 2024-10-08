<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alquiler de Escenarios Deportivos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header-bg {
            background-image: url('{{ asset('images/portada.jpg') }}');
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
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('escenarios_deportivos/info') }}">Escenarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('escenarios_deportivos/precios') }}">Precios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('escenarios_deportivos/contactanos') }}">Contacto</a>
                    </li>

                    <!-- Mostrar si el usuario está autenticado -->
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <!-- Botón Cerrar Sesión -->
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Cerrar Sesión</button>
                                    </form>
                                </li>
                                <li>
                                    <!-- Botón Editar CRUDs -->
                                    @if(auth()->user()->role->nombre_rol === 'administrador') <!-- Reemplaza 'Administrador' con el rol deseado -->
                                    <a href="{{ route('home') }}" class="dropdown-item">Editar CRUDs</a>
                                @endif
                                    
                                </li>
                                <li>
                                    <!-- Botón Perfil -->
                                    <a href="{{ route('perfil', auth()->user()->id) }} "class="dropdown-item">Mi Perfil</a>
                                    
                                    
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-outline-light" href="{{ route('login') }}">Iniciar Sesión</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <header class="header-bg">
        <div class="container">
            <h1>Bienvenido a Escenarios Deportivos</h1>
            <p class="lead">Encuentra y alquila los mejores escenarios deportivos en tu área</p>
            <a href="{{ route('escenarios_deportivos/info') }}" class="btn btn-light btn-lg">Explorar Escenarios</a>
        </div>
    </header>

    <section class="py-5">
        <div class="container text-center">
            <h2>Nuestros Servicios</h2>
            <p class="lead">Ofrecemos una amplia gama de escenarios deportivos para alquilar.</p>
            <div class="row">
                <div class="col-md-4">
                    <h3>Fútbol</h3>
                    <p>Alquila canchas de fútbol de primer nivel.</p>
                </div>
                <div class="col-md-4">
                    <h3>Baloncesto</h3>
                    <p>Encuentra las mejores canchas de baloncesto en tu área.</p>
                </div>
                <div class="col-md-4">
                    <h3>Tenis</h3>
                    <p>Reserva tus canchas de tenis favoritas con facilidad.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center">Testimonios de Clientes</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <p class="card-text">"La pista de patinaje es de excelente calidad. Reservar fue rápido y fácil."</p>
                            <p class="text-end"><strong>- Juan Pérez</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <p class="card-text">"Una gran experiencia. Pude organizar un torneo de baloncesto sin problemas."</p>
                            <p class="text-end"><strong>- Ana Rodríguez</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <p class="card-text">"Las mejores canchas de tenis en la ciudad. Repetiré sin duda."</p>
                            <p class="text-end"><strong>- Carlos García</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center">Galería de Escenarios</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <img src="{{ asset('images/imagen1.jfif') }}" alt="Descripción de la imagen" class="img-fluid">
                </div>
                <div class="col-md-4 mb-4">
                    <img src="{{ asset('images/imagen2.jfif') }}" alt="Descripción de la imagen" class="img-fluid">
                </div>
                <div class="col-md-4 mb-4">
                    <img src="{{ asset('images/imagen3.jfif') }}" alt="Descripción de la imagen" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light py-5">
        <div class="container">
            <h2 class="text-center">Nuestros Precios</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <h3 class="card-title">Básico</h3>
                            <p class="card-text">Acceso a canchas seleccionadas.</p>
                            <p class="card-text"><strong>$20 / hora</strong></p>
                            <a href="{{ route('reservas.create', ['plan' => 'basico']) }}" class="btn btn-primary">Seleccionar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <h3 class="card-title">Estándar</h3>
                            <p class="card-text">Acceso a una variedad de escenarios.</p>
                            <p class="card-text"><strong>$40 / hora</strong></p>
                            <a href="{{ route('reservas.create', ['plan' => 'estandar']) }}" class="btn btn-primary">Seleccionar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <h3 class="card-title">Premium</h3>
                            <p class="card-text">Acceso ilimitado a todos los escenarios.</p>
                            <p class="card-text"><strong>$60 / hora</strong></p>
                            <a href="{{ route('reservas.create', ['plan' => 'premium']) }}" class="btn btn-primary">Seleccionar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center">Contáctanos</h2>
            <p class="text-center">¿Tienes preguntas? No dudes en ponerte en contacto con nosotros.</p>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="mensaje" class="form-label">Mensaje</label>
                            <textarea class="form-control" id="mensaje" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 Escenarios Deportivos. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
