<?php
session_start();
$_SESSION['page'] = 'cart';
include 'php/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
        include 'php/head.php';
        ?>
        <title>Ferretería Juárez - Carrito</title>
    </head>
    <body>
        <?php
        include 'php/header.php';
        include 'php/navs_user.php';
        ?>
        <main>
            <?php
            $data = get_unPurchasedProducts($_SESSION['user_email']);
            if (mysqli_num_rows($data) > 0){
                while($row = mysqli_fetch_object($data)){
                    ?>
                    <form class="form-delete" name="form_delete" method="get" action="user_delete_shoppingCart.php" target="_self">
                        <input class="product-id" type="text" name="product_Id_delete" value="<?php echo $row->sale_productId?>">
                        <button id="delete" class="button-product-delete" type="submit" name="button_product_delete" value="">
                            <img class="icon" src="icons/delete.svg" alt="delete_cart" title="Eliminar del carrito">
                        </button>
                    </form>
                    <form id="form_cart" class="form-product" name="form-data-materials" method="get" action="user_add_shoppingCart.php" target="_self">
                        <input class="product-id" type="text" name="product_Id" value="<?php echo $row->sale_productId?>">
                        <img class="icon_products" src="icons/product.svg" alt="product">
                        <div class="div-product-data">
                            <h3 class="product-name"><?php echo $row->product_name?></h3>
                            <p class="product-description"><?php echo $row->product_description?></p>
                            <p class="product-description">Total: $<?php echo $row->sale_total?></p>
                            <p class="product-description">
                                Cantidad a comprar: <input type="number" min="1" max="99" name="sale_amount" value="<?php echo $row-> sale_amount?>">
                            </p>
                        </div>
                        <button id="edit" class="button-product" type="submit" name="button_product_edit" value="">
                            <img class="icon" src="icons/edit.svg" alt="edit_cart" title="Editar compra">
                        </button>
                    </form>
                    <?php
                }
            }else{
                echo '<h1 style="text-align: center; font-size: 70px">No tienes productos en el carrito</h1>';
            }
            ?>
            <form style="text-align: center" action="buy_products.php" target="_self">
                <button style="font-size: 3em; border-radius: 10px" id="edit" class="button-product" type="submit" name="button_product_edit" value="">Comprar</button>
            </form>
        </main>
        <?php
        include 'php/footer.php';
        ?>
    </body>
</html>