{{-- gameeapp/resources/views/auth/login.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'Login')
@section('class', 'cuerpo')

@section('content')
    <!-- Cabecera -->
    <header>
        <section class="cabecera_login">
            <a href="{{ url('catalogue') }}">
                <img class="icoback-login" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
            </a>
            <img class="logotitulo-login" src="{{ asset('images/logo-cabecera_login.svg') }}" alt="Logo">

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
                    <img class="ico-menu-title" src="{{ asset('images/ico-menu-title.svg') }}" alt="Menu">
                    <img class="ico-menu" src="{{ asset('images/ico-menu.png') }}" alt="Icon menu">
                    <menu class="contenido_menu oculto">
                        <a href="{{ url('register') }}">
                            <img src="{{ asset('images/ico-menu-register.png') }}" alt="Register Icon">
                            Register
                        </a>
                        <hr>
                        <a href="{{ url('catalogue') }}">
                            <img src="{{ asset('images/ico-menu-catalogue.png') }}" alt="Catalogue Icon">
                            Catalogue
                        </a>
                        <hr>
                    </menu>
                </nav>
            </div>
        </section>
    </header>

    <!-- Contenido LOGIN -->
    <section class="scroll">
        {{-- Validador de errores --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="contenedor_titulos_cajas_login">
            @csrf
            <div class="contenedor_titulo_caja_login">
                <label class="titulo_login">
                    <img src="{{ asset('images/ico-email.png') }}" alt="Email Icon">
                    <h3>Email</h3>
                </label>
                <div class="caja">
                    <input type="email" name="email" placeholder="Ingrese su correo" required>
                </div>
            </div>
            <div class="contenedor_titulo_caja_login">
                <label class="titulo_login">
                    <img src="{{ asset('images/ico-password.png') }}" alt="Password Icon">
                    <h3>Password</h3>
                </label>
                <div class="caja">
                    <img class="ico-eye" src="{{ asset('images/ico-eye.svg') }}" alt="Show Password">
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
            </div>
            <footer>
                <div class="botonlogin">
                    <button type="submit" class="btn btn-explore">
                        <img class="content-btn2-footer" src="{{ asset('images/content-btn2-footer.svg') }}" alt="Login">
                    </button>
                    <a class="recordar_contraseña" href="#">Forgot your password?</a>
                </div>
            </footer>
        </form>
    </section>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Menú hamburguesa
            const burgerButton = document.querySelector('.btn-burger');
            const nav = document.querySelector('.nav');
            const menu = document.querySelector('.contenido_menu');

            burgerButton.addEventListener('click', function () {
                burgerButton.classList.toggle('active');
                nav.classList.toggle('active');
                menu.classList.toggle('oculto');
            });

            // Mostrar/ocultar contraseña
            let togglePass = false;
            document.querySelector('.ico-eye').addEventListener('click', function () {
                const passwordInput = this.nextElementSibling;
                togglePass = !togglePass;
                passwordInput.type = togglePass ? 'text' : 'password';
                this.src = togglePass ? '{{ asset('images/ico-eye-closed.svg') }}' : '{{ asset('images/ico-eye.svg') }}';
            });
        });
    </script>
@endsection
