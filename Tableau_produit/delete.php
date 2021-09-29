<?php

include('../config.php');

//var_dump($_POST);
$idTemp = $_POST['id_r'];

$id = json_decode($idTemp);

//Traitement des données
$query = "DELETE FROM products WHERE id='$id'";
$result = $link->query($query);
