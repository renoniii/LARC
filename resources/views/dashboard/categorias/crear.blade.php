@extends('layout.dashboard')

@section('content')
<div class="main-content">
  <h3 class="fw-bold text-warning mb-4">Agregar Categoría</h3>

  <form action="{{ route('dashboard.categorias.guardar') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre de la categoría</label>
      <input type="text" name="nombre" id="nombre" class="form-control" required>
    </div>

    <div class="text-end">
      <a href="{{ route('dashboard.categorias') }}" class="btn btn-secondary">Cancelar</a>
      <button type="submit" class="btn btn-warning"><i class="bi bi-save me-1"></i>Guardar</button>
    </div>
  </form>
</div>
@endsection