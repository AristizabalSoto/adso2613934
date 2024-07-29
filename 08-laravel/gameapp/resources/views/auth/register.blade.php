{{-- gameeapp/resources/views/auth/register.blade.php --}}


@extends('layouts.plantilla2')

@section('title', 'Register')
@section('class', 'cuerpo')

@section('content')
    <header>
        <section class="cabecera_register">
            <div>
                <a href="{{ url('catalogue') }}">
                    <img class="icoback" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
                </a>
                <img class="logotitulo" src="{{ asset('images/logo-cabecera_register.svg') }}" alt="Logo">
            </div>
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
                        <a href="{{ url('login') }}">
                            <img src="{{ asset('images/ico-menu-login.png') }}" alt="Login Icon">
                            Login
                        </a>
                        <hr>
                        <a href="{{ url('catalogue') }}">
                            <img src="{{ asset('images/ico-menu-catalogue.png') }}" alt="Home Icon">
                            Catalogue
                        </a>
                        <hr>
                    </menu>
                </nav>
            </div>
        </section>
    </header>

    <section class="scroll">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data"
            class="contenedor_titulos_cajas_register">
            @csrf
            <div id="imagenContenedor">
                <div id="uploadText">
                    <p>Upload Photo</p>
                </div>
                <img class="img_perfil_usuario" src="{{ asset('images/transparent.png') }}" alt="">
                <input type="file" id="inputFile" name="photo" accept="image/*">
            </div>

            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Fullname</h3>
                </label>
                <div class="caja">
                    <input type="text" name="fullname" placeholder="Ingrese su nombre completo" required>
                </div>
            </section>
            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Gender</h3>
                </label>
                <div class="caja">
                    <div class="caja-radio">
                        <label class="radio-option">
                            <input type="radio" name="gender" value="male" required>
                            <span>Male</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="gender" value="female">
                            <span>Female</span>
                        </label>
                        <label class="radio-option">
                            <input type="radio" name="gender" value="other">
                            <span>Other</span>
                        </label>
                    </div>
                </div>

            </section>
            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Email</h3>
                </label>
                <div class="caja">
                    <input type="email" name="email" placeholder="Ingrese su email" required>
                </div>
            </section>
            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Phone</h3>
                </label>
                <div class="caja">
                    <input type="tel" name="phone" placeholder="Ingrese su teléfono" required>
                </div>
            </section>
            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Birthdate</h3>
                </label>
                <div class="caja">
                    <input type="date" name="birthdate" required>
                </div>
            </section>
            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Password</h3>
                </label>
                <div class="caja">
                    <input type="password" name="password" placeholder="Ingrese su contraseña" required>
                </div>
            </section>
            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Confirm Password</h3>
                </label>
                <div class="caja">
                    <input type="password" name="password_confirmation" placeholder="Confirme su contraseña" required>
                </div>
            </section>
            <div class="botonregister">
                <button type="submit" class="btn btn-explore">
                    <img class="content-btn2-footer" src="{{ asset('images/content-btn3-footer.svg') }}" alt="Explore">
                </button>
            </div>
        </form>
    </section>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('header').addEventListener('click', function(event) {
                if (event.target.classList.contains('btn-burger')) {
                    event.target.classList.toggle('active');
                    document.querySelector('.nav').classList.toggle('active');
                    document.querySelector('.contenido_menu').classList.toggle('oculto');
                }
            });

            document.querySelector('#inputFile').addEventListener('change', function(event) {
                var file = event.target.files[0];
                var reader = new FileReader();

                reader.onload = function(event) {
                    document.querySelector('#imagenContenedor img').src = event.target.result;
                    document.querySelector('#uploadText').style.display =
                    'none'; // Ocultar el texto de carga
                }

                reader.readAsDataURL(file);
            });

            // Permitir al usuario seleccionar una imagen al hacer clic en cualquier parte del contenedor
            document.querySelector('#imagenContenedor').addEventListener('click', function() {
                document.querySelector('#inputFile').click();
            });
        });
    </script>
@endsection
