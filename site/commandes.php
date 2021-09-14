<?php if ($_SESSION['role'] == 'admin') : ?>
<?php
include('../include/header.php');
?>
   


    <?php elseif ($_SESSION['role'] == 'guest') : ?>

        <h1>Je vois la commande que j'ai faite en tant que client</h1>


    <?php endif ?>








