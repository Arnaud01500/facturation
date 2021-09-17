<?php

include('../config.php');

//var_dump($_POST);
$customer_num = $_POST['customer_num_r'];
$name = $_POST['customer_name'];
$forname = $_POST['customer_forname'];
$email_address = $_POST['customer_email'];
$phone = $_POST['customer_phone'];
$address = $_POST['customer_address'];
$zipcode = $_POST['customer_zipcode'];
$town = $_POST['customer_town'];

//Traitement des données
$query = "UPDATE customers SET customer_name='$name', customer_forname='$forname', customer_email='$email_address', customer_phone='$phone', customer_address='$address', customer_zipcode='$zipcode', customer_town='$town' WHERE customer_num='$customer_num'";
$result = $link->query($query);
echo json_encode(true);
