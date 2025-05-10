@extends('layout.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    @if($producto->imagen)
                        <img src="{{ asset($producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                    @else
                        <img src="{{ asset('img/default.jpg') }}" class="card-img-top" alt="Sin imagen">
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <h2 class="fw-bold text-success">{{ $producto->nombre }}</h2>
                <p class="text-muted">{{ $producto->descripcion }}</p>
                <p class="h4 fw-bold text-primary">${{ number_format($producto->precio, 0, ',', '.') }}</p>

                <form method="POST" action="{{ route('carrito.agregar', $producto->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control" value="1" min="1">
                    </div>
                    <button type="submit" class="btn btn-degradado">Añadir al carrito</button>
                </form>

                <a href="{{ route('productos') }}" class="btn btn-outline-secondary mt-3">← Volver al catálogo</a>
            </div>
        </div>
    </div>
</section>
@endsection
