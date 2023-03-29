<?php
session_start();
include 'php/conexion.php';
$cart_Id = $_SESSION['cart_Id'];
$product_ID = $_GET['product_Id_delete'];
delete_fromShoppingCart($product_ID, $cart_Id);
echo '<meta http-equiv="refresh" content="0; URL=user_shopping_cart.php">';