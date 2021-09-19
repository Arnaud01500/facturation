<?php
include('../config.php');

$errors = [];

if(empty($_POST['product_code'])  || 
empty($_POST['product_designation']) ||
empty($_POST['product_price']) ||
empty($_POST['product_qty']))
{
    $errors = "\n Error: Tous les champs sont requis";
}

$product_code = $_POST['product_code'];
$product_designation = $_POST['product_designation'];
$product_price = $_POST['product_price'];
$product_qty = $_POST['product_qty'];

if(empty($errors)){

    $query = "INSERT INTO `products` (product_code, product_designation, product_price, product_qty) VALUES ('$product_code', '$product_designation', '$product_price', '$product_qty')";
    $result = $link->query($query);

   header('Location: ../site/enregistrement_produit.php');
}else{
    echo 'erreur';
}








