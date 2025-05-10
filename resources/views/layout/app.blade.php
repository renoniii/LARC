<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LARC | Suministros de Aseo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('CSS')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm bg-white fixed-top">
        <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/logo.png') }}" alt="LARC Logo" style="height: 50px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav me-3">
            <li class="nav-item"><a class="nav-link text-dark" href="/">Inicio</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="/productos">Productos</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="/nosotros">Nosotros</a></li>
            <li class="nav-item"><a class="nav-link text-dark" href="/contacto">Contacto</a></li>
            </ul>
            <a href="/login" class="btn btn-degradado btn-sm">Iniciar sesión</a>
        </div>
        </div>
    </nav>
    
    @yield('content')
    
    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
        <p class="mb-1">© 2025 LARC - Todos los derechos reservados</p>
        <p class="small">Dotaciones, Suministros y Obras</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>