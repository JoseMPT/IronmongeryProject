<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include 'php/head.php';
        ?>
        <link rel="stylesheet" href="css/styles_login.css">
        <title>Login - Hardware store Juarez</title>
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
                    <label for="email">E-mail</label>
                    <input type="email" name="login_email" placeholder="Enter your e-mail" required>
                    <label for="Password">Password</label>
                    <input type="password" name="login_password" placeholder="Password" required>
                    <input type="submit" name="login_submit" value="Login">
                    <p>Don’t you have an account? <a style="cursor: pointer; text-decoration: #1f53c5" href="register_newUser.php" target="_self">Sign up here.</a></p>
                </form>
            </div>
        </main>
        <?php
        include 'php/footer.php';
        ?>

    </body>
</html>
