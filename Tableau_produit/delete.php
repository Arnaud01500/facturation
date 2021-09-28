<?php

include('../config.php');

//var_dump($_POST);
$idTemp = $_POST['id'];


//Traitement des données
$query = "DELETE FROM products WHERE id='$idTemp'";
$result = $link->query($query);
