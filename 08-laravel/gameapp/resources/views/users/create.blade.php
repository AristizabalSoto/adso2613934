{{-- gameeapp/resources/views/auth/create.blade.php --}}

@extends('layouts.plantilla2')

@section('title', 'Create')
@section('class', 'cuerpo')

@section('content')
    <header>
        <section class="cabecera_add">
            <div>
                <a href="{{ url('users') }}">
                    <img class="icoback-add" src="{{ asset('images/btn_back.png') }}" alt="Back Button">
                </a>
                <img class="logotitulo" src="{{ asset('images/logo-cabecera_add.svg') }}" alt="Logo">
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
                                        <img class="content-btn4-myprofyle"
                                            src="{{ asset('images/content-btn4-footer.svg') }}" alt="Explorar">
                                    </a>
                                </div>
                            </div>
                        </section>
                        <menu class="contenedor_titulo_myprofile">
                            <a href="{{ url('profile') }}">
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
                            <a href="./."
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

    <!-- Registro -->
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
        <form action="{{ route('dashboard') }}" method="get" class="contenedor_titulos_cajas_register">

            <!-- contenedor con forma -->
            <div id="imagenContenedor">
                <div id="uploadText">
                    <p>Upload Photo</p>
                </div>
                <img class="img_perfil_usuario" src="{{ asset('images/transparent.png') }}" alt="">
                <input type="file" id="inputFile" name="photo" accept="image/*" style="display:none;">
            </div>

            <!-- contenedores input -->
            <section class="contenedor_titulo_caja_register">
                <label class="titulo_register">
                    <h3>Fullname</h3>
                </label>
                <div class="caja">
                    <input type="text" name="fullname" placeholder="Ingrese su nombre" required>
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
                    <h3>Birth Date</h3>
                </label>
                <div class="caja">
                    <input type="date" name="birth_date" placeholder="Ingrese su fecha de nacimiento" required>
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
            <footer>
                <div class="botonregister">
                    <button type="submit" class="btn btn-explore">
                        <img class="content-btn2-footer" src="{{ asset('images/content-btn-add.svg') }}" alt="Explore">
                    </button>
                </div>
            </footer>
        </form>
    </section>
    </main>

@section('js')
    <script>
        $('header').on('click', '.btn-burger', function() {
            $(this).toggleClass('active');
            $('.nav').toggleClass('active');
            $('.contenido_menu').toggleClass('oculto');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#inputFile').on('change', function(event) {
                var file = event.target.files[0];
                var reader = new FileReader();

                reader.onload = function(event) {
                    $('#imagenContenedor').find('img').attr('src', event.target.result);
                    $('#uploadText').hide(); // Ocultar el texto de carga
                }

                reader.readAsDataURL(file);
            });

            // Permitir al usuario seleccionar una imagen al hacer clic en cualquier parte del contenedor
            $('#imagenContenedor').click(function() {
                $('#inputFile').click();
            });
        });
    </script>
@endsection
@endsection
