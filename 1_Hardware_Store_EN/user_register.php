<?php
session_start();
$_SESSION['cart_Id'] = 1;

include 'php/conexion.php';

$type_user = $_SESSION['cart_Id'];
$name1 = $_POST['user_name1'];
$name2 = $_POST['user_name2'];
$lastname1 = $_POST['user_lastname1'];
$lastname2 = $_POST['user_lastname2'];
$email = $_POST['user_email'];
$password = $_POST['user_password'];

$query1 = 'SELECT user_email FROM'.' users_data;';
$data1 = mysqli_query(connect(), $query1);
if (mysqli_num_rows($data1) > 0){
    while ($row = mysqli_fetch_object($data1)){
        $email_compare = $row -> user_email;
        if($email_compare == $email){
            ?>
            <script>alert('The email entered already exists, try another.')</script>
            <?php
            echo '<meta http-equiv="refresh" content="0; URL=register_newUser.php">';
            exit();
        }
    }
}
$name1 = '\''.$name1.'\'';
$name2 = '\''.$name2.'\'';
$lastname1 = '\''.$lastname1.'\'';
$lastname2 = '\''.$lastname2.'\'';
$email = '\''.$email.'\'';
$password = '\''.$password.'\'';

$query2 = 'INSERT INTO'.' users_data VALUES ('.$name1.','.$name2.','.$lastname1.','.$lastname2.','.$email.','.$password.','.$type_user.');';
mysqli_query(connect(), $query2);
echo '<meta http-equiv="refresh" content="0; URL=user_login.php">';
?>