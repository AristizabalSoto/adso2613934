@extends('layouts.app')
@section('title', 'GameApp - Welcome')
@section('class', 'cuerpo')

@section('content')
    <header>
        <img src="./images/logo-cabecera.svg" alt="Logo">
    </header>
    <section class="slider owl-carousel owl-theme">
        <img class="item" src="images/slide01.png" alt="Slide01">
        <img class="item" src="images/slide01.png" alt="Slide02">
        <img class="item" src="images/slide01.png" alt="Slide03">
    </section>
    <footer>      

        <a href="{{ url('catalogue') }}" class="btn btn-explore">
            <img class="content-btn-footer" src="images/content-btn-footer.svg"="explore">
        </a>
        
    </footer>
@endsection

@section('js')
    <Script>
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
        })
    </Script>
@endsection
