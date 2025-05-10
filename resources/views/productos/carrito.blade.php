@extends('layout.app')

@section('content')
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center mb-4 fw-bold">Mi Carrito</h2>

        @if(count($carrito) > 0)
        <div class="row">
            <div class="col-lg-8">
                <div class="list-group mb-4">
                    @php $total = 0; @endphp

                    @foreach($carrito as $id => $item)
                        @php $total += $item['precio'] * $item['cantidad']; @endphp
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center gap-3">
                                <img src="{{ asset($item['imagen'] ?? 'img/default.jpg') }}" class="rounded" width="60" height="60" alt="img">
                                <div>
                                    <h6 class="mb-0 fw-bold">{{ $item['nombre'] }}</h6>
                                    <small class="text-muted">Cantidad: {{ $item['cantidad'] }}</small><br>
                                    <small class="text-muted">Precio unitario: ${{ number_format($item['precio'], 0, ',', '.') }}</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <p class="fw-bold text-primary mb-1">${{ number_format($item['precio'] * $item['cantidad'], 0, ',', '.') }}</p>
                                <form action="{{ route('carrito.disminuir', $id) }}" method="POST" style="display:inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-dash-circle"></i>
                                    </button>
                                </form>                          
                            </div>
                        </div>                        
                    @endforeach
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold">Resumen</h5>
                        <hr>
                        <p class="mb-2">Subtotal:</p>
                        <p class="fw-bold h5 text-success">${{ number_format($total, 0, ',', '.') }}</p>
                        <div class="d-grid mt-3">
                            <a href="#" class="btn btn-degradado">Proceder al pago</a>
                        </div>
                        <a href="{{ route('productos') }}" class="btn btn-outline-secondary mt-3 w-100">← Seguir comprando</a>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="alert alert-info text-center">
                Tu carrito está vacío. <a href="{{ route('productos') }}">Ver productos</a>
            </div>
        @endif
    </div>
</section>
@endsection
