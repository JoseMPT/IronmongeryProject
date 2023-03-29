<?php
echo '
<nav id="nav-desktop">
    <a href="index.php"><img class="icon" src="icons/home.svg" alt="inicio" title="HOME"></a>
    <a class="nav-option" href="nosotros.php">ABOUT US</a>
    <a id="icon_login" href="user_login.php"><img class="icon" src="icons/usuario.svg" alt="login" title="Log in"></a>
    <!--<a href="log_out.php"><img class="icon" src="icons/cerrar_sesion.svg" alt="log out" title="Cerrar sesión"></a>-->
</nav>

<nav id="nav-phone">
    <details>
        <summary><img class="icon" src="icons/menu.svg" alt="Desplegar"></summary>
        <a class="nav-option" href="nosotros.php">NOSOTROS</a>
        <!--<a href="log_out.php"><img class="icon" src="icons/cerrar_sesion.svg" alt="log out" title="Cerrar sesión"></a>-->
    </details>
</nav>';