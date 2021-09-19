
<?php
include('../include/header.php');
?>
<?php if ($_SESSION['role'] == 'admin') : ?>

    <script>
/* initialisation paramètres globaux : */
var cache = {}; /* tableau cache de tous les termes */
var term = null; /* terme renseigné dans le champ input */
var baseUrl = 'http://facturation/site/enregistrement_commande.php'; /* url du site */
baseUrl = '';

$(document).ready(function() {
	/* name autocomplete */
	$('#customer_name').autocomplete({
		minLength:2, /* nombre de caractères minimaux pour lancer une recherche */
		delay:200, /* delais après la dernière touche appuyée avant de lancer une recherche */
		scrollHeight:320,
		appendTo:'#customer_name-container', /* div ou afficher la liste des résultats, si null, ce sera une div en position fixe avant la fin de </body> */
		
		/* dès qu'une recherche se lance, source est executé, il peut contenir soit un tableau JSON de termes, soit une fonctions qui retournera un résultat */
		source:function(e,t){
			term = e.term; /* récupération du terme renseigné dans l'input */
			if(term in cache){ /* on vérifie que la clé "term" existe dans le tableau "cache", si oui alors on affiche le résultat */
				t(cache[term]);
			}else{ /* sinon on fait une requête ajax vers name.php pour rechercher "term" */
				$('#loading').attr('style','');
				$.ajax({
					type:'GET',
					url:'../autocomplete/name.php',
					data:'customer_name='+e.term,
					dataType:"json",
					async:true,
					cache:true,
					success:function(e){
						cache[term] = e; /* vide ou non, on stocke la liste des résultats avec en clé "term" */
						if(!e.length){ /* si aucun résultats, on renvoi un tableau vide pour informer qu'on a rien trouvé */
							var result = [{
								label: 'Aucun nom trouvé...',
								value: null,
								id: null,
							}];
							t(result); /* envoit du résultat à source */
						}else{ /* sinon on renvoi toute la liste */
							t($.map(e, function (item){
								return{
									label: item.label,
									value: item.value,
									id: item.id,
								}
							}));  /* envoit du résultat à source avec map() de jQuery (permet d'appliquer une fonction pour tous les éléments d'un tableau */
						}
						$('#loading').attr('style','display:none;');
					}
				});
			}
		},
		
		/* sélection depuis la liste des résultats (flèches ou clic) > ajout du résultat automatique et callback */
		select: function(event, ui) {
			$('form input[customer_name="customer_name-id"]').val(ui.item ? ui.item.id : ''); /* on récupère juste l'id qu'on stocke dans l'autre input */
		},
		open: function() {
			$(this).removeClass("ui-corner-all").addClass("ui-corner-top");
		},
		close: function() {
			$(this).removeClass("ui-corner-top").addClass("ui-corner-all");
		},
	});
});
</script>






<body>
    <section>

    <form id="basic-form" action="../traitement/traitement_enregistrement_commande.php" method="POST">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col12 col-md-9 contact--box_formulaire">
                        <div class="row">
                          <div class="col-12 col-lg-6">





                          <label class="contact--box_label contact--box_labelwhite" for="customer_name">Nom : </label>
                          <span id="customer_name-container">
                          <input type="text" id="customer_name" name="customer_name" placeholder="Nom du client" required class="form-control">
                          </span>
                          <span id="loading" style="display:none;"><i class="fa fa-circle-o-notch fa-spin"></i></span>
                          <input type="hidden" name="customer_name-hidden">






                          </div>
                          <div class="col-12 col-lg-6">
                          <label class="contact--box_label contact--box_labelwhite" for="forname">Prénom : </label>
                          <input type="text" id="forname" name="forname" placeholder="Prénom du client" required class="form-control">
                          </div>
                          <div class="col-12 col-md-12">
                          <label class="contact--box_label contact--box_labelwhite" for="phone">Téléphone : </label>
                          <input type="tel" id="phone" name="phone" placeholder="Numéro de téléphone du client" required class="form-control">
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
                                <div class="form-main">
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


