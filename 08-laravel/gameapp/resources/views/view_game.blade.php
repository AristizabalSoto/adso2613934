@extends('layouts.catal')
@section('title', 'GameApp - View Game')
@section('class', 'cuerpo')

@section('content')
    <!-- cabecera -->
    <header>
        <section class="cabecera_view_game">
            <div>
                <a href="{{ url('catalogue') }}">
                    <img class="icoback" src="../images/btn_back.png" alt="Back Button">
                </a>
                <img class="logotitulo" src="../images/logo-cabecera_view.svg" width="200px" alt="Logo">
            </div>

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
                    <menu class="contenido_menu oculto">
                        <a href="../index.html">
                            <img src="../images/ico-menu-home.png" alt="Home Icon">
                            Home
                        </a>
                        <hr>
                        <a href="./login.html">
                            <img src="../images/ico-menu-login.png" alt="Login Icon">
                            Login
                        </a>
                        <hr>
                        <a href="./catalogue.html">
                            <img src="../images/ico-menu-catalogue.png" alt="Catalogue Icon">
                            Catalogue
                        </a>
                        <hr>
                    </menu>
                </nav>
            </div>
        </section>
    </header>
    <!-- LOGIN -->

    <section class="contenedor_titulos_parrafos_view">
        <div>
            <img class="img_perfil_usuario" src="../images/caratula_view.png" alt="img perfil">
        </div>
        <section class="contenedor_titulo_view">
            <div class="titulo_view">
                <h3>Category</h3>
            </div>
            <div class="parrafo_view">
                <p>Nintendo</p>
            </div>
        </section>
        <section class="contenedor_titulo_view">
            <div class="titulo_view">
                <h3>Year</h3>
            </div>
            <div class="parrafo_view">
                <p>2024</p>
            </div>
        </section>
        <section class="contenedor_titulo_view">
            <div class="titulo_view">
                <h3>Description</h3>
            </div>
            <div class="parrafo_view">
                <p>Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum
                    dolor Lorem ipsum dolor</p>
            </div>
        </section>
    </section>
    <footer>
        <div class="botonview">
            <a href="./pages/catalogue.html" class="btn btn-explore">
                <img class="content-btn2-footer" src="../images/content-btn4-footer.svg" alt="explore">
            </a>
        </div>
    </footer>
@endsection

@section('js')
    <script>
        $('header').on('click', '.btn-burger', function() {
            $(this).toggleClass('active');
            $('.nav').toggleClass('active');
            $('.contenido_menu').toggleClass('oculto');
        });
    </script>
@endsection
