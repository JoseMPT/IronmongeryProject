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
        <title>User registration</title>
    </head>
    <body>
        <?php
        include 'php/header.php';
        include 'php/navs_public.php';
        ?>
        <form class="form-register" action="user_register.php" method="post" target="_self">
            <h4>User registration</h4>
            <input class="controls" type="text" pattern="[A-Z]{1,30}" title="Only capital letters" name="user_name1" placeholder="First name" required>
            <input class="controls" type="text" pattern="[A-Z]{1,30}" title="Only capital letters" name="user_name2" placeholder="Enter your Middle Name (Optional)">
            <input class="controls" type="text" pattern="[A-Z]{1,30}" title="Only capital letters" name="user_lastname1" placeholder="Enter your Paternal Surname" required>
            <input class="controls" type="text" pattern="[A-Z]{1,30}" title="Only capital letters" name="user_lastname2" placeholder="Enter your Maternal Surname (Optional)">
            <input class="controls" type="email" name="user_email" placeholder="Enter your email" required>
            <input class="controls" type="password" name="user_password" placeholder="Enter your password" required>
            <p>I agree with <a href="#">Terms & Conditions</a></p>
            <input class="botons" type="submit" value="Register">
            <p><a href="user_login.php">I already have an account</a></p>
        </form>
        <?php
        include 'php/footer.php'
        ?>
    </body>
</html>
