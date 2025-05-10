@extends('layout.dashboard')

@section('content')
<div class="main-content">
  <h3 class="fw-bold text-primary mb-4">Gestión de Usuarios</h3>

  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
      <thead class="table-primary">
        <tr>
          <th>Nombre</th>
          <th>Email</th>
          <th>Rol</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        {{-- @foreach($usuarios as $usuario) --}}
        <tr>
          <td>Camila Rojas</td>
          <td>camila@larc.com</td>
          <td>Admin</td>
          <td>Activo</td>
          <td>
            <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-lock"></i></a>
          </td>
        </tr>
        {{-- @endforeach --}}
      </tbody>
    </table>
  </div>
</div>
@endsection
