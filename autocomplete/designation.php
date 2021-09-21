<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$array = array();
	$responseCode = 500;
	
	/* si la requête est bien en Ajax et la méthode en GET ... */
	if((strtolower(filter_input(INPUT_SERVER, 'HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest') && ($_SERVER['REQUEST_METHOD'] == 'GET')){
		/* on récupère le terme et on le duplique en terme en transformant les espaces en tirets et tirets en espaces (au cas ou) */
		$q = str_replace("''","'",urldecode($_REQUEST['product_designation']));
		$q = strtolower(str_replace("'","''",$q));
		$qTiret = str_replace(' ','-',$q);
		$qSpace = str_replace('-',' ',$q);
		
		$array = array();
		
		/* connexion SQL  (avec PDO car Mysql_connect sera déprécié dès php 7 :P) */

		include('../config-pdo.php');


		/* creation de la requête SQL */
		$query=$connexion->query('SELECT product_code, product_designation, product_price, stock_qty FROM `products` JOIN `stocks` ON product_code = stock_prod WHERE (product_code LIKE \'%'.$q.'%\' OR product_designation LIKE \'%'.$q.'%\')');
        // SELECT product_code, product_designation, product_price, stock_qty FROM `products` JOIN `stocks` ON product_code = 'VELOA2' 
		$query->setFetchMode(PDO::FETCH_OBJ);

		/* remplissage du tableau avec les termes récupéré en requete (ou non) */
		while($q = $query->fetch()){
            $product_code = utf8_encode($q->product_code);
			$product_designation = utf8_encode($q->product_designation);
            $product_price = utf8_encode($q->product_price);
            $stock_qty = utf8_encode($q->stock_qty);
			$array[] = array(
					'product_code' => $q->product_code,
					'product_designation' => $product_designation.' '.$product_code.' ',
					'value' => $product_designation.' - '.$product_code.'',
                    'product_price' => $product_price,
                    'stock_qty' => $stock_qty,
			);
		}



		$query->closeCursor();
				
		// die(print_r($array));
		
		$responseCode = 200;
	}
	
	/* génération réponse JSON */
	http_response_code($responseCode);
	header('Content-Type: application/json');
	echo json_encode($array);
?>