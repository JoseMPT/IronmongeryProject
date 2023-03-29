<?php
session_start();
include 'php/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
        include 'php/head.php';
        ?>
        <style>
            h2, h3{
                font-size: 4em;
            }
        </style>
        <title>Ferretería Juárez - Usuario</title>
    </head>
    <body>
        <?php
        include 'php/header.php';
        include 'php/navs_user.php';
        ?>
        <main style="display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        background-color: #bcf0fd;
        background-image: url('pictures/ferreteria_HD.jpeg');
        background-attachment: fixed;">
            <h2>Ahora puede empezar a comprar</h2>
            <hr>
            <h2>Los mejores productos en la palma de su mano</h2>
            <br>
            <h2>Vaya a echar un vistazo</h2>
            <h3>¡Comparta la experiencia con otros usuarios!</h3>
        </main>
        <?php
        include 'php/footer.php';
        ?>
    </body>
</html>