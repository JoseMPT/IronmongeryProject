<?php
session_start();
$_SESSION['cart_Id'] = 1;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="css/styles_registerUser.css">
        <?php
        include 'php/head.php'
        ?>
        <title>Registro de usuario</title>
    </head>
    <body>
        <?php
        include 'php/header.php';
        include 'php/navs_public.php';
        ?>
        <form class="form-register" action="user_register.php" method="post" target="_self">
            <h4>Registro de usuario</h4>
            <input class="controls" type="text" pattern="[A-Z]{1,30}" title="Solo letras mayúsculas" name="user_name1" placeholder="Ingrese su Nombre" required>
            <input class="controls" type="text" pattern="[A-Z]{1,30}" title="Solo letras mayúsculas" name="user_name2" placeholder="Ingrese su Segundo Nombre (Opcional)">
            <input class="controls" type="text" pattern="[A-Z]{1,30}" title="Solo letras mayúsculas" name="user_lastname1" placeholder="Ingrese su Apellido Paterno" required>
            <input class="controls" type="text" pattern="[A-Z]{1,30}" title="Solo letras mayúsculas" name="user_lastname2" placeholder="Ingrese su Apellido Materno (Opcional)">
            <input class="controls" type="email" name="user_email" placeholder="Ingrese su Correo" required>
            <input class="controls" type="password" name="user_password" placeholder="Ingrese su Contraseña" required>
            <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a></p>
            <input class="botons" type="submit" value="Registrar">
            <p><a href="user_login.php">Ya tengo cuenta</a></p>
        </form>
        <?php
        include 'php/footer.php'
        ?>
    </body>
</html>
