<?php
include('../config.php');

$errors = [];

if(empty($_POST['customer_name'])  || 
empty($_POST['customer_num']) ||
empty($_POST['product_code']) ||
empty($_POST['product_designation']) ||
empty($_POST['product_price']) ||
empty($_POST['order_qty']) ||
empty($_POST['order_price']))

{
    $errors = "\n Error: Tous les champs sont requis";
}

$order_customer = $_POST['customer_name'];
$order_customer_num = $_POST['customer_num'];
$order_product_code = $_POST['product_code'];
$order_product_designation = $_POST['product_designation'];
$order_product_price = $_POST['product_price'];
$order_qty = $_POST['order_qty'];
$order_date = date('d/m/Y');
$order_price = $_POST['order_price'];

$chain_ord = $_POST["chain_ord"];
$tab_ord = explode('|',$chain_ord);


// if(!preg_match("/^[0-9]+$/",$order_product_price))

// {
//     $errors .= "\n Error: Le prix est invalide";
// }

// if(!preg_match("/^[0-9]+$/",$order_qty))

// {
//     $errors .= "\n Error: La quantité est invalide";
// }
// if(!preg_match("/^[0-9]+$/",$order_price))

// {
//     $errors .= "\n Error: Le montant de la commande est invalide";
// }


if(empty($errors)){

    $query = "INSERT INTO `orders` (order_customer, order_customer_num, order_product_code, order_product_designation, order_product_price, order_qty, order_date, order_price) VALUES (".$order_customer.", ".$order_customer_num.", '".$order_product_code."', '".$order_product_designation."', ".$order_product_price.", ".$order_qty.", '".$order_date."', ".$order_price.");";
    $result = mysqli_query($link, $query);
    if($result==1){
        echo('go');
    }

}
