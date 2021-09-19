<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$array = array();
	$responseCode = 500;
	
	/* si la requête est bien en Ajax et la méthode en GET ... */
	if((strtolower(filter_input(INPUT_SERVER, 'HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest') && ($_SERVER['REQUEST_METHOD'] == 'GET')){
		/* on récupère le terme et on le duplique en terme en transformant les espaces en tirets et tirets en espaces (au cas ou) */
		$q = str_replace("''","'",urldecode($_REQUEST['customer_name']));
		$q = strtolower(str_replace("'","''",$q));
		$qTiret = str_replace(' ','-',$q);
		$qSpace = str_replace('-',' ',$q);
		
		$array = array();
		
		/* connexion SQL  (avec PDO car Mysql_connect sera déprécié dès php 7 :P) */


        $host='localhost';
		$port='3306';
		$database='facturation';
		$user='root';
		$password='';
		$connexion = new PDO('mysql:host='.$host.';port='.$port.';dbname='.$database, $user, $password);

		/* creation de la requête SQL */
		$query=$connexion->query('SELECT customer_num, customer_name, customer_forname FROM `customers` WHERE (customer_name LIKE \'%'.$q.'%\' OR customer_forname LIKE \'%'.$q.'%\') ORDER BY customer_name ASC');
		$query->setFetchMode(PDO::FETCH_OBJ);


		/* remplissage du tableau avec les termes récupéré en requete (ou non) */
		while($q = $query->fetch()){
			$customer_name = utf8_encode($q->customer_name);
			$customer_forname = utf8_encode($q->customer_forname);
			$array[] = array(
					'customer_num' => $q->customer_num,
					'customer_name' => $customer_name.' '.$customer_forname.'',
					'value' => $customer_name.' '.$customer_forname.'',
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