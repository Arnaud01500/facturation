<?php        
        $host='localhost';
		$port='3306';
		$database='facturation';
		$user='root';
		$password='';
		$connexion = new PDO('mysql:host='.$host.';port='.$port.';dbname='.$database, $user, $password);
?>
