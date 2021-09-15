<?php

include('../config.php');

//var_dump($_POST);
$id = $_POST['id_r'];
$name = $_POST['name'];
$forname = $_POST['forname'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$zipcode = $_POST['zipcode'];
$town = $_POST['town'];

//Traitement des données
$query = "UPDATE customers SET name='$name', forname='$forname', email='$email_address', phone='$phone', address='$address', zipcode='$zipcode', town='$town' WHERE id='$id'";
$result = $link->query($query);

echo json_encode(true);
