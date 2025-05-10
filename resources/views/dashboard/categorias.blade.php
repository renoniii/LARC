@extends('layout.dashboard')

@section('content')
<div class="main-content">
  <h3 class="fw-bold text-warning mb-4">Categorías de Productos</h3>

  <div class="mb-4 text-end">
    <a href="#" class="btn btn-warning"><i class="bi bi-plus-circle me-1"></i>Agregar categoría</a>
  </div>

  <ul class="list-group">
    {{-- @foreach($categorias as $categoria) --}}
    <li class="list-group-item d-flex justify-content-between align-items-center">
      Limpieza y Desinfección
      <div>
        <a href="#" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
        <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
      </div>
    </li>
    {{-- @endforeach --}}
  </ul>
</div>
@endsection
