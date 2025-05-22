@extends('layout.app')

@section('content')
    <!-- Sección Nosotros -->
    <section class="py-5">
        <div class="container">
        <h2 class="section-title text-center fw-bold mb-4">Quiénes Somos</h2>
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
            <img src="{{ asset('img/nosotros.png') }}" alt="Nosotros" class="img-fluid rounded shadow-sm">
            </div>
            <div class="col-md-6">
            <p>LARC es una empresa dedicada a la distribución de dotaciones, suministros de aseo y servicios para obras civiles. Nuestro compromiso es ofrecer productos de alta calidad que contribuyan a la eficiencia, higiene y presentación de espacios laborales e institucionales.</p>
            <p>Con una trayectoria de más de 10 años en el mercado, trabajamos con responsabilidad, respeto y cumplimiento para garantizar la satisfacción de nuestros clientes.</p>
            <p><strong>Misión:</strong> Proveer soluciones efectivas en dotaciones y limpieza con productos confiables y servicio personalizado.</p>
            <p><strong>Visión:</strong> Ser líderes a nivel nacional en el suministro institucional, reconocidos por nuestra ética, innovación y atención al cliente.</p>
            </div>
        </div>
        </div>
    </section>

@endsection