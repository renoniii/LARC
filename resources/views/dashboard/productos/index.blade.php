@extends('layout.dashboard')

@section('content')
<div class="main-content">
    <h3 class="fw-bold text-success mb-4">Gestión de Productos</h3>

    <div class="mb-4 text-end">
        <a href="{{ route('dashboard.productos.crear') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i>Agregar producto
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-success">
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Descripción</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td style="width: 80px;">
                        @if($producto->imagen)
                            <img src="{{ asset($producto->imagen) }}" alt="img" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                        @else
                            <span class="text-muted">Sin imagen</span>
                        @endif
                    </td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>
                    <td>${{ number_format($producto->precio, 0, ',', '.') }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>{{ Str::limit($producto->descripcion, 80) }}</td>

                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-1">
                            <a href="{{ route('dashboard.productos.editar', $producto->id) }}" class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('dashboard.productos.eliminar', $producto->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este producto?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
