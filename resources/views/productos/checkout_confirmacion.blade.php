@extends('layout.app')

@section('content')
<section class="py-5 text-center">
    <div class="container">
        <div class="card shadow-sm border-0 p-5 mx-auto" style="max-width: 700px;">
            <div class="mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#42956C" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.97 11.03a.75.75 0 0 0 1.07 0l3.992-3.992a.75.75 0 1 0-1.06-1.06L7.5 9.439 5.53 7.47a.75.75 0 0 0-1.06 1.06l2.5 2.5z"/>
                </svg>
            </div>

            <h2 class="fw-bold" style="color: #42956C;">¡Compra realizada con éxito!</h2>
            <p class="lead mt-2 mb-4">Gracias por confiar en <strong>LARC</strong>. Tu pedido está siendo procesado.</p>

            @if(session('resumen'))
            <div class="text-start">
                <h5 class="fw-bold mb-3" style="color: #36A9E1;">Resumen del Pedido:</h5>
                <ul class="list-group mb-4">
                    @foreach(session('resumen') as $item)
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
                    Total: ${{ number_format(array_sum(array_map(fn($i) => $i['precio'] * $i['cantidad'], session('resumen'))), 0, ',', '.') }}
                </h5>
            </div>
            @endif

            <a href="{{ route('inicio') }}" class="btn btn-degradado mt-4 px-4 py-2">Volver al inicio</a>
        </div>
    </div>
</section>
@endsection