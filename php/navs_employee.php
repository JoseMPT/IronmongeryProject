<?php
session_start();
?>
<nav id="nav-desktop">
    <a href="employee_profile.php"><img class="icon" src="icons/home.svg" alt="inicio" title="INICIO"></a>
    <a class="nav-option" href="#">HERRAMIENTAS</a>
    <a class="nav-option" href="#">MATERIALES</a>
    <a class="nav-option" href="#">NOSOTROS</a>
    <a class="nav-option" href="#">CONTACTO</a>
    <a class="nav-option" href="#">ACERCA DE...</a>
    <!--<a href="#"><img class="icon" src="icons/carrito_de_compras.svg" alt="carrito" title="Carrito de compras"></a>-->
    <!--<a id="icon_login" href="user_login.php"><img class="icon" src="icons/usuario.svg" alt="login" title="Iniciar sesión"></a>-->
    <?php
    echo '<p>'.$_SESSION['user_email'].'</p>';
    ?>
    <a id="icon_logout_desktop" href="log_out.php"><img class="icon" src="icons/cerrar_sesion.svg" alt="log out" title="Cerrar sesión"></a>
</nav>

<nav id="nav-phone">
    <details>
        <summary><img class="icon" src="icons/menu.svg" alt="Desplegar"></summary>
        <a class="nav-option" href="#">HERRAMIENTAS</a>
        <a class="nav-option" href="#">MATERIALES</a>
        <a class="nav-option" href="#">NOSOTROS</a>
        <a class="nav-option" href="#">CONTACTO</a>
        <a class="nav-option" href="#">ACERCA DE...</a>
        <a id="icon_logout_phone" href="log_out.php"><img class="icon" src="icons/cerrar_sesion.svg" alt="log out" title="Cerrar sesión"></a>
    </details>
</nav>