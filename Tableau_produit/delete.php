<?php

include('../config.php');

//var_dump($_POST);
$idTemp = $_POST['product_code_r'];

$product_code = json_decode($idTemp);

//Traitement des données
$query = "DELETE FROM products WHERE product_code='$product_code'";
$result = $link->query($query);
