<?php

include('../config.php');

//var_dump($_POST);
$idTemp = $_POST['customer_num_r'];

$customer_num = json_decode($idTemp);


//Traitement des données
$query = "DELETE FROM customers WHERE customer_num='$customer_num'";
$result = $link->query($query);
