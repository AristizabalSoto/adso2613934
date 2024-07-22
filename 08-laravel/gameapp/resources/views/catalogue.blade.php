@extends('layouts.catal')
@section('title', 'GameApp - Welcome')
@section('class', 'cuerpo')

@section('content')
    <!-- cabecera -->
    <header>
        <section class="cabecera_cataloge">
            <a href="{{ url('/') }}">
                <img class="icoback" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
            </a>
            
            <img class="logotitulo" src="../images/ico-menu-title.svg" alt="Logo">

            <!-- Menú hamburguesa -->
            <div class="burger-menu">
                <svg class="btn-burger" viewBox="0 0 100 100" width="80">
                    <path class="line top"
                        d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
                    <path class="line middle" d="m 70,50 h -40" />
                    <path class="line bottom"
                        d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
                </svg>
                <nav class="nav">
                    <img class="ico-menu-title" src="../images/ico-menu-title.svg" alt="Menu">
                    <img class="ico-menu" src="../images/ico-menu.png" alt="Icon menu">
                    <menu class="contenido_menu">
                        <a href="{{ url('/') }}">
                            <img src="../images/ico-menu-home.png" alt="Home Icon">
                            Home
                        </a>
                        <hr>
                        <a href="{{ url('login') }}">
                            <img src="../images/ico-menu-login.png" alt="Login Icon">
                            Login
                        </a>
                        <hr>
                        <a href="{{ url('register') }}">
                            <img src="../images/ico-menu-register.png" alt="Register Icon">
                            Register
                        </a>
                        <hr>
                    </menu>
                </nav>
            </div>
        </section>
    </header>

    <!-- caja de busqueda -->
    <div class="search-box">
        <input type="text" placeholder="Buscar">
        <i class="fas fa-filter filter-icon"></i>
    </div>

    <!-- slider por categorias -->

    <!-- categoria 1 -->
    <div class="contenedor_titulo_caja_catalogue">
        <h3>Categories</h3>
    </div>
    <section class="slidercat">
        <section class="slider owl-carousel owl-theme">
            <div>
                <img class="item" src="../images/Slide-cat01.png" alt="Slide01">
                <a href="{{ url('view_game') }}">
                    <h4>ramboin six</h4>
                </a>
                <p>Lorem ipsum dolor sit.</p>
            </div>
            <div>
                <img class="item" src="../images/Slide-cat02.png" alt="Slide02">
                <a href="{{ url('view_game') }}">
                    <h4>Skyrym</h4>
                </a>
                <p>Lorem ipsum dolor sit.</p>
            </div>
        </section>
    </section>

    <!-- categoria 2 -->
    <div class="contenedor_titulo_caja_catalogue">
        <h3>Categories</h3>
    </div>
    <section class="slidercat">
        <section class="slider owl-carousel owl-theme">
            <div>
                <img class="item" src="../images/Slide-cat03.png" alt="Slide03">
                <a href="{{ url('view_game') }}">
                    <h4>Halo Reach</h4>
                </a>
                <p>Lorem ipsum dolor sit.</p>
            </div>
            <div>
                <img class="item" src="../images/Slide-cat04.png" alt="Slide04">
                <a href="{{ url('view_game') }}">
                    <h4>Resident Evil 4</h4>
                </a>
                <p>Lorem ipsum dolor sit.</p>
            </div>
        </section>
    </section>
@endsection

@section('js')
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 2
                }
            }
        })
        $('header').on('click', '.btn-burger', function() {
            $(this).toggleClass('active');
            $('.nav').toggleClass('active');
        });
    </script>
@endsection
