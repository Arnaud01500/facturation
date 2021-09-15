<?php
include('../include/header.php');
?>
<?php if ($_SESSION['role'] == 'admin') : ?>
<body>
    <section>
    <form id="basic-form" action="../traitement/traitement_enregistrement_produit.php" method="POST">
          <div class="sectionSaisie">
            <div class="container">
              <div class="contact--box">
                <div class="row justify-content-center">
                  <div class="col12 col-md-6 contact--box_formulaire">
                    <div class="contact--box_text">
                      <div class="row">
                      <div class="col-12 col-md-12">
                        <label class="contact--box_label" for="category">Catégorie du produit : </label>
                          <select class="custom-select" id="category" name="category" required>
                            <option selected>Choisir</option>
                            <option value="Vélo">Vélo</option>
                            <option value="Pièce">Pièce</option>
                            <option value="Accessoire">Accessoire</option>
                          </select>
                      </div>
                        <div class="col-12 col-md-12">
                        <label class="contact--box_label" for="designation">Désignation du produit : </label>
                        <textarea name="designation" rows="10" cols="30" id="designation" placeholder="Désignation du produit" class="form-control"></textarea><br>
                        </div>
                        <div class="col-12 col-lg-6">
                        <label class="contact--box_label" for="price">Prix du produit : </label>
                        <input type="text" id="price" name="price" placeholder="Prix du produit" required class="form-control"><br>
                        </div>
                        <div class="col-12 col-lg-6">
                        <label class="contact--box_label" for="ref_product">Référence du produit : </label>
                        <input type="text" id="ref_product" name="ref_product" placeholder="Référence du produit" required class="form-control"><br>
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
    <script src="../js/script_enregistrement_produit.js"></script>    
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
