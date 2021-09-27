<?php
//récupère la date et heure de création dans la BDD
        $created_at = $row['created_at'];

        //strotime passe la date en français et de string à int
        $now    = time();
        $target = strtotime($created_at);
        $diff   = $now - $target;

        // 24 heures = 86400 secondes
        if ($diff <= 86400) {
            echo "Lien valide";
        } else {
            $query = "DELETE FROM `users` WHERE $diff <= 60";
            $result = mysqli_query($link, $query);
        }
?>