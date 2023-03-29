<?php
session_start();
include 'php/conexion.php';
$sale_productId = $_GET['product_Id'];
$sale_amount = $_GET['sale_amount'];
$sale_buy = get_shoppingCartId($_SESSION['user_email']);

/*echo $sale_productId.'<br>'.$sale_amount.'<br>'.$sale_buy.'<br>';*/

add_toShoppingCart($sale_productId, $sale_amount, $sale_buy);
?>
<script>alert('Added to your cart.')</script>
<?php
$page = $_SESSION['page'];

if ($page == 'tools'){
    echo '<meta http-equiv="refresh" content="0; URL=user_tools.php">';
}elseif ($page == 'materials'){
    echo '<meta http-equiv="refresh" content="0; URL=user_materials.php">';
}elseif($page == 'cart'){
    echo '<meta http-equiv="refresh" content="0; URL=user_shopping_cart.php">';
}
