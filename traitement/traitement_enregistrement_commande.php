<?php
include('../config.php');

$errors = [];

if(empty($_POST['name'])  || 
empty($_POST['forname']) ||
empty($_POST['phone']) ||
empty($_POST['address']) ||
empty($_POST['zipcode']) ||
empty($_POST['town']) ||
empty($_POST['reference']) ||
empty($_POST['quantity']))

{
    $errors = "\n Error: Tous les champs sont requis";
}

$name = $_POST['name'];
$forname = $_POST['forname'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$zipcode = $_POST['zipcode'];
$town = $_POST['town'];
$reference = $_POST['reference'];
$quantity = $_POST['quantity'];



if(!preg_match("/^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/",$zipcode))

{
    $errors .= "\n Error: Le code postal est invalide";
}

if(!preg_match("/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/",$phone))

{
    $errors .= "\n Error: Le numéro de téléphone est invalide";
}
if(!preg_match("/^[0-9]+$/",$reference))

{
    $errors .= "\n Error: La référence est invalide";
}
if(!preg_match("/^[0-9]+$/",$quantity))

{
    $errors .= "\n Error: La quantité est invalide";
}


if(empty($errors)){

    $query = "INSERT INTO `orders` (name, forname, phone, address, zipcode, town, reference, quantity) VALUE ('$name', '$forname', '$phone', '$address', '$zipcode', '$town', '$reference', '$quantity')";
    $result = mysqli_query($link, $query);

    header('Location: ../site/historique_commandes.php');
}else{
    echo 'erreur';
}
