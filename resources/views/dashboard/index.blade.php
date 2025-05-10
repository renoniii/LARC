@extends('layout.dashboard')

@section('content')

<!-- Main content -->
<div class="main-content">
    <h3 class="fw-bold text-success mb-4">Panel de Administración</h3>

    <div class="row g-4">
      <div class="col-md-3 col-6">
        <div class="card shadow-sm">
          <div class="card-body d-flex align-items-center">
            <div class="card-icon text-success"><i class="bi bi-basket-fill"></i></div>
            <div>
              <h6 class="mb-0">Productos</h6>
              <span class="fw-bold">58</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card shadow-sm">
          <div class="card-body d-flex align-items-center">
            <div class="card-icon text-primary"><i class="bi bi-people-fill"></i></div>
            <div>
              <h6 class="mb-0">Usuarios</h6>
              <span class="fw-bold">14</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card shadow-sm">
          <div class="card-body d-flex align-items-center">
            <div class="card-icon text-warning"><i class="bi bi-folder-fill"></i></div>
            <div>
              <h6 class="mb-0">Categorías</h6>
              <span class="fw-bold">7</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card shadow-sm">
          <div class="card-body d-flex align-items-center">
            <div class="card-icon text-danger"><i class="bi bi-envelope-fill"></i></div>
            <div>
              <h6 class="mb-0">Mensajes</h6>
              <span class="fw-bold">3</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card mt-4 shadow-sm">
      <div class="card-header bg-light">
        Bienvenido, <strong>Admin Ejemplo</strong>
      </div>
      <div class="card-body">
        <p>Desde este panel puedes gestionar productos, usuarios, categorías y mensajes del sitio <strong>LARC</strong>.</p>
      </div>
    </div>
  </div>
</div>

@endsection