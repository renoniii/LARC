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
    <div class="wrapper">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar shadow-sm">
          <div class="header">
            <h5>LARC Admin</h5>
            <button class="toggle-btn" onclick="toggleSidebar()" title="Abrir menú">
              <i class="bi bi-list"></i>
            </button>
        </div>
        <div class="nav-menu">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-bar-chart-fill text-success"></i><span>Dashboard</span>
            </a>
            <a class="nav-link {{ request()->routeIs('dashboard.productos') ? 'active' : '' }}" href="{{ route('dashboard.productos') }}">
                <i class="bi bi-basket-fill"></i><span>Productos</span>
            </a>
            <a class="nav-link {{ request()->routeIs('dashboard.categorias') ? 'active' : '' }}" href="{{ route('dashboard.categorias') }}">
                <i class="bi bi-folder-fill text-warning"></i><span>Categorías</span>
            </a>
            <a class="nav-link {{ request()->routeIs('dashboard.usuarios') ? 'active' : '' }}" href="{{ route('dashboard.usuarios') }}">
                <i class="bi bi-people-fill text-primary"></i><span>Usuarios</span>
            </a>
            <a class="nav-link {{ request()->routeIs('dashboard.mensajes') ? 'active' : '' }}" href="{{ route('dashboard.mensajes') }}">
                <i class="bi bi-envelope-fill text-danger"></i><span>Mensajes</span>
            </a>
            <a class="nav-link text-danger" href="#"><i class="bi bi-box-arrow-right"></i><span>Cerrar sesión</span></a>
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