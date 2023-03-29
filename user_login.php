<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
        include 'php/head.php';
        ?>
        <link rel="stylesheet" href="css/styles_login.css">
        <title>Iniciar sesión - Ferretería Juárez</title>
    </head>
    <body>
        <?php
        include 'php/header.php';
        include 'php/navs_public.php';
        ?>
        <main>
            <div class="login-box">
                <!--<img class="usuario" src="pictures/Logo.png" alt="logo">-->
                <h1>Ferretería Juárez</h1>
                <form name="form_login" method="post" action="validation.php" target="_self">
                    <label for="email">Correo electrónico</label>
                    <input type="email" name="login_email" placeholder="Ingrese su correo" required>
                    <label for="Password">Contraseña</label>
                    <input type="password" name="login_password" placeholder="Contraseña" required>
                    <input type="submit" name="login_submit" value="Iniciar sesión">
                    <p>¿No tienes una cuenta? <a style="cursor: pointer; text-decoration: #1f53c5" href="register_newUser.php" target="_self">Regístrate aquí.</a></p>
                </form>
            </div>
        </main>
        <?php
        include 'php/footer.php';
        ?>

    </body>
</html>
