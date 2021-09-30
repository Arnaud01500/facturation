<?php
include('../config.php');

$errors = [];

if(empty($_POST['customer_name'])  || 
empty($_POST['customer_num']) ||
empty($_POST['product_designation']) ||
empty($_POST['product_code']) ||
empty($_POST['stock_qty']) ||
empty($_POST['product_price']) ||
empty($_POST['order_qty']) ||
empty($_POST['order_price']))

{
    $errors = "\n Error: Tous les champs sont requis";
}

$order_customer = $_POST['customer_name'];
$order_customer_num = $_POST['customer_num'];
$order_product_code = $_POST['product_code'];
$order_product_designation = $_POST['product_designation'];
$order_product_price = $_POST['product_price'];
$order_qty = $_POST['order_qty'];
$order_date = date('d/m/Y');
$order_price = $_POST['order_price'];

$chain_ord = $_POST["chain_ord"];
$tab_ord = explode('|',$chain_ord);



if(empty($errors)){

    $query = "INSERT INTO `orders` (order_customer, order_customer_num, order_product_code, order_product_designation, order_product_price, order_qty, order_date, order_price) VALUES ('".$order_customer."', ".$order_customer_num.", '".$order_product_code."', '".$order_product_designation."', ".$order_product_price.", ".$order_qty.", '".$order_date."', ".$order_price.");";
    $result = mysqli_query($link, $query);

    if($result==1){
        $detail_ord = mysqli_insert_id($link);
        for($ligne=0 ; $ligne<sizeof($tab_ord) ;$ligne++){
            if($tab_ord[$ligne]!=""){
            $ligne_ord = explode(';', $tab_ord[$ligne]);
            $query = "INSERT INTO details (detail_ord, detail_ref, detail_qty) VALUES (".$detail_ord.", '".$ligne_ord[3]."',".$ligne_ord[6].");";
            $result = mysqli_query($link, $query);
            $query = "UPDATE stocks SET stock_qty = stock_qty-".$ligne_ord[6]." WHERE stock_prod='".$ligne_ord[2]."';";
            $result = mysqli_query($link, $query);
            }
        }
        print("ok");


        /* Génération de la facture PDF */

        require_once __DIR__ . '../mpdf/vendor/autoload.php';

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<h1>Hello world!</h1>');
        $mpdf->Output();

        // $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp']);

        // header('Location: ../site/enregistrement_commande.php');
    }else
    print("nok");
}
