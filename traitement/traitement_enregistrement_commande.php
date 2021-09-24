<?php
include('../config.php');

$errors = [];

if(empty($_POST['customer_name'])  || 
empty($_POST['customer_num']) ||
empty($_POST['product_code']) ||
empty($_POST['product_designation']) ||
empty($_POST['stock_qty']) ||
empty($_POST['product_price']) ||
empty($_POST['order_qty']) ||
empty($_POST['total_order']))

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
$order_price = $_POST['total_order'];

$text_ord = $_POST["chain_ord"];
$tab_ord = explode('|',$text_ord);


if(empty($errors)){

    $query = "INSERT INTO `orders` (order_customer, order_customer_num, order_product_code, order_product_designation, order_product_price, order_qty, order_date, order_price) VALUE ('".$order_customer."', '".$order_customer_num."', ".$order_product_code.", '".$order_product_designation."', ".$order_product_price.", ".$order_qty.", '".$order_date."', ".$order_price.");";
    $result = mysqli_query($link, $query);
    if($result==1){
        header('Location: ../site/enregistrement_commande.php');
    }else{
        echo('pb');
    }
}