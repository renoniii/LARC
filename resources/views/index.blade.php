@extends('layout.app')

@section('content')
  <!-- Hero -->
  <section class="hero">
    <!-- Carrusel -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
    
        <!-- Primer slide con degradado -->
        <div class="carousel-item active">
            <div class="hero d-flex flex-column justify-content-center align-items-center text-center">
            <div class="container">
                <h1 class="display-4 fw-bold">Bienvenidos a LARC</h1>
                <p class="lead">Dotaciones, Suministros y Obras para un entorno limpio y eficiente.</p>
                <a href="/productos" class="btn btn-larc btn-lg mt-3">Ver productos</a>
            </div>
            </div>
        </div>
    
        <!-- Segundo slide con imagen -->
        <div class="carousel-item">
            <img src="{{ asset('img/slidepic1.png') }}" alt="LARC SLIDE">
        </div>
    
        <!-- Tercer slide con imagen -->
        <div class="carousel-item">
            <img src="img/slide3.jpg" class="d-block w-100" alt="Slide 3">
        </div>
    
        </div>
    
        <!-- Controles -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        </button>
    </div>
  
  </section>

  <!-- Sección de productos -->
  <section class="py-5" id="productos">
    <div class="container">
      <h2 class="section-title text-center mb-4 fw-bold">Nuestros Productos</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title fw-bold">Jabones Industriales</h5>
              <p class="card-text">Limpieza profunda y rendimiento superior.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title fw-bold">Escobas y Traperos</h5>
              <p class="card-text">Herramientas resistentes para limpieza diaria.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title fw-bold">Papelería Institucional</h5>
              <p class="card-text">Todo en artículos esenciales de oficina.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection