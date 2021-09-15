<?php
include('../include/header.php');
?>
<?php if ($_SESSION['role'] == 'admin') : ?>

<body>

    <script type="text/javascript">
        $('#toto').css('color', 'blue');
        $('#toto').hide();
        $('#toto').text('ergergergergergr');
        $('#toto').html('<h1>ergergergergergr</h1>');

        $(document).ready(function() {

            // Tableau fait à la main
            $(function() {
                $.ajax({
                    type: 'GET', // GET pour récupérer les données | POST pour récupérer les données
                    url: '../tableau_produit/data.php',
                    success: function(data) {

                        var arrayData = JSON.parse(data);
                        var tabUSer = arrayData['data'];

                        // Boucle jQuery sur le tableau de données tabUser
                        $.each(tabUSer, function(index, data) {

                            console.log('index :' + index);
                            console.log(data.id); // log les ids
                            console.log(data.email); // log les emails ...


                            // HTML à construire

                            $('.tab').append("<tr><td>" + data.id + "</td><td>" + data.ref_product + "</td><td>" + data.category + "</td><td>" + data.designation + "</td><td>" + data.price + "</td><td><button data-id='" + data.id + "' data-ref_product='" + data.ref_product + "' data-category='" + data.category + "' data-designation='" + data.designation + "' data-price='" + data.price + "' class='btn edit' data-toggle='modal' data-target='#editionModal'>EDITION</button></td></tr>");


                        });

                    }
                });
            });


            // Traitement Edition

            // $(".edit").click(function() {
            //     console.log('test id: ' + $(this).attr('data-id').val());
            // }); => ATTENTION ! Ne fonctionne pas car les buttons sont créés dynamiquement

            $(document).on('click', '.edit', function() {

                // console.log('test id: ' + $(this).data('id'));
                $('.deleteBtn').show();
                $('.submitBtn').show();
                $('.addBtn').hide();

                $('.editionModal').modal({
                    keyboard: false
                })

                $('#ref_product').val($(this).data('ref_product'));
                $('#category').val($(this).data('category'));
                $('#designation').val($(this).data('designation'));
                $('#price').val($(this).data('price'));
                $('#id_r').val($(this).data('id'));

            });


            // Gestion du formulaire de modif

            $(".submitBtn").click(function(e) {

                // alert('toto'); On vérifie si on passe bien dans l'event click

                e.preventDefault(); // avoid to execute the actual submit of the form.

                var form = $("#formEdition");


                $.ajax({
                    type: "POST",
                    url: '../tableau_produit/edit.php',
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data) {
                        console.log(data); // show response from the php script.
                        document.location.reload();

                    }
                });


            });


            // Suppression de l'enregistrement

            $(".deleteBtn").click(function(e) {

                // alert('toto'); On vérifie si on passe bien dans l'event click

                e.preventDefault(); // avoid to execute the actual submit of the form.

                var id_r = $('#id_r').val();


                $.ajax({
                    type: "POST",
                    url: '../tableau_produit/delete.php',
                    data: {
                        id_r: id_r
                    },
                    success: function(data) {
                        console.log(data); // show response from the php script.

                        document.location.reload();

                    }
                });


            });


            // Gestion ajout

            $(".add").click(function(e) {
                $('.deleteBtn').hide();
                $('.submitBtn').hide();
                $('.addBtn').show();


                $('.editionModal').modal({
                    keyboard: false
                })

                $('#ref_product').val('');
                $('#category').val('');
                $('#designation').val('');
                $('#price').val('');
                $('#id_r').val('');

                e.preventDefault(); // avoid to execute the actual submit of the form.

            });

            // Formulaire Ajout

            $(".addBtn").click(function(e) {

                // alert('toto'); On vérifie si on passe bien dans l'event click

                e.preventDefault(); // avoid to execute the actual submit of the form.

                var id_r = $('#id_r').val();


                $.ajax({
                    type: "POST",
                    url: '../tableau_produit/delete.php',
                    data: {
                        id_r: id_r
                    },
                    success: function(data) {
                        console.log(data); // show response from the php script.

                        document.location.reload();

                    }
                });


            });



            $(".sendBtn").click(function(e) {



                        // alert('toto'); On vérifie si on passe bien dans l'event click

                        e.preventDefault(); // avoid to execute the actual submit of the form.

                        window.location.replace('enregistrement_commande.php?name='+$('#name').val()+'&forname='+$('#forname').val()+'&phone='+$('#phone').val()+'&address='+$('#address').val()+'&zipcode='+$('#zipcode').val()+'&town='+$('#town').val());



                        });




            // FIN Tableau fait à la main

        });
    </script>


    <body>

        <div class="container" style="margin-top:50px;">
  



            <!-- Tableau Manuel -->

            <table id="manuel" class="table table-hover table-dark" style="width:100%;margin-top:20px;">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Référence produit</th>
                        <th>Catégorie</th>
                        <th>Désignation</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody class="tab">
                    <!-- Alimenté depuis ajax -->
                </tbody>
            </table>


            <!-- Modal d'édition-->
            <div class="editionModal modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Formulaire Edition</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Edition</p>
                            <form id="formEdition">
                                <div class="form-group">
                                    <label for="name">Nom</label>
                                    <input type="text" class="form-control" id="name" name="name" aria-describedby="nh" placeholder="Le nom que vous souhaitez modifier">
                                    <small id="nh" class="form-text text-muted">Info nom</small>

                                    <label for="forname">Prénom</label>
                                    <input type="text" class="form-control" id="forname" name="forname" aria-describedby="nh" placeholder="Le prénom que vous souhaitez modifier">
                                    <small id="nh" class="form-text text-muted">Info prénom</small>

                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="L'adresse email que vous souhaitez modifier">
                                    <small id="emailHelp" class="form-text text-muted">Info email</small>

                                    <label for="phone">Téléphone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" aria-describedby="nh" placeholder="Le numéro de téléphone que vous souhaitez modifier">
                                    <small id="nh" class="form-text text-muted">Info téléphone</small>

                                    <label for="address">Adresse</label>
                                    <input type="text" class="form-control" id="address" name="address" aria-describedby="nh" placeholder="L'adresse que vous souhaitez modifier">
                                    <small id="nh" class="form-text text-muted">Info adresse</small>

                                    <label for="zipcode">Code postal</label>
                                    <input type="text" class="form-control" id="zipcode" name="zipcode" aria-describedby="ph" placeholder="Le code postal que vous souhaitez modifier">
                                    <small id="ph" class="form-text text-muted">Info code postal</small>

                                    <label for="town">Ville</label>
                                    <input type="text" class="form-control" id="town" name="town" aria-describedby="nh" placeholder="La ville que vous souhaitez modifier">
                                    <small id="nh" class="form-text text-muted">Info email</small>

                                    <input id="id_r" name="id_r" type="hidden" value="">
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="submitBtn btn btn-success">Valider</button>
                            <button type="submit" class="addBtn btn btn-info">Enregistrer</button>
                            <button type="button" class="deleteBtn btn btn-warning">Supprimer</button>
                            <button type="button" class="sendBtn btn btn-primary">Ajouter</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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