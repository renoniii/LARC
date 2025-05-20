@extends('layout.app')

@section('content')
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5 fw-bold">Mis Pedidos</h2>

        @guest
            <div class="alert alert-warning text-center">
                <strong>Debes iniciar sesión</strong> para ver tu historial de pedidos.<br>
                <a href="{{ route('login') }}" class="btn btn-degradado mt-3">Iniciar sesión</a>
            </div>
        @else
            @if($ordenes->isEmpty())
                <div class="text-center text-muted">
                    <i class="bi bi-box-seam" style="font-size: 3rem;"></i>
                    <p class="mt-2">Aún no tienes pedidos registrados.</p>
                </div>
            @else
                <div class="row g-4">
                    @foreach($ordenes as $orden)
                        <div class="col-md-6 col-lg-4">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="card-body">
                                    <h5 class="fw-bold mb-2" style="color: var(--larc-green);">
                                        <i class="bi bi-receipt-cutoff me-2"></i>Pedido #{{ $orden->id }}
                                    </h5>
                                    <p class="mb-1 text-muted">
                                        <i class="bi bi-calendar-event me-1"></i>
                                        {{ $orden->created_at->format('d/m/Y H:i') }}
                                    </p>
                                    <p class="mb-1">
                                        <i class="bi bi-geo-alt me-1"></i>
                                        <strong>Dirección:</strong> {{ $orden->direccion }}
                                    </p>
                                    <p class="mb-1">
                                        <i class="bi bi-telephone me-1"></i>
                                        <strong>Teléfono:</strong> {{ $orden->telefono }}
                                    </p>
                                    <p class="mb-2">
                                        <i class="bi bi-basket me-1"></i>
                                        <strong>Productos:</strong>
                                    </p>
                                    <ul class="list-unstyled small ps-3 mb-3">
                                        @foreach($orden->productos as $prod)
                                            <li>• {{ $prod['nombre'] }} x{{ $prod['cantidad'] }}</li>
                                        @endforeach
                                    </ul>
                                    <div class="text-end">
                                        <span class="fw-bold text-success fs-5">
                                            Total: ${{ number_format($orden->total, 0, ',', '.') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endguest
    </div>
</section>
@endsection