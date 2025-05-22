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
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($usuarios as $usuario)
        <tr>
          <td>{{ $usuario->name }}</td>
          <td>{{ $usuario->email }}</td>
          <td>
            <span class="badge bg-{{ $usuario->role == 'admin' ? 'success' : 'secondary' }}">
              {{ ucfirst($usuario->role) }}
            </span>
          </td>
          <td>
            @if(Auth::id() === $usuario->id)
              <span class="text-muted">
                <i class="bi bi-lock-fill"></i> No editable
              </span>
            @else
              <form action="{{ route('dashboard.usuarios.actualizarRol', $usuario->id) }}" method="POST" class="d-inline">
                @csrf
                @method('PUT')
                <select name="role" class="form-select form-select-sm" onchange="this.form.submit()">
                  <option value="cliente" {{ $usuario->role === 'cliente' ? 'selected' : '' }}>Cliente</option>
                  <option value="admin" {{ $usuario->role === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
              </form>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection