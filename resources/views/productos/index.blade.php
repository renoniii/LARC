@extends('layout.app')

@section('content')
<!-- Título de sección -->
<section class="py-5">
    <div class="container">
      <h2 class="section-title text-center mb-4 fw-bold">Catálogo de Productos</h2>
  
      <!-- Filtro de búsqueda opcional -->
      <div class="row mb-4">
        <div class="col-md-6 mx-auto">
          <input type="text" class="form-control" placeholder="Buscar producto...">
        </div>
      </div>
  
      @foreach($categorias as $categoria)
      <h4 class="fw-bold text-success mt-5">{{ $categoria->nombre }}</h4>
      <div class="row g-4">
        @forelse($categoria->productos as $producto)
          <div class="col-md-4">
            <div class="card h-100 shadow-sm">
              @if($producto->imagen)
                <img src="{{ asset('storage/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
              @else
                <img src="{{ asset('img/default.jpg') }}" class="card-img-top" alt="Sin imagen">
              @endif
              <div class="card-body">
                <h5 class="card-title">{{ $producto->nombre }}</h5>
                <p class="card-text">{{ $producto->descripcion }}</p>
                <p class="fw-bold text-primary">${{ number_format($producto->precio, 0, ',', '.') }}</p>
                <button class="btn btn-degradado btn-sm mt-2">Ver más</button>
              </div>
            </div>
          </div>
        @empty
          <p class="text-muted">No hay productos disponibles en esta categoría.</p>
        @endforelse
      </div>
    @endforeach
  
      </div>
    </div>
  </section>
@endsection