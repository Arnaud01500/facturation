
<?php
include('../include/header.php');
?>
<?php if ($_SESSION['role'] == 'admin') : ?>

    <script src=../js/name.js></script>
    <script src=../js/designation.js></script>




<body>
    <section>

    <form id="basic-form" action="../traitement/traitement_enregistrement_commande.php" method="POST">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col12 col-md-9">
                        <div class="row">
                          <div class="col-12 col-lg-6">
                          <label for="customer_name">Identité du client : </label>
                          <span id="customer_name-container">
                          <input type="text" id="customer_name" name="customer_name" placeholder="Nom du client" required class="form-control">
                          </span>
                          <span id="loading" style="display:none;"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                          <input type="hidden" name="customer_name-hidden">
                          </div>
                          <div class="col-12 col-lg-6">
                          <label for="customer_num">Numéro client : </label>
                          <input type="text" id="customer_num" name="customer_num" placeholder="Référence" required class="form-control">
                          </div>
                        </div>
                          <div class="row">
                          <div class="col-12 col-lg-12">
                          <label for="product_designation">Désignation : </label>
                          <span id="product_designation-container">
                          <input type="text" id="product_designation" name="product_designation" placeholder="Désignation" required class="form-control">
                          </span>
                          <span id="loading" style="display:none;"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                          <input type="hidden" name="product_designation-hidden">
                          </div>
                          </div>
                          <div class="row">
                            <div class="col-12 col-lg-3">
                          <label for="product_code">Référence : </label>
                          <input type="text" id="product_code" name="product_code" placeholder="Référence" required class="form-control">
                          </div>
                          <div class="col-12 col-lg-3">
                          <label for="stock_qty">Quantité en stocks: </label>
                          <input type="text" id="stock_qty" name="stock_qty" placeholder="Quantité" required class="form-control">
                          </div>
                          <div class="col-12 col-lg-6">
                          <label for="product_price">Prix: </label>
                          <input type="tel" id="product_price" name="product_price" placeholder="Prix" required class="form-control">
                          </div>
                          </div>
                          <div class="row">
                            <div class="col-12 col-lg-6">
                          <label for="order_qty">Quantité commandée: </label>
                          <input type="text" id="order_qty" name="order_qty" placeholder="Quantité commandée" required class="form-control">
                          </div>
                          <div class="col-12 col-lg-6">
                          <label for="phone">Total commande: </label>
                          <input type="tel" id="phone" name="phone" placeholder="Total commande" required class="form-control">
                          </div>

                        </div><br>
                          <!--
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
                          </div> -->
                          <div class="col-12 col-md-12">
                                <!-- <div class="form-main">
                                    <div class="form-block">
                                      <div class="row">
                                              <div class="col-12 col-lg-6">
                                                  <label class="contact--box_label contact--box_labelwhite" for="ref_product">Référence : </label>
                                                  <input type="text" id="ref_product" name="ref_product" placeholder="Saisir la référence" required class="form-control">
                                              </div>
                                              <div class="col-12 col-lg-6">
                                                  <label class="contact--box_label contact--box_labelwhite" for="quantity">Quantité : </label>
                                                  <input type="text" id="quantity" name="quantity" placeholder="Saisir la quantité" required class="form-control">
                                              </div>
                                        </div><br>
                                  </div> -->
                                  <div class="row">
                                      <div class="result"></div>
                                          <div class="buttons">
                                          <input type="button" id="ajouter" name="ajouter" value="Ajouter" required class="btn btn-success" onclick="plus_com();"/>
                                          <input type="text" id="param" name="param" style="visibility:hidden;"/>
                                          <button class="remove btn btn-danger">Supprimer un produit</button>
                                          <input type="submit" name="formulaire" value="Saisir la commande" required class="btn btn-primary">
                                          <input type="text" id="chaine_com" name="chaine_com" style="visibility:hidden;" />
                                          <input type="text" id="total_com" name="total_com" style="visibility:hidden;" />
                                      </div>
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
        <section>
          <div style="float:left; width:100%; height:auto;" id="det_com">
          <div class="bord"></div>
          <div class="suite">
          B001
          </div>
          <div class="suite">
          125
          </div>
          <div class="des">
          Chaise roulante pour bureau d'entreprise
          </div>
          <div class="prix">
          125.25
          </div>
          <div class="prix" style="font-weight:bold;">
          1243.75
          </div>
          <div class="bord"></div>
          </div>  
        </section>

<script language='javascript' type="text/javascript">

var tot_com = 0;

function plus_com()
{
if(customer_name.value != "" && customer_num.value != "" && product_designation.value != "" && product_code.value !="" && stock_qty.value !="0" && stock_qty.value !="" && product_price.value !="" && order_qty.value !="" && order_qty.value !="0")
{
if(parseInt(order_qty.value) > parseInt(stock_qty.value))
alert("La quantité en stock n'est pas suffisante pour honorer la commande");
else
{

}
}
}

function facture()
{

}
</script>

<script src="../js/script_ajout_enregistrement_commande.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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


