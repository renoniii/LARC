@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #42956C, #36A9E1);
    }
    .login-card {
        width: 500px;
        margin: auto;
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 24px rgba(0,0,0,0.15);
    }
    .login-card .card-header {
        background-color: #ffffff;
        border-bottom: none;
        text-align: center;
        padding: 30px 20px 10px;
    }
    .login-card .card-header img {
        width: 120px;
        margin-bottom: 10px;
    }
    .login-card .card-header h4 {
        font-weight: bold;
        color: #42956C;
        margin: 0;
    }
    .login-card .card-body {
        background-color: #f8f9fa;
        padding: 30px;
    }
    .btn-larc {
        background: linear-gradient(to right, #42956C, #36A9E1);
        color: white;
        border: none;
        font-weight: 600;
    }
    .btn-larc:hover {
        opacity: 0.9;
        color: white;
    }
</style>

<div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="card login-card">
        <div class="card-header">
            <img src="{{ asset('img/logo.png') }}" alt="Logo LARC">
            <h4>Iniciar sesión</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autofocus>

                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password" required>

                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Recuérdame
                    </label>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-larc">Ingresar</button>
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