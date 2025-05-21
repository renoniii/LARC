@extends('layout.dashboard')

@section('content')
<div class="main-content">
  <h3 class="fw-bold text-danger mb-4">Historial de Pedidos</h3>

  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
      <thead class="table-danger">
        <tr>
          <th>Cliente</th>
          <th>Email</th>
          <th>Teléfono</th>
          <th>Total</th>
          <th>Fecha</th>
          <th>Productos</th>
        </tr>
      </thead>
      <tbody>
        @forelse($ordenes as $orden)
        <tr>
          <td>{{ $orden->user->name ?? 'N/A' }}</td>
          <td>{{ $orden->user->email ?? 'N/A' }}</td>
          <td>{{ $orden->telefono }}</td>
          <td>${{ number_format($orden->total, 0, ',', '.') }}</td>
          <td>{{ $orden->created_at->format('Y-m-d') }}</td>
          <td>
            <ul class="list-unstyled mb-0">
              @foreach($orden->productos as $nombre => $detalle)
                <li>{{ $detalle['cantidad'] }} × {{ $detalle['nombre'] }}</li>
              @endforeach
            </ul>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="text-center text-muted">No hay pedidos registrados.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection