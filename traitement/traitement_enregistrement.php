<?php
include('../config.php');

$errors = [];

if(empty($_POST['name'])  || 
empty($_POST['forname']) ||
empty($_POST['email']) ||
empty($_POST['phone']) ||
empty($_POST['address']) ||
empty($_POST['zipcode']) ||
empty($_POST['town']))

{
    $errors = "\n Error: Tous les champs sont requis";
}

$name = $_POST['name'];
$forname = $_POST['forname'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$zipcode = $_POST['zipcode'];
$town = $_POST['town'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))

{
    $errors .= "\n Error: L'adresse email est invalide";
}

if(!preg_match("/^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/",$zipcode))

{
    $errors .= "\n Error: Le code postal est invalide";
}

if(!preg_match("/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/",$phone))

{
    $errors .= "\n Error: Le numéro de téléphone est invalide";
}


session_start();
if(empty($errors)){
    $_SESSION['success'] = 1;

    $query = "INSERT INTO `customers` (name, forname, email, phone, address, zipcode, town) VALUES ('$name', '$forname', '$email_address', '$phone', '$address', '$zipcode', '$town')";
    $result = mysqli_query($link, $query);

    header('Location: ../site/enregistrement.php');
}










// /* Vérification si l'email est déjà pris */
// $query = "SELECT * FROM customers WHERE email='$email_address'";
// $result = mysqli_query($connection, $query);
// $row = mysqli_fetch_array($result);
// if($row['email'] == $email_address){
//     header('location: erreur_pseudo.php');



// }else{
//     /* Vérification que les mots de passes correspondent */
//     if($motdepasse !== $motdepasseconfirm){
//         header('location: erreur_password.php');
//     }else{
//         /* Hachage du mot de passe */
//         $pass_hache = password_hash($motdepasse, PASSWORD_DEFAULT);

//         /* Insert en base de donnée */
//         header("location: inscription_validation.php?pseudo=$pseudo");
//     }
// }
// }