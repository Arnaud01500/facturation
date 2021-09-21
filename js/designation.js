/* initialisation paramètres globaux : */
var cache = {}; /* tableau cache de tous les termes */
var term = null; /* terme renseigné dans le champ input */
var baseUrl = 'http://facturation/site/enregistrement_commande.php'; /* url du site */
baseUrl = '';
$(document).ready(function() {
	/* name autocomplete */
	$('#product_designation').autocomplete({
		minLength:2, /* nombre de caractères minimaux pour lancer une recherche */
		delay:200, /* delais après la dernière touche appuyée avant de lancer une recherche */
		scrollHeight:320,
		appendTo:'#product_designation-container', /* div ou afficher la liste des résultats, si null, ce sera une div en position fixe avant la fin de </body> */
		
		/* dès qu'une recherche se lance, source est executé, il peut contenir soit un tableau JSON de termes, soit une fonctions qui retournera un résultat */
		source:function(e,t){
			term = e.term; /* récupération du terme renseigné dans l'input */
			if(term in cache){ /* on vérifie que la clé "term" existe dans le tableau "cache", si oui alors on affiche le résultat */
				t(cache[term]);
			}else{ /* sinon on fait une requête ajax vers name.php pour rechercher "term" */
				$('#loading').attr('style','');
				$.ajax({
					type:'GET',
					url:'../autocomplete/designation.php',
					data:'product_designation='+e.term,
					dataType:"json",
					async:true,
					cache:true,
					success:function(e){
						cache[term] = e; /* vide ou non, on stocke la liste des résultats avec en clé "term" */
						if(!e.length){ /* si aucun résultats, on renvoi un tableau vide pour informer qu'on a rien trouvé */
							var result = [{
								label: 'Aucun produit trouvé...',
								value: null,
								id: null,
							}];
							t(result); /* envoit du résultat à source */
						}else{ /* sinon on renvoi toute la liste */
							t($.map(e, function (item){
								return{
									label: item.label,
									value: item.value,
									product_code: item.product_code,
                                    product_price: item.product_price,
                                    stock_qty: item.stock_qty,

								}
							}));  /* envoit du résultat à source avec map() de jQuery (permet d'appliquer une fonction pour tous les éléments d'un tableau */
						}
						$('#loading').attr('style','display:none;');



                        
					}
				});
			}
		},
		
		/* sélection depuis la liste des résultats (flèches ou clic) > ajout du résultat automatique et callback */
		// select: function(event, ui) {
		// 	$('form input[product_designation="product_designation-product_code"]').val(ui.item ? ui.item.product_code : ''); /* on récupère juste l'id qu'on stocke dans l'autre input */
		// },
        select: function(event, ui) {
			$('#product_code').val(ui.item ? ui.item.product_code : '');
            $('#product_price').val(ui.item ? ui.item.product_price : '');
            $('#stock_qty').val(ui.item ? ui.item.stock_qty : '');


            /* On récupère le numéro client pour l'insérer dans l'input */
        },


		open: function() {
			$(this).removeClass("ui-corner-all").addClass("ui-corner-top");
		},
		close: function() {
			$(this).removeClass("ui-corner-top").addClass("ui-corner-all");
		},
	});
});