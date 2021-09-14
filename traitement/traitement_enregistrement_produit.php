<?php
include('../config.php');

$errors = [];

if(empty($_POST['category'])  || 
empty($_POST['designation']) ||
empty($_POST['price']))

{
    $errors = "\n Error: Tous les champs sont requis";
}

$category = $_POST['category'];
$designation = $_POST['designation'];
$price = $_POST['price'];


session_start();
if(empty($errors)){
    $_SESSION['success'] = 1;

    $query = "INSERT INTO `products` (category, designation, price) VALUES ('$category', '$designation', '$price')";
    $result = $link->query($query);

    header('Location: ../site/enregistrement_produit.php');
}else{
    echo 'erreur';
}








