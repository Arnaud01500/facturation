<?php
include('../include/header.php');
?>
<?php if ($_SESSION['role'] == 'admin') : ?>
<body>
    <form id="basic-form" action="../traitement/traitement_enregistrement_client.php" method="POST">
          <div class="sectionSaisie">
            <div class="container">
              <div class="contact--box">
                <div class="row justify-content-center">
                  <div class="col12 col-md-6 contact--box_formulaire">
                    <div class="contact--box_text">
                      <div class="row">
                        <div class="col-12 col-lg-6">
                        <label class="contact--box_label contact--box_labelwhite" for="name">Nom : </label>
                        <input type="text" id="name" name="name" placeholder="Nom du client" required class="form-control">
                        </div>
                        <div class="col-12 col-lg-6">
                        <label class="contact--box_label contact--box_labelwhite" for="forname">Prénom : </label>
                        <input type="text" id="forname" name="forname" placeholder="Prénom du client" required class="form-control">
                        </div>
                        <div class="col-12 col-md-12">
                        <label class="contact--box_label contact--box_labelwhite" for="email">Email : </label>
                        <input type="email" id="email" name="email" placeholder="Email du client" required pattern = (\w\.?)+@[\w\.-]+\.\w{2,} required class="form-control">
                        </div>
                        <div class="col-12 col-md-12">
                        <label class="contact--box_label contact--box_labelwhite" for="phone">Téléphone : </label>
                        <input type="tel" id="phone" name="phone" placeholder="Numéro de téléphone du client" pattern="([0-9]{10})" required class="form-control">
                        </div>
                        <div class="col-12 col-md-12">
                        <label class="contact--box_label contact--box_labelwhite" for="address">Adresse : </label>
                        <input type="text" id="address" name="address" placeholder="Adresse du client" required class="form-control">
                        </div>
                        <div class="col-12 col-md-12">
                        <label class="contact--box_label contact--box_labelwhite" for="zipcode">Code postal : </label>
                        <input type="text" id="zipcode" name="zipcode" placeholder="Saisir le code postal du client" pattern="[0-9]{5}" required class="form-control">
                        </div>
                        <div class="col-12 col-md-12">
                        <label class="contact--box_label contact--box_labelwhite" for="town">Ville : </label>
                        <input type="text" id="town" name="town" placeholder="Saisir la ville de résidence du client" required class="form-control"><br>
                        </div>
                        <div class="col-12 col-md-12">
                        <input type="submit" name="formulaire" value="Ajouter" required class="btn btn-primary">
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


    <script src="../js/script_enregistrement_client.js"></script>
    
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


