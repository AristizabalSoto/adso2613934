{{-- Ubicación: gameapp/resources/views/welcome.blade.php --}}

<!-- Usa el layout 'plantilla1' -->
@extends('layouts.plantilla1')

<!-- Título de la página -->
@section('title', 'Welcome')

<!-- Clase para <main> -->
@section('class', 'cuerpo')

<!-- Contenido principal -->
@section('content')
    <!-- Encabezado con logo -->
    <header>
        <img src="{{ asset('images/logo-cabecera.svg') }}" alt="Logo">
    </header>

    <!-- Sección del carrusel -->
    <section class="slider owl-carousel owl-theme">
        <!-- Imágenes del carrusel -->
        <img class="item" src="{{ asset('images/slide01.png') }}" alt="Slide01">
        <img class="item" src="{{ asset('images/slide02.png') }}" alt="Slide02">
        <img class="item" src="{{ asset('images/slide03.png') }}" alt="Slide03">
    </section>

    <!-- Pie de página con botón de exploración -->
    <footer>
        <a href="#" class="btn btn-explore">
            <img class="content-btn-footer" src="{{ asset('images/content-btn-footer.svg') }}" alt="explore">
        </a>
    </footer>

    <!-- Loader HTML -->
    <div class="loader" id="loader"></div>
@endsection

<!-- Sección para scripts JS específicos de esta vista -->
@section('js')
    <script>
        $(document).ready(function() {
            // Inicialización del carrusel
            $('.owl-carousel').owlCarousel({
                loop: true,           // Hace que el carrusel sea circular
                margin: 10,           // Espacio entre los elementos del carrusel
                nav: true,            // Muestra botones de navegación (anterior y siguiente)
                dots: false,          // Oculta los indicadores de puntos
                responsive: {
                    0: {
                        items: 1      // Muestra 1 elemento a la vez en pantallas pequeñas
                    }
                }
            });

            // Mostrar el loader y ocultar el contenido excepto <main> y el loader antes de redirigir
            $('.btn-explore').click(function(event) {
                event.preventDefault(); // Evita el comportamiento predeterminado del enlace
                $('body').addClass('hidden'); // Oculta el contenido excepto <main> y el loader
                $('#loader').show(); // Muestra el loader

                setTimeout(function() {
                    window.location.href = "{{ route('catalogue') }}"; // Redirige después de 2 segundos
                }, 2000);
            });
        });
    </script>
@endsection
