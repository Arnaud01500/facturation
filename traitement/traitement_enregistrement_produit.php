<?php
include('../config.php');

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_req = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  }


  else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

    $query = "UPDATE `products` SET product_image='$target_req' WHERE product_code='$product_code'";
    $result = mysqli_query($link, $query);

  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

$errors = [];

if(empty($_POST['product_code'])  || 
empty($_POST['product_designation']) ||
empty($_POST['product_price']) ||
empty($_POST['product_qty']))
{
    $errors = "\n Error: Tous les champs sont requis";
}

$product_code = $_POST['product_code'];
$product_designation = $_POST['product_designation'];
$product_price = $_POST['product_price'];
$product_qty = $_POST['product_qty'];

if(empty($errors)){

    $query = "INSERT INTO `products` (product_code, product_designation, product_price, product_qty, product_image) VALUES ('$product_code', '$product_designation', '$product_price', '$product_qty')";
    $result = $link->query($query);

   header('Location: ../site/enregistrement_produit.php');
}else{
    echo 'erreur';
}








