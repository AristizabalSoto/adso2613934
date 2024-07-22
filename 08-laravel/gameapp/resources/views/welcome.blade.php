@extends('layouts.app')
@section('title', 'GameApp - Welcome')
@section('class', 'cuerpo')

@section('content')
    <header>
        <img src="{{ asset('images/logo-cabecera.svg') }}" alt="Logo">
    </header>
    <section class="slider owl-carousel owl-theme">
        <img class="item" src="{{ asset('images/slide01.png') }}" alt="Slide01">
        <img class="item" src="{{ asset('images/slide02.png') }}" alt="Slide02">
        <img class="item" src="{{ asset('images/slide03.png') }}" alt="Slide03">
    </section>
    <footer>      
        <a href="{{ url('catalogue') }}" class="btn btn-explore">
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
