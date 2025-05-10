@extends('layout.app')

@section('content')

<!-- Sección Contacto -->
<section class="py-5">
    <div class="container">
      <h2 class="section-title text-center fw-bold mb-4">Contáctanos</h2>
      <div class="row">
        <div class="col-md-6 mb-4">
          <form>
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre completo</label>
              <input type="text" class="form-control" id="nombre" required>
            </div>
            <div class="mb-3">
              <label for="correo" class="form-label">Correo electrónico</label>
              <input type="email" class="form-control" id="correo" required>
            </div>
            <div class="mb-3">
              <label for="mensaje" class="form-label">Mensaje</label>
              <textarea class="form-control" id="mensaje" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-degradado">Enviar mensaje</button>
          </form>
        </div>
        <div class="col-md-6">
          <h5 class="fw-bold mb-3">Información de contacto</h5>
          <p><strong>Teléfono:</strong> (7) 634 824698</p>
          <p><strong>Correo:</strong> contacto@larc.com.co</p>
          <p><strong>Dirección:</strong> Calle C #35-41, Bucaramanga, Colombia</p>
          <div class="mt-3">
            <iframe src="https://www.google.com/maps?q=Bucaramanga,+Colombia&output=embed" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
      </div>
    </div>
</section>
 
@endsection