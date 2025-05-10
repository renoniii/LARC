@extends('layout.dashboard')

@section('content')
<div class="main-content">
  <h3 class="fw-bold text-danger mb-4">Mensajes de Contacto</h3>

  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
      <thead class="table-danger">
        <tr>
          <th>Nombre</th>
          <th>Email</th>
          <th>Mensaje</th>
          <th>Fecha</th>
        </tr>
      </thead>
      <tbody>
        {{-- @foreach($mensajes as $mensaje) --}}
        <tr>
          <td>Jorge Herrera</td>
          <td>jorgeh@correo.com</td>
          <td>Quisiera saber si hacen entregas institucionales en Bucaramanga.</td>
          <td>2025-05-10</td>
        </tr>
        {{-- @endforeach --}}
      </tbody>
    </table>
  </div>
</div>
@endsection
