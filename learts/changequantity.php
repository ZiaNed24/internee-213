<?php
session_start();
echo $_REQUEST["id"];
if(isset($_REQUEST["quantity"]) && isset($_REQUEST["id"]) && isset($_SESSION['cart'])){
    $i = 0;
    foreach ($_SESSION['cart'] as $value) {

        $i++;

        if ($value["id"] == $_REQUEST["id"]) {

            array_splice($_SESSION['cart'], $i - 1, 1, array(array("id" => $value["id"], "product_name" => $value["product_name"], "quantity" => $_REQUEST["quantity"], "images" => "../learts/products-images/" . $value["images"], "price" => $value["price"])));
            break;
        }
    }
}





?>