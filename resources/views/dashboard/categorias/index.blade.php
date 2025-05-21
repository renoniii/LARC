@extends('layout.dashboard')

@section('content')
<div class="main-content">
  <h3 class="fw-bold text-warning mb-4">Categorías de Productos</h3>

  <div class="mb-4 text-end">
    <a href="{{ route('dashboard.categorias.crear') }}" class="btn btn-warning">
      <i class="bi bi-plus-circle me-1"></i>Agregar categoría
    </a>
  </div>

  <ul class="list-group">
    @forelse($categorias as $categoria)
    <li class="list-group-item d-flex justify-content-between align-items-center">
      {{ $categoria->nombre }}
      <div>
        <a href="{{ route('dashboard.categorias.editar', $categoria->id) }}" class="btn btn-sm btn-primary me-1">
          <i class="bi bi-pencil"></i>
        </a>
        <form action="{{ route('dashboard.categorias.eliminar', $categoria->id) }}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar esta categoría?')">
            <i class="bi bi-trash"></i>
          </button>
        </form>
      </div>
    </li>
    @empty
    <li class="list-group-item text-muted text-center">No hay categorías registradas.</li>
    @endforelse
  </ul>
</div>
@endsection