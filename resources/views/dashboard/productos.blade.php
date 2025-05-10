@extends('layout.dashboard')

@section('content')
<div class="main-content">
  <h3 class="fw-bold text-success mb-4">Gestión de Productos</h3>

  <div class="mb-4 text-end">
    <a href="#" class="btn btn-success"><i class="bi bi-plus-circle me-1"></i>Agregar producto</a>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
      <thead class="table-success">
        <tr>
          <th>Nombre</th>
          <th>Categoría</th>
          <th>Precio</th>
          <th>Stock</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        {{-- @foreach($productos as $producto) --}}
        <tr>
          <td>Jabón Industrial</td>
          <td>Limpieza</td>
          <td>$12.000</td>
          <td>35</td>
          <td>
            <a href="#" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>
            <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
          </td>
        </tr>
        {{-- @endforeach --}}
      </tbody>
    </table>
  </div>
</div>
@endsection
