@extends('layout.dashboard')

@section('content')
<div class="container mt-4">
    <h2 class="fw-bold mb-4">Mensajes de Contacto</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($mensajes->isEmpty())
        <p>No hay mensajes aún.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Mensaje</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mensajes as $mensaje)
                        <tr>
                            <td>{{ $mensaje->id }}</td>
                            <td>{{ $mensaje->nombre }}</td>
                            <td>{{ $mensaje->correo }}</td>
                            <td>{{ $mensaje->mensaje }}</td>
                            <td>{{ $mensaje->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection