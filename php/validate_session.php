<?php
session_start();
if (isset($_SESSION['user_type']) && isset($_SESSION['user_email'])){
    echo match ($_SESSION['user_type']) {
        1 => '<meta http-equiv="refresh" content="0; URL=user_profile.php">',
        2 => '<meta http-equiv="refresh" content="0; URL=employee_profile.php">',
        3 => '<meta http-equiv="refresh" content="0; URL=admin_profile.php">',
    };
}else{
    echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}