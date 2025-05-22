<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LARC | Suministros de Aseo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @yield('CSS')
</head>
<body>
    <div class="wrapper d-flex">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar shadow-sm d-flex flex-column">
        <!-- Encabezado -->
        <div class="header">
            <h5>LARC Admin</h5>
            <button class="toggle-btn" onclick="toggleSidebar()" title="Abrir menú">
                <i class="bi bi-list"></i>
            </button>
        </div>

        <!-- Agrupa menú y botones -->
        <div class="nav-wrapper flex-grow-1 d-flex flex-column">
            <!-- Menú de navegación -->
            <div class="nav-menu">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="bi bi-bar-chart-fill"></i><span>Dashboard</span>
                </a>
                <a class="nav-link {{ request()->routeIs('dashboard.productos') ? 'active' : '' }}" href="{{ route('dashboard.productos') }}">
                    <i class="bi bi-basket-fill text-success"></i><span>Productos</span>
                </a>
                <a class="nav-link {{ request()->routeIs('dashboard.categorias') ? 'active' : '' }}" href="{{ route('dashboard.categorias') }}">
                    <i class="bi bi-folder-fill text-warning"></i><span>Categorías</span>
                </a>
                <a class="nav-link {{ request()->routeIs('dashboard.usuarios') ? 'active' : '' }}" href="{{ route('dashboard.usuarios') }}">
                    <i class="bi bi-people-fill text-primary"></i><span>Usuarios</span>
                </a>
                <a class="nav-link {{ request()->routeIs('dashboard.orden') ? 'active' : '' }}" href="{{ route('dashboard.orden') }}">
                    <i class="bi bi-cart-check-fill text-danger"></i><span>Órdenes</span>
                </a>
                <a class="nav-link {{ request()->routeIs('dashboard.mensajes') ? 'active' : '' }}" href="{{ route('dashboard.mensajes') }}">
                    <i class="bi bi-envelope-fill text-info"></i><span>Mensajes</span>
                </a>

            </div>

            <!-- Botones del final -->
            <div class="sidebar-footer mt-auto p-3">
                <a href="{{ route('inicio') }}" class="btn btn-outline-secondary w-100 mb-2 d-flex align-items-center justify-content-center">
                    <i class="bi bi-globe me-2"></i><span class="footer-text">Ver página</span>
                </a>
                @guest
                    <a class="btn btn-outline-dark w-100 d-flex align-items-center justify-content-center" href="{{ route('login') }}">
                        <i class="bi bi-box-arrow-in-right me-2"></i><span class="footer-text">Iniciar sesión</span>
                    </a>
                @else
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center">
                            <i class="bi bi-box-arrow-right me-2"></i><span class="footer-text">Cerrar sesión</span>
                        </button>
                    </form>
                @endguest
            </div>
        </div>
    </div>


    @yield('content')
      
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            if (window.innerWidth <= 768) {
            sidebar.classList.toggle('expanded');
            } else {
            sidebar.classList.toggle('collapsed');
            }
        }
    </script>
</body>
</html>