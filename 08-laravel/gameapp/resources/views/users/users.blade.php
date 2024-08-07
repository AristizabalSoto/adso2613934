@extends('layouts.plantilla2')

@section('title', 'Users Module')
@section('class', 'cuerpo')

@section('content')
        <header>
            <section class="cabecera_users">
                <a href="{{ url('dashboard') }}">
                    <img class="icoback-users" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
                </a>
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
                    <nav class="nav">
                        <section class="contenedor_titulos_myprofile2">
                            {{-- Foto del usuario --}}
                            <div class="img_perfil_adm">
                                <img class="img_perfil_usuario" src="{{ Auth::user()->photo }}" alt="Profile Image">
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
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                                <a href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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


        <div class="search-box">
            <input id="qsearch" type="text" placeholder="Buscar">
            <i class="fas fa-filter filter-icon"></i>
        </div>

        <section class="scroll">
            <div class="botonuser">
                <form action="{{ url('users/create') }}">
                    <button class="btn-user" type="submit">
                        <img src="{{ asset('images/content-btn-add.svg') }}" alt="Add User">
                    </button>
                </form>
            </div>

            <div id="list">
                <section class="contenedor_modulos_dash">
                    @foreach ($users as $user)
                        <section class="contenedor_dash">
                            <section class="contenido_dash">
                                <img src="{{ asset('images/ico-users.png') }}" alt="User Icon" class="img-contenedor-dash">
                                <div class="texto-contenedor-dash">
                                    <div class="titulo_modulo">
                                        <p>{{ $user->fullname }}</p>
                                    </div>
                                    <div class="parrafo_modulo">
                                        <h3>{{ $user->role }}</h3>
                                    </div>
                                </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('header').addEventListener('click', function(event) {
                if (event.target.closest('.btn-burger')) {
                    document.querySelector('.btn-burger').classList.toggle('active');
                    document.querySelector('.nav').classList.toggle('active');
                }
            });
        });

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
