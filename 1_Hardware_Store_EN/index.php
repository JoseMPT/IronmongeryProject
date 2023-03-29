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
<html lang="en">
    <head>
        <?php
        include 'php/head.php';
        ?>
        <title>Hardware store Juarez</title>
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
                <p>Hardware store Juarez, the best quality products at your disposal</p>
                <p>Register now and you can start shopping.</p>
            </section>
            <section class="adds">
                <p>From heavy-duty tools to construction materials</p>
                <p>Don’t miss the opportunity!</p>
                <p>Build your dream home with the best materials on the market</p>
            </section>
        </main>
        <?php
        include 'php/footer.php';
        ?>
    </body>
</html>