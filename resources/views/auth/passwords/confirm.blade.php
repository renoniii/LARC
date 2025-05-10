@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="card login-card">
        <div class="card-header">
            <img src="{{ asset('img/logo.png') }}" alt="Logo LARC">
            <h4>Confirmar contraseña</h4>
        </div>
        <div class="card-body">
            <p class="mb-4">Por seguridad, por favor ingresa tu contraseña antes de continuar.</p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password" required>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-larc">Confirmar</button>
                </div>

                @if (Route::has('password.request'))
                <div class="text-center mt-3">
                    <a href="{{ route('password.request') }}" class="text-decoration-none text-muted">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection