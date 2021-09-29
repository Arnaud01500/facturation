<?php


include('../config.php');

//Traitement des données
$sql = "SELECT product_image FROM products";
$result = $link->query($sql);
