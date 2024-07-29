{{-- gameeapp/resources/views/users/users.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'Users Module')
@section('class', 'cuerpo')

@section('content')
    <!-- Contenido principal -->
    <main class="cuerpo">
        <!-- Cabecera -->
        <header>
            <section class="cabecera_users">
                <!-- Botón de retroceso -->
                <a href="{{ url('dashboard') }}">
                    <img class="icoback-users" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
                </a>

                <!-- Logo de la cabecera -->
                <img class="logotitulo-users" src="{{ asset('images/logo-cabecera_users.svg') }}" alt="Logo">

                <!-- Menú hamburguesa -->
                <div class="burger-menu">
                    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
                        <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
                        <path class="line middle" d="m 70,50 h -40" />
                        <path class="line bottom" d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
                    </svg>

                    <!-- Navegación del menú hamburguesa -->
                    <nav class="nav">
                        <section class="contenedor_titulos_myprofile2">
                            <!-- Imagen del perfil -->
                            <div class="img_perfil_adm">
                                <img class="img_perfil_usuario" src="{{ asset('images/perfilusuario2.png') }}" alt="Profile Image">
                            </div>

                            <!-- Información del usuario -->
                            <section>
                                <div>
                                    <div class="titulo_myprofile">
                                        <h3>Jeremias Juper</h3>
                                    </div>
                                    <div class="botonprofyle">
                                        <a href="{{ url('catalogue') }}" class="btn btn-explore">
                                            <img class="content-btn4-myprofyle" src="{{ asset('images/content-btn4-footer.svg') }}" alt="Explore">
                                        </a>
                                    </div>
                                </div>
                            </section>

                            <!-- Menú de navegación -->
                            <menu class="contenedor_titulo_myprofile">
                                <a href="{{ url('profile') }}">
                                    <img src="{{ asset('images/ico-profyle.png') }}" alt="Profile Icon">
                                    My Profile
                                </a>
                                <hr>
                                <a href="{{ url('dashboard') }}">
                                    <img src="{{ asset('images/ico-conf.png') }}" alt="Dashboard Icon">
                                    Dashboard
                                </a>
                                <hr>
                                <a href="{{ url('logout') }}">
                                    <img src="{{ asset('images/ico-logout.png') }}" alt="Logout Icon">
                                    LogOut
                                </a>
                                <hr>
                            </menu>
                        </section>
                    </nav>
                </div>
            </section>
        </header>

        <!-- Contenido principal -->
        <section class="scroll">
            <!-- Botón para añadir usuario -->
            <div class="botonuser">
                <form action="{{ url('add') }}">
                    <button class="btn-user" type="submit">
                        <img src="{{ asset('images/content-btn-add.svg') }}" alt="Add User">
                    </button>
                </form>
            </div>

            <!-- Contenedor de usuarios -->
            <section class="contenedor_modulos_dash">
                @foreach ($users as $user)
                    <section class="contenedor_dash">
                        <section class="contenido_dash">
                            <img src="{{ asset('images/ico-users.png') }}" alt="User Icon" class="img-contenedor-dash">
                            <div class="texto-contenedor-dash">
                                <div class="titulo_modulo">
                                    <p>{{ $user->name }}</p>
                                </div>
                                <div class="parrafo_modulo">
                                    <h3>{{ $user->role }}</h3>
                                </div>
                            </div>
                            <div class="boton_view_dash">
                                <a href="{{ url('edit/' . $user->id) }}" class="btn btn-explore">
                                    <img class="content-btn-view-dash" src="{{ asset('images/content-btn-view-users.svg') }}" alt="View User">
                                </a>
                            </div>
                        </section>
                    </section>
                @endforeach
            </section>
        </section>
    </main>
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
