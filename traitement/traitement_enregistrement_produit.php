<?php
include('../config.php');

$errors = [];

if(empty($_POST['ref_product'])  || 
empty($_POST['category']) ||
empty($_POST['designation']) ||
empty($_POST['price']))
{
    $errors = "\n Error: Tous les champs sont requis";
}

$ref_product = $_POST['ref_product'];
$category = $_POST['category'];
$designation = $_POST['designation'];
$price = $_POST['price'];

if(empty($errors)){

    $query = "INSERT INTO `products` (ref_product, category, designation, price) VALUES ('$ref_product', '$category', '$designation', '$price')";
    $result = $link->query($query);

   header('Location: ../site/enregistrement_produit.php');
}else{
    echo 'erreur';
}








