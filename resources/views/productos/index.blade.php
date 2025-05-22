@extends('layout.app')

@section('content')
<section class="py-5">
  <div class="container">
    <h2 class="section-title text-center mb-4 fw-bold">Catálogo de Productos</h2>

    <!-- Barra de búsqueda + botón de filtro -->
    <form method="GET" action="{{ route('productos') }}">
      <div class="row mb-3 justify-content-center align-items-center">
        <div class="col-md-2 text-center">
          <button type="button" class="btn btn-outline-success w-100" data-bs-toggle="collapse" data-bs-target="#filtroCategorias" aria-expanded="false">
            <i class="bi bi-funnel-fill"></i> Filtros
          </button>
        </div>
      </div>

      <!-- Filtros por categoría (colapsable) -->
      <div class="collapse mb-4" id="filtroCategorias">
        <div class="d-flex flex-wrap gap-2 justify-content-center">
          <a href="{{ route('productos') }}" class="btn btn-outline-secondary btn-sm {{ request('categoria') ? '' : 'active' }}">Todas</a>
          @foreach ($categorias as $categoria)
            <a href="{{ route('productos', ['categoria' => $categoria->id]) }}"
               class="btn btn-outline-success btn-sm {{ request('categoria') == $categoria->id ? 'active' : '' }}">
              {{ $categoria->nombre }}
            </a>
          @endforeach
        </div>
      </div>
    </form>

    <!-- Grilla de productos -->
    <div class="row g-4">
      @forelse($productos as $producto)
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            @if($producto->imagen)
              <img src="{{ asset($producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
            @else
              <img src="{{ asset('img/default.jpg') }}" class="card-img-top" alt="Sin imagen">
            @endif
            <div class="card-body">
              <h5 class="card-title">{{ $producto->nombre }}</h5>
              <p class="card-text">{{ $producto->descripcion }}</p>
              <p class="fw-bold text-primary">${{ number_format($producto->precio, 0, ',', '.') }}</p>
              <a href="{{ route('producto.detalle', $producto->id) }}" class="btn btn-degradado btn-sm mt-2">Ver más</a>
            </div>
          </div>
        </div>
      @empty
        <p class="text-muted">No se encontraron productos.</p>
      @endforelse

      <div class="mt-4 d-flex justify-content-center">
        {{ $productos->appends(request()->query())->links() }}
     </div>
    </div>
  </div>
</section>
@endsection