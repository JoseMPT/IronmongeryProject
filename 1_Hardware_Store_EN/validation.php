<?php
session_start();
$email = $_POST['login_email'];
$password = $_POST['login_password'];

include('php/conexion.php');

$data = search_user($email, $password);
if (is_object($data)){
    switch ($data -> user_type){
        case 1:
            $_SESSION['user_type'] = $data -> user_type;
            $_SESSION['user_email'] = $data -> user_email;
            $_SESSION['cart_Id'] = get_shoppingCartId($_SESSION['user_email']);
            echo '<meta http-equiv="refresh" content="0; URL=user_profile.php">';
            break;
        case 2:
            $_SESSION['user_type'] = $data -> user_type;
            $_SESSION['user_email'] = $data -> user_email;
            echo '<meta http-equiv="refresh" content="0; URL=employee_profile.php">';
            break;
        case 3:
            $_SESSION['user_type'] = $data -> user_type;
            $_SESSION['user_email'] = $data -> user_email;
            echo '<meta http-equiv="refresh" content="0; URL=admin_profile.php">';
            break;
    }
}else{
    ?>
    <script>alert('Usuario/contraseña incorrectos')</script>
    <?php
    echo '<meta http-equiv="refresh" content="0; URL=user_login.php">';
}