@guest
    <nav class="nav">
        <img class="ico-menu-title" src="{{ asset('images/ico-menu-title.svg') }}" alt="Menu">
        <img class="ico-menu" src="{{ asset('images/ico-menu.png') }}" alt="Icon menu">
        <menu class="contenido_menu">
            <a href="{{ url('./login') }}">
                <img src="{{ asset('images/ico-menu-login.png') }}" alt="Login Icon">
                Login
            </a>
            <hr>
            <a href="{{ url('./register') }}">
                <img src="{{ asset('images/ico-menu-register.png') }}" alt="Register Icon">
                Register
            </a>
            <hr>
            <a href="{{ url('./catalogue') }}">
                <img src="{{ asset('images/ico-menu-catalogue.png') }}" alt="Home Icon">
                Catalogue
            </a>
            <hr>
        </menu>
    </nav>
@endguest

@auth
    <nav class="nav">
        <section class="contenedor_titulos_myprofile2">
            <div class="img_perfil_adm">
                <img class="img_perfil_usuario" src="../images/perfilusuario2.png" alt="img perfil">
            </div>
            <section>
                <div>
                    <div class="titulo_myprofile">
                        <h3>Jeremias Juper</h3>
                    </div>
                    <div class="botonprofyle">
                        <a href="../pages/catalogue.html" class="btn btn-explore">
                            <img class="content-btn4-myprofyle" src="../images/content-btn4-footer.svg" alt="explore">
                        </a>
                    </div>
                </div>
            </section>
            <menu class="contenedor_titulo_myprofile">
                <a href="../pages/profile.html">
                    <img src="../images/ico-profyle.png" alt="Home Icon">
                    My Profyle
                </a>
                <hr>
                <a href="../pages/dashboard2.html">
                    <img src="../images/ico-conf.png" alt="Login Icon">
                    Dashboard
                </a>
                <hr>
                <a href="../index.html">
                    <img src="../images/ico-logout.png" alt="Catalogue Icon">
                    LogOut
                </a>
                <hr>
            </menu>
        </section>
    </nav>

@endauth
