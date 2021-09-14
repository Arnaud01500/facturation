<?php
include('../include/header.php');
?>
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
                        <label class="contact--box_label" for="designation">Libellé du produit : </label>
                        <input type="text" id="designation" name="designation" placeholder="Désignation du produit" required required class="form-control">
                        </div>
                        <div class="col-12 col-lg-6">
                        <label class="contact--box_label" for="price">Prix du produit : </label>
                        <input type="text" id="price" name="price" placeholder="Prix du produit" required class="form-control"><br>
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
    <script type="text/javascript">
    $(window).on('load', function() {
    $('#myModal').modal('show');
    });
    </script>    
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
</body>
</html>


<?php
unset($_SESSION['success']);
?>