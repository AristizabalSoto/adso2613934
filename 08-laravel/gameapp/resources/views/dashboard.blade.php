{{--ubicacion: gameeapp/resources/views/dashboard.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'Dashboard')
@section('class', 'cuerpo')

@section('content')

    <header>
        <section class="cabecera_dash">
            <img class="logotitulo-dash" src="{{ asset('images/logo-cabecera_dashboard.svg') }}" alt="Logo">

            <!-- Menú hamburguesa -->
            <div class="burger-menu">
                <svg class="btn-burger" viewBox="0 0 100 100" width="80">
                    <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
                    <path class="line middle" d="m 70,50 h -40" />
                    <path class="line bottom" d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
                </svg>
                <nav class="nav">
                    <section class="contenedor_titulos_myprofile2">
                        <div class="img_perfil_adm">
                            <img class="img_perfil_usuario" src="{{ asset('images/perfilusuario2.png') }}" alt="Perfil">
                        </div>
                        <section>
                            <div>
                                <div class="titulo_myprofile">
                                    <h3>Jeremias Juper</h3>
                                </div>
                                <div class="botonprofyle">
                                    <a href="{{ url('catalogue') }}" class="btn btn-explore">
                                        <img class="content-btn4-myprofyle" src="{{ asset('images/content-btn4-footer.svg') }}" alt="Explorar">
                                    </a>
                                </div>
                            </div>
                        </section>
                        <menu class="contenedor_titulo_myprofile">
                            <a href="{{ url('myprofile') }}">
                                <img src="{{ asset('images/ico-profyle.png') }}" alt="Ícono de perfil">
                                My Profile
                            </a>
                            <hr>
                            <a href="{{ url('dashboard') }}">
                                <img src="{{ asset('images/ico-conf.png') }}" alt="Ícono de dashboard">
                                Dashboard
                            </a>
                            <hr>
                            <!-- Formulario para el logout -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="./." onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <img src="{{ asset('images/ico-logout.png') }}" alt="Ícono de logout">
                                LogOut
                            </a>
                            <hr>
                        </menu>
                    </section>
                </nav>
            </div>
        </section>
    </header>

    <!-- Contenido del Dashboard -->
    <section class="contenedor_modulos_dash">
        <section class="contenedor_dash">
            <section class="contenido_dash">
                <img src="{{ asset('images/ico-menu-user-dash.png') }}" alt="Ícono de usuarios" class="img-contenedor-dash">
                <div class="texto-contenedor-dash">
                    <div class="titulo_modulo">
                        <p>module</p>
                    </div>
                    <div class="parrafo_modulo">
                        <h3>Users</h3>
                    </div>
                </div>
                <div class="boton_view_dash">
                    <a href="{{ url('users') }}" class="btn btn-explore">
                        <img class="content-btn-view-dash" src="{{ asset('images/btn-view-dash.png') }}" alt="Ver usuarios">
                    </a>
                </div>
            </section>
        </section>
        <section class="contenedor_dash">
            <section class="contenido_dash">
                <img src="{{ asset('images/ico-menu-cat-dash.png') }}" alt="Ícono de categorías" class="img-contenedor-dash">
                <div class="texto-contenedor-dash">
                    <div class="titulo_modulo">
                        <p>module</p>
                    </div>
                    <div class="parrafo_modulo">
                        <h3>Categories</h3>
                    </div>
                </div>
                <div class="boton_view_dash">
                    <a href="{{ url('categories') }}" class="btn btn-explore">
                        <img class="content-btn-view-dash" src="{{ asset('images/btn-view-dash.png') }}" alt="Ver categorías">
                    </a>
                </div>
            </section>
        </section>
        <section class="contenedor_dash">
            <section class="contenido_dash">
                <img src="{{ asset('images/ico-menu-games-dash.png') }}" alt="Ícono de juegos" class="img-contenedor-dash">
                <div class="texto-contenedor-dash">
                    <div class="titulo_modulo">
                        <p>module</p>
                    </div>
                    <div class="parrafo_modulo">
                        <h3>Games</h3>
                    </div>
                </div>
                <div class="boton_view_dash">
                    <a href="{{ url('games') }}" class="btn btn-explore">
                        <img class="content-btn-view-dash" src="{{ asset('images/btn-view-dash.png') }}" alt="Ver juegos">
                    </a>
                </div>
            </section>
        </section>
    </section>

@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('header').addEventListener('click', function(event) {
                if (event.target.closest('.btn-burger')) {
                    document.querySelector('.btn-burger').classList.toggle('active');
                    document.querySelector('.nav').classList.toggle('active');
                    document.querySelector('.contenido_menu').classList.toggle('oculto');
                }
            });
        });
    </script>
@endsection


