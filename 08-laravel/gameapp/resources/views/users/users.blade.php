{{-- Ubicación del archivo: gameapp/resources/views/auth/users.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'Users Module')
@section('class', 'cuerpo')

@section('content')
    <!-- Encabezado principal de la página -->
    <header>
        <section class="cabecera_users">
            <!-- Botón de retroceso -->
            <a href="{{ url('dashboard') }}">
                <img class="icoback-users" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
            </a>
            <!-- Logo del encabezado -->
            <img class="logotitulo-users" src="{{ asset('images/logo-cabecera_users.svg') }}" alt="Logo">

            <!-- Menú hamburguesa -->
            <div class="burger-menu">
                <svg class="btn-burger" viewBox="0 0 100 100" width="80">
                    <path class="line top"
                        d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
                    <path class="line middle" d="m 70,50 h -40" />
                    <path class="line bottom"
                        d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
                </svg>
                <!-- Navegación del menú hamburguesa -->
                <nav class="nav">
                    <section class="contenedor_titulos_myprofile2">
                        {{-- Foto del usuario --}}
                        <div class="img_perfiles">
                            <img class="img_perfil_usuario"
                                src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('images/no-photo.png') }}"
                                alt="Profile Image">
                        </div>
                        {{-- Datos del usuario --}}
                        <section>
                            <div>
                                {{-- Nombre del usuario --}}
                                <div class="titulo_myprofile">
                                    <p>{{ Auth::user()->fullname }}</p>
                                    <!-- Muestra el nombre del usuario autenticado -->
                                </div>
                                {{-- Rol del usuario --}}
                                <div class="boton_role"> <!-- Muestra el rol del usuario autenticado -->
                                    <div>
                                        <p>{{ Auth::user()->role }}</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Menú de navegación del perfil -->
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
                            <!-- Formulario para cerrar sesión -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <img src="{{ asset('images/ico-logout.png') }}" alt="Log Out Icon">
                                LogOut
                            </a>
                            <hr>
                        </menu>
                    </section>
                </nav>
            </div>
        </section>
    </header>
    
    <section class="scroll">
    <!-- Caja de búsqueda -->
    <div class="search-box">
        <input id="qsearch" type="text" placeholder="Buscar">
        <i class="fas fa-filter filter-icon"></i>
    </div>

    <!-- Sección de lista de usuarios -->

        <!-- Botón para agregar un nuevo usuario -->
        <div class="botonuser">
            <form action="{{ url('users/create') }}">
                <button class="btn-user" type="submit">
                    <img src="{{ asset('images/content-btn-add.svg') }}" alt="Add User">
                </button>
            </form>
        </div>

        <!-- Lista de usuarios -->
        <div id="list">
            <section class="contenedor_modulos_dash">
                @foreach ($users as $user)
                    <section class="contenedor_dash">
                        <section class="contenido_dash">
                            <!-- Contenedor para la imagen de perfil en miniatura -->
                            <div class="img_perfil_miniatura">
                                <img class="img_perfil_usuario_miniatura"
                                    src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/no-photo.png') }}"
                                    alt="User Thumbnail">
                            </div>
                            <!-- Texto del contenedor de usuario -->
                            <div class="texto-contenedor-dash">
                                <div class="titulo_modulo">
                                    <h4>{{ $user->fullname }}</h4>
                                </div>
                                <div class="parrafo_modulo">
                                    <p>{{ $user->role }}</p>
                                </div>
                            </div>
                            <!-- Botón para ver más detalles del usuario -->
                            <div class="boton_view_dash">
                                <a href="{{ url('users/' . $user->id . '/edit') }}" class="btn btn-explore">
                                    <img class="content-btn-view-dash"
                                        src="{{ asset('images/content-btn-view-users.svg') }}" alt="View User">
                                </a>
                            </div>
                        </section>
                    </section>
                @endforeach
            </section>
        </div>
    </section>
@endsection

@section('js')
    <script>
        // Script para el menú hamburguesa
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('header').addEventListener('click', function(event) {
                if (event.target.closest('.btn-burger')) {
                    document.querySelector('.btn-burger').classList.toggle('active');
                    document.querySelector('.nav').classList.toggle('active');
                }
            });
        });

        // Script para búsqueda en tiempo real
        $(document).ready(function() {
            $('body').on('keyup', '#qsearch', function(e) {
                e.preventDefault();
                var query = $(this).val();
                var token = '{{ csrf_token() }}';

                $.post('/users/search', {
                    query: query,
                    _token: token
                }, function(data) {
                    $('#list').html(data);
                });
            });
        });
    </script>
@endsection
