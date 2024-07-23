<!-- Usa el layout 'plantilla1' -->
@extends('layouts.plantilla1')

<!-- Título de la página -->
@section('title', 'Welcome')

<!-- Clase para <main> -->
@section('class', 'cuerpo')

@section('content')
    <!-- Encabezado con logo -->
    <header>
        <img src="{{ asset('images/logo-cabecera.svg') }}" alt="Logo">
    </header>

    <!-- Sección del carrusel -->
    <section class="slider owl-carousel owl-theme">
        <img class="item" src="{{ asset('images/slide01.png') }}" alt="Slide01">
        <img class="item" src="{{ asset('images/slide01.png') }}" alt="Slide02">
        <img class="item" src="{{ asset('images/slide01.png') }}" alt="Slide03">
    </section>

    <!-- Pie de página con botón de exploración -->
    <footer>
        <a href="{{ route('catalogue') }}" class="btn btn-explore">
            <img class="content-btn-footer" src="{{ asset('images/content-btn-footer.svg') }}" alt="explore">
        </a>
    </footer>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    }
                }
            });
        });
    </script>
@endsection
