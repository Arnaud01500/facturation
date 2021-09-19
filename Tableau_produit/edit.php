<?php

include('../config.php');

//var_dump($_POST);
$product_code = $_POST['product_code_r'];
$product_designation = $_POST['product_designation'];
$product_price = $_POST['product_price'];
$product_qty = $_POST['product_qty'];

//Traitement des données
$query = "UPDATE products SET product_code='$product_code', product_designation='$product_designation', product_price='$product_price', product_qty='$product_qty' WHERE product_code='$product_code'";

$result = $link->query($query);



echo json_encode(true);
