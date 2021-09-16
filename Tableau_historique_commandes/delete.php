<?php

include('../config.php');

//var_dump($_POST);
$idTemp = $_POST['ref_order_r'];

$ref_order = json_decode($idTemp);


//Traitement des données
$query = "DELETE FROM orders WHERE ref_order='$ref_order'";
$result = $link->query($query);
