<?php
session_start();
include 'php/conexion.php';
$cart = $_SESSION['cart_Id'];
buy_allProducts($cart);
?>
<!--<script>alert('Productos comprados')</script>-->
<?php
echo '<meta http-equiv="refresh" content="0; URL=user_shopping_cart.php">';
