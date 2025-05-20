@extends('layout.dashboard')

@section('content')
<div class="main-content">
    <h3 class="fw-bold text-primary mb-4">Editar Producto</h3>

    <form action="{{ route('dashboard.productos.actualizar', $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $producto->nombre) }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Categoría</label>
                <select name="categoria_id" class="form-select" required>
                    <option value="">Seleccione...</option>
                    @foreach($categorias as $cat)
                        <option value="{{ $cat->id }}" {{ $producto->categoria_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Precio</label>
                <input type="number" name="precio" class="form-control" value="{{ old('precio', $producto->precio) }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" value="{{ old('stock', $producto->stock) }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagen actual</label><br>
            @if($producto->imagen)
                <img src="{{ asset($producto->imagen) }}" class="img-thumbnail mb-2" style="width: 100px; height: 100px; object-fit: cover;">
            @else
                <p class="text-muted">No hay imagen</p>
            @endif
            <input type="file" name="imagen" class="form-control mt-2">
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Guardar cambios
            </button>
        </div>
    </form>
</div>
@endsection
