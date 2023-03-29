<?php
function connect(): bool|mysqli
{
    $hostname = 'localhost';
    $username = 'root';
    $password = 'cloe-5568720898';
    $database_es = 'hardware_store_es';
    $database_en = 'hardware_store_en';
    $port = '3307';

    return mysqli_connect($hostname, $username, $password, $database_es, $port);
}

function search_user($user_email = '', $password = ''): string|stdClass
{
    $user_email = '\''.$user_email.'\'';
    $password = '\''.$password.'\'';
    $query = 'SELECT '.'user_email,'.'user_password,'.'user_type '.'FROM users_data '.'WHERE '.'user_email = '.
                $user_email.' AND '.'user_password = '.$password.';';
    $data = mysqli_query(connect(), $query);
    $row = mysqli_fetch_object($data);

    if (mysqli_num_rows($data) == 0){
        return 'Usuario o contraseña incorrecta.';
    }else{
        return $row;
    }
}

function get_shoppingCartId($user_email): string
{
    $user_email = '\''.$user_email.'\'';
    $query = 'SELECT'.' buy_id FROM buy_products WHERE buy_user = '.$user_email.';';

    $data = mysqli_query(connect(), $query);
    $row = mysqli_fetch_object($data);

    if (mysqli_num_rows($data) == 0){
        return 'Carrito de compras no encontrado.';
    }else{
        return $row -> buy_id;
    }
}

/*Debo devolver la data, y yo iterar en la ventana correspodiente*/
function get_purchasedProducts($user_email = ''): mysqli_result|bool
{
    $user_email = '\''.$user_email.'\'';
    $query = 'SELECT '.'sale_productId FROM buy_products INNER JOIN sale_data 
    ON buy_id = sale_buy AND buy_user = '.$user_email.' AND sale_bought = 1;';

    return mysqli_query(connect(), $query);
    //$data = mysqli_query(connect(), $query);
    //$row = mysqli_fetch_object($data);

    /*if (mysqli_num_rows($data) == 0){
        return 'No se han comprado productos.';
    }else{
        return $row;
    }*/
}

function get_unPurchasedProducts($user_email = ''): mysqli_result|bool
{
    $user_email = '\''.$user_email.'\'';
    /*$query = 'SELECT '.'sale_productId FROM buy_products INNER JOIN sale_data
    ON buy_id = sale_buy AND buy_user = '.$user_email.' AND sale_bought = 0;';*/
/*    $query = 'SELECT '.'sale_productId, product_name,sale_amount FROM buy_products INNER JOIN sale_data INNER JOIN products_data
    ON buy_id = sale_buy AND buy_user = '.$user_email.' AND sale_bought = 0 AND product_id = sale_data.sale_productId;';*/

    $query = 'SELECT '.'sale_productId, product_name, product_description, sale_total, sale_amount FROM buy_products INNER JOIN sale_data INNER JOIN products_data
    ON buy_id = sale_buy AND buy_user = '.$user_email.' AND sale_bought = 0 AND product_id = sale_data.sale_productId;';
    return mysqli_query(connect(), $query);
    //$data = mysqli_query(connect(), $query);
    //$row = mysqli_fetch_object($data);

    /*if (mysqli_num_rows($data) == 0){
        return 'No hay productos en el carrito.';
    }else{
        return $row;
    }*/
}

function get_dataProducts_report(): mysqli_result|bool
{
    $query = 'SELECT '.'product_id, product_name, sale_total FROM products_data INNER JOIN sale_data
              ON sale_productId = product_id;';

    return mysqli_query(connect(), $query);
    //$data = mysqli_query(connect(), $query);
    //$row = mysqli_fetch_object($data);

    /*if (mysqli_num_rows($data) == 0){
        return 'No hay datos para mostrar.';
    }else{
        return $row;
    }*/
}

function get_dataProducts_Tools(): mysqli_result|bool
{
    $query = 'SELECT '.'product_id, product_name, product_description, product_unitCost FROM '.
    'products_data WHERE product_inventory = 1;';
    return mysqli_query(connect(), $query);
}

function get_dataProducts_Materials(): mysqli_result|bool
{
    $query = 'SELECT '.'product_id, product_name, product_description, product_unitCost FROM '.
        'products_data WHERE product_inventory = 2;';
    return mysqli_query(connect(), $query);
}

function add_toShoppingCart($product_id = '', $product_amount = 1, $buy_id = ''): void
{
    $product_id = '\''.$product_id.'\'';
    $query = 'CALL '.'insert_sale_data('.$product_id.', '.$product_amount.', '.$buy_id.');';

    mysqli_query(connect(), $query);
}

function delete_fromShoppingCart($product_name = '', $buy_id = ''): void
{
    $product_name = '\''.$product_name.'\'';
    $query = 'CALL delete_sale_data('.$product_name.', '.$buy_id.');';
    mysqli_query(connect(), $query);
}


function buy_allProducts($cart_Id): void
{
    $query = 'CALL make_purchase('.$cart_Id.');';
    mysqli_query(connect(), $query);
}
//$data = search_user('\'alexis@gmail.com\'', '\'12345\'');
//$row = mysqli_fetch_object($data);
//echo $row -> user_email.'<br>';
//echo $row -> user_password.'<br>';
//echo $row -> user_type.'<br>';

/*if(mysqli_num_rows($data) > 0){
    echo 'Tiene algo';
}else{
    echo 'NADA';
}*/