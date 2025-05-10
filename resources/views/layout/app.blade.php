<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LARC | Suministros de Aseo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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

                <!-- Carrito de compras -->
                <button class="btn btn-outline-secondary position-relative me-3" data-bs-toggle="offcanvas" data-bs-target="#carritoSidebar" aria-controls="carritoSidebar">
                    <i class="bi bi-cart3"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ session('carrito') ? array_sum(array_column(session('carrito'), 'cantidad')) : 0 }}
                    </span>
                </button>

                @guest
                    <a href="{{ route('login') }}" class="btn btn-degradado btn-sm me-2">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-success btn-sm">Registrarse</a>
                @else
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('dashboard') }}">Panel de administración</a>
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Cerrar sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Sidebar carrito -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="carritoSidebar" aria-labelledby="carritoSidebarLabel">
        <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="carritoSidebarLabel">Carrito de Compras</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
        </div>
        <div class="offcanvas-body">
        @php $carrito = session('carrito', []); @endphp
    
        @forelse($carrito as $id => $item)
            <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <strong>{{ $item['nombre'] }}</strong><br>
                <small class="text-muted">Cantidad: {{ $item['cantidad'] }}</small><br>
                <small>${{ number_format($item['precio'], 0, ',', '.') }}</small>
            </div>
            @if ($item['imagen'])
                <img src="{{ asset($item['imagen']) }}" alt="img" class="img-thumbnail" style="width: 50px; height: 50px;">
            @endif
            </div>
        @empty
            <p class="text-muted">El carrito está vacío.</p>
        @endforelse
    
        @if(count($carrito))
            <hr>
            <div class="d-grid">
            <a href="{{ route('carrito.ver') }}" class="btn btn-degradado">Ir al carrito</a>
            </div>
        @endif
        </div>
    </div>
  
    
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