<?php
session_start();
$_SESSION['page'] = 'materials';
include 'php/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
        include 'php/head.php';
        ?>
        <title>Ferretería Juárez - Materiales</title>
    </head>
    <body>
        <?php
        include 'php/header.php';
        include 'php/navs_user.php';
        ?>
        <main>
            <?php
            $data = get_dataProducts_Materials();
            if (mysqli_num_rows($data) > 0){
                while($row = mysqli_fetch_object($data)){
                    ?>
                    <form class="form-product" name="form-data-materials" method="get" action="user_add_shoppingCart.php">
                        <input class="product-id" type="text" name="product_Id" value="<?php echo $row->product_id?>">
                        <img class="icon_products" src="icons/product.svg" alt="product">
                        <div class="div-product-data">
                            <h3 class="product-name"><?php echo $row->product_name?></h3>
                            <p class="product-description"><?php echo $row->product_description?></p>
                            <p class="product-description">Precio: $<?php echo $row->product_unitCost?></p>
                            <p class="product-description">
                                Cantidad a comprar: <input type="number" min="1" max="99" name="sale_amount" value="1">
                            </p>
                        </div>
                        <button class="button-product" type="submit" name="button_product" value="">
                            <img class="icon" src="icons/shopping_cart_add.svg" alt="add_cart" title="Añadir al carrito">
                        </button>
                    </form>
                    <?php
                }
            }
            ?>
        </main>
        <?php
        include 'php/footer.php';
        ?>
    </body>
</html>