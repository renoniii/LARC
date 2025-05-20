@extends('layout.app')

@section('content')
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4 fw-bold section-title">Proceso de Checkout</h2>

        <div class="row">
            {{-- Resumen del pedido --}}
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header text-white fw-bold" style="background: linear-gradient(to right, #42956C, #36A9E1);">
                        Resumen de Pedido
                    </div>
                    <div class="card-body">
                        @if(session('carrito') && count(session('carrito')) > 0)
                            <ul class="list-group mb-3">
                                @foreach(session('carrito') as $item)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong>{{ $item['nombre'] }}</strong><br>
                                            <small>Cantidad: {{ $item['cantidad'] }}</small>
                                        </div>
                                        <span>${{ number_format($item['precio'] * $item['cantidad'], 0, ',', '.') }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <h5 class="text-end fw-bold" style="color: #42956C;">
                                Total: ${{ number_format(array_sum(array_map(fn($i) => $i['precio'] * $i['cantidad'], session('carrito'))), 0, ',', '.') }}
                            </h5>
                        @else
                            <p class="text-muted">Tu carrito está vacío.</p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Formulario de datos --}}
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header text-white fw-bold" style="background: linear-gradient(to right, #42956C, #00A1AF);">
                        Datos del Cliente
                    </div>
                    <div class="card-body">
                        <form action="{{ route('checkout.procesar') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre completo</label>
                                <input type="text" name="nombre" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección de entrega</label>
                                <input type="text" name="direccion" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" name="telefono" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-degradado w-100 fw-bold">
                                Confirmar Compra
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection