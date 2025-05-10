@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="card login-card text-center">
        <div class="card-header">
            <img src="{{ asset('img/logo.png') }}" alt="Logo LARC">
            <h4>Bienvenido</h4>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <p class="mb-4">Has iniciado sesión correctamente.</p>

            <a href="{{ route('inicio') }}" class="btn btn-larc">Ir a la página</a>
        </div>
    </div>
</div>
@endsection
