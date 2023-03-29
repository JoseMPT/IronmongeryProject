<?php
session_start();
unset($_SESSION);
session_destroy();

if (isset($_SESSION['user_type']) && isset($_SESSION['user_email'])){
    switch ($_SESSION['user_type']){
        case 1:
            echo '<meta http-equiv="refresh" content="0; URL=user_profile.php">';
            break;
        case 2:
            echo '<meta http-equiv="refresh" content="0; URL=employee_profile.php">';
            break;
        case 3:
            echo '<meta http-equiv="refresh" content="0; URL=admin_profile.php">';
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
        include 'php/head.php';
        ?>
        <title>Ferretería Juárez</title>
    </head>
    <body>
        <?php
        include 'php/header.php';
        include 'php/navs_public.php';
        ?>
        <main style="display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        background-color: #bcf0fd;
        background-image: url('pictures/ferreteria_HD.jpeg');
        background-attachment: fixed;">
            <section class="adds">
                <p>Ferretería Juárez, la mejor calidad en productos a tu disposción</p>
                <p>Regístrate ahora y podrás empezar a comprar.</p>
            </section>
            <section class="adds">
                <p>Desde herramientas de trabajo pesado hasta materiales de construción</p>
                <p>¡No dejes pasar la oportunidad!</p>
                <p>Construye la casa de tus sueños, con los mejores materiales del mercado</p>
            </section>
        </main>
        <?php
        include 'php/footer.php';
        ?>
    </body>
</html>