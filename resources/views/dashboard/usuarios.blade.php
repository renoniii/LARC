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
        @foreach($usuarios as $usuario)
          <tr>
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->email }}</td>
            <td>
              @if($usuario->is_admin)
                <span class="badge bg-success">Admin</span>
              @else
                <span class="badge bg-secondary">Usuario</span>
              @endif
            </td>
            <td>
              @if($usuario->email_verified_at)
                <span class="badge bg-primary">Activo</span>
              @else
                <span class="badge bg-warning text-dark">Sin verificar</span>
              @endif
            </td>
            <td>
              {{-- Aquí podrías incluir acciones como bloquear o convertir en admin --}}
              <form action="#" method="POST" class="d-inline">
                {{-- @csrf y botón funcional cuando implementes la acción --}}
                <button class="btn btn-sm btn-danger" disabled><i class="bi bi-lock"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
