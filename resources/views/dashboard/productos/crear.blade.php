@extends('layout.dashboard')

@section('content')
<div class="main-content">
    <h3 class="fw-bold text-success mb-4">Agregar Producto</h3>

    <form action="{{ route('dashboard.productos.guardar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Categoría</label>
                <select name="categoria_id" class="form-select" required>
                    <option value="">Seleccione...</option>
                    @foreach($categorias as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Precio</label>
                <input type="number" name="precio" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagen (opcional)</label>
            <input type="file" name="imagen" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3"></textarea>
        </div>


        <div class="text-end">
            <button type="submit" class="btn btn-success"><i class="bi bi-save me-1"></i>Guardar</button>
        </div>
    </form>
</div>
@endsection