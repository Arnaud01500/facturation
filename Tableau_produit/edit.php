<?php

include('../config.php');

//var_dump($_POST);
$id = $_POST['id_r'];
$ref_product = $_POST['ref_product'];
$category = $_POST['category'];
$designation = $_POST['designation'];
$price = $_POST['price'];

//Traitement des données
$query = "UPDATE products SET ref_product='$ref_product', category='$category', designation='$designation', price='$price' WHERE id='$id'";
$result = $link->query($query);

echo json_encode(true);
