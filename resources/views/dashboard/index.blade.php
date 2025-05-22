@extends('layout.dashboard')

@section('content')

<div class="main-content">
    <h3 class="fw-bold text-success mb-4"><i class="bi bi-speedometer2 me-2"></i>Panel de Administración</h3>

    <div class="row g-4">
        {{-- Productos --}}
        <div class="col-lg-3 col-md-4 col-6">
            <div class="card border-0 shadow-sm h-100 text-center">
                <div class="card-body">
                    <i class="bi bi-basket-fill fs-1 text-success mb-2"></i>
                    <h6 class="mb-0">Productos</h6>
                    <span class="fw-bold fs-5">{{ $totalProductos }}</span>
                </div>
            </div>
        </div>

        {{-- Usuarios --}}
        <div class="col-lg-3 col-md-4 col-6">
            <div class="card border-0 shadow-sm h-100 text-center">
                <div class="card-body">
                    <i class="bi bi-people-fill fs-1 text-primary mb-2"></i>
                    <h6 class="mb-0">Usuarios</h6>
                    <span class="fw-bold fs-5">{{ $totalUsuarios }}</span>
                </div>
            </div>
        </div>

        {{-- Categorías --}}
        <div class="col-lg-3 col-md-4 col-6">
            <div class="card border-0 shadow-sm h-100 text-center">
                <div class="card-body">
                    <i class="bi bi-folder-fill fs-1 text-warning mb-2"></i>
                    <h6 class="mb-0">Categorías</h6>
                    <span class="fw-bold fs-5">{{ $totalCategorias }}</span>
                </div>  
            </div>
        </div>

        {{-- Ordenes --}}
        <div class="col-lg-3 col-md-4 col-6">
            <div class="card border-0 shadow-sm h-100 text-center">
                <div class="card-body">
                    <i class="bi bi-cart-check-fill fs-1 text-danger mb-2"></i>
                    <h6 class="mb-0">Ordenes</h6>
                    <span class="fw-bold fs-5">{{ $totalOrdenes }}</span>
                </div>
            </div>
        </div>

         {{-- Mensajes --}}
        <div class="col-lg-3 col-md-4 col-6">
            <div class="card border-0 shadow-sm h-100 text-center">
                <div class="card-body">
                    <i class="bi bi-envelope-fill fs-1 text-info mb-2"></i>
                    <h6 class="mb-0">Mensajes</h6>
                    <span class="fw-bold fs-5">{{ $totalMensajes }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-5 shadow-sm border-0">
        <div class="card-header bg-light fw-semibold">
            Bienvenido, <strong>{{ Auth::user()->name }}</strong>
        </div>
        <div class="card-body">
            <p>Desde este panel puedes gestionar los recursos del sitio <strong>LARC</strong>: productos, usuarios, categorías, pedidos y más.</p>
        </div>
    </div>
</div>

@endsection