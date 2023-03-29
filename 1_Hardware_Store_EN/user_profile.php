<?php
session_start();
include 'php/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include 'php/head.php';
        ?>
        <style>
            h2, h3{
                font-size: 4em;
            }
        </style>
        <title>Hardware store Juarez - User</title>
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
            <h2>Now you can start shopping</h2>
            <hr>
            <h2>The best products in the palm of your hand</h2>
            <br>
            <h2>Go and have a look</h2>
            <h3>Share the experience with other users!</h3>
        </main>
        <?php
        include 'php/footer.php';
        ?>
    </body>
</html>