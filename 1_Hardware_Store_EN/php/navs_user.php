<?php
//session_start();
?>
<nav id="nav-desktop">
    <a href="user_profile.php"><img class="icon" src="icons/home.svg" alt="inicio" title="HOME"></a>
    <a class="nav-option" href="user_tools.php">TOOLS</a>
    <a class="nav-option" href="user_materials.php">MATERIALS</a>
    <a class="nav-option" href="nosotros_user.php">ABOUT US</a>
    <a href="user_shopping_cart.php"><img class="icon" src="icons/carrito_de_compras.svg" alt="carrito" title="Shopping cart"></a>
    <!--<a id="icon_login" href="user_login.php"><img class="icon" src="icons/usuario.svg" alt="login" title="Iniciar sesión"></a>-->
    <!--<a href="user_settings_profile.php"><img class="icon" src="icons/settings.svg" alt="ajustes" title="Configuración"></a>-->
    <?php
    echo '<p>'.$_SESSION['user_email'].'</p>';
    ?>
    <a id="icon_logout_desktop" href="log_out.php"><img class="icon" src="icons/cerrar_sesion.svg" alt="log out" title="Log out"></a>

</nav>

<nav id="nav-phone">
    <details>
        <summary><img class="icon" src="icons/menu.svg" alt="Desplegar"></summary>
        <a class="nav-option" href="user_tools.php">TOOLS</a>
        <a class="nav-option" href="user_materials.php">MATERIALS</a>
        <a class="nav-option" href="nosotros_user.php">ABOUT US</a>
        <a id="icon_logout_phone" href="log_out.php"><img class="icon" src="icons/cerrar_sesion.svg" alt="log out" title="Log out"></a>
    </details>
</nav>