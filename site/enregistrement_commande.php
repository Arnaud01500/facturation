
<?php
include('../include/header.php');
$name = $_GET['name'];
$forname = $_GET['forname'];
$phone = $_GET['phone'];
$address = $_GET['address'];
$zipcode = $_GET['zipcode'];
$town = $_GET['town'];
?>
<?php if ($_SESSION['role'] == 'admin') : ?>

<body>
    <section>

    <form id="basic-form" action="../traitement/traitement_enregistrement_commande.php" method="POST">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col12 col-md-9 contact--box_formulaire">
                        <div class="row">
                          <div class="col-12 col-lg-6">
                          <label class="contact--box_label contact--box_labelwhite" for="name">Nom : </label>
                          <input type="text" id="name" name="name" placeholder="Nom du client" required class="form-control" value="<?php echo $name;?>">
                          </div>
                          <div class="col-12 col-lg-6">
                          <label class="contact--box_label contact--box_labelwhite" for="forname">Prénom : </label>
                          <input type="text" id="forname" name="forname" placeholder="Prénom du client" required class="form-control" value="<?php echo $forname;?>">
                          </div>
                          <div class="col-12 col-md-12">
                          <label class="contact--box_label contact--box_labelwhite" for="phone">Téléphone : </label>
                          <input type="tel" id="phone" name="phone" placeholder="Numéro de téléphone du client" required class="form-control" value="<?php echo $phone;?>">
                          </div>
                          <div class="col-12 col-md-12">
                          <label class="contact--box_label contact--box_labelwhite" for="address">Adresse : </label>
                          <input type="text" id="address" name="address" placeholder="Adresse du client" required class="form-control" value="<?php echo $address;?>">
                          </div>
                          <div class="col-12 col-md-12">
                          <label class="contact--box_label contact--box_labelwhite" for="zipcode">Code postal : </label>
                          <input type="text" id="zipcode" name="zipcode" placeholder="Saisir le code postal du client" pattern="[0-9]{5}" required class="form-control" value="<?php echo $zipcode;?>">
                          </div>
                          <div class="col-12 col-md-12">
                          <label class="contact--box_label contact--box_labelwhite" for="town">Ville : </label>
                          <input type="text" id="town" name="town" placeholder="Saisir la ville de résidence du client" required class="form-control" value="<?php echo $town;?>"><br>
                          </div>
                          <div class="col-12 col-md-12">
                                <div class="form-main">
                                    <div class="form-block">
                                      <div class="row">
                                              <div class="col-12 col-lg-6">
                                                  <label class="contact--box_label contact--box_labelwhite" for="reference">Référence : </label>
                                                  <input type="text" id="reference" name="reference" placeholder="Saisir la référence" required class="form-control">
                                              </div>
                                              <div class="col-12 col-lg-6">
                                                  <label class="contact--box_label contact--box_labelwhite" for="quantity">Quantité : </label>
                                                  <input type="text" id="quantity" name="quantity" placeholder="Saisir la quantité" required class="form-control">
                                              </div>
                                        </div><br>
                                  </div>
                                      <div class="result"></div>
                                          <div class="buttons">
                                          <button class="clone btn btn-success">Ajouter un produit</button>
                                          <button class="remove btn btn-danger">Supprimer un produit</button>
                                          <input type="submit" name="formulaire" value="Saisir la commande" required class="btn btn-primary">
                                      </div>
                                  </div>
                              </div>
                            </div>
                      </div>
                  </div>
              </div>
          </div>
      </form>
    </section>
    <script src="../js/script_ajout_enregistrement_commande.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
</body>
<?php elseif ($_SESSION['role'] == 'guest') : ?>
  <?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: ../login.php");
exit;
?>
<?php endif ?>  
</html>


