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
                    url: '../tableau_historique_commandes/data.php',
                    success: function(data) {

                        var arrayData = JSON.parse(data);
                        var tabUSer = arrayData['data'];

                        // Boucle jQuery sur le tableau de données tabUser
                        $.each(tabUSer, function(index, data) {

                            console.log('index :' + index);
                            console.log(data.ref_order); // log les ids
                            console.log(data.email); // log les emails ...


                            // HTML à construire

                            $('.tab').append("<tr><td>" + data.ref_order + "</td><td>" + data.name + "</td><td>" + data.forname + "</td><td>" + data.phone + "</td><td>" + data.address + "</td><td>" + data.zipcode + "</td><td>" + data.town + "</td><td>" + data.ref_product + "</td><td>" + data.quantity + "</td><td>" + data.time + "</td><td><button data-ref_order='" + data.ref_order + "' data-ref_order='" + data.ref_order + "' data-name='" + data.name + "' data-forname='" + data.forname + "' data-phone='" + data.phone + "' data-address='" + data.address + "' data-zipcode='" + data.zipcode + "' data-town='" + data.town + "' data-reference='" + data.ref_product + "' data-quantity='" + data.quantity + "' data-time='" + data.time +  "' class='btn edit' data-toggle='modal' data-target='#editionModal'>EDITION</button></td></tr>");


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
                $('#name').val($(this).data('name'));
                $('#forname').val($(this).data('forname'));
                $('#phone').val($(this).data('phone'));
                $('#address').val($(this).data('address'));
                $('#zipcode').val($(this).data('zipcode'));
                $('#town').val($(this).data('town'));
                $('#ref_product').val($(this).data('ref_product'));
                $('#quantity').val($(this).data('quantity'));
                $('#time').val($(this).data('time'));
                $('#ref_order_r').val($(this).data('ref_order'));


            });


            // Gestion du formulaire de modif

            $(".submitBtn").click(function(e) {

                // alert('toto'); On vérifie si on passe bien dans l'event click

                e.preventDefault(); // avoid to execute the actual submit of the form.

                var form = $("#formEdition");


                $.ajax({
                    type: "POST",
                    url: '../tableau_historique_commandes/edit.php',
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

                var ref_order_r = $('#ref_order_r').val();


                $.ajax({
                    type: "POST",
                    url: '../tableau_historique_commandes/delete.php',
                    data: {
                        ref_order_r: ref_order_r
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

                $('#name').val('');
                $('#forname').val('');
                $('#phone').val('');
                $('#address').val('');
                $('#zipcode').val('');
                $('#town').val('');
                $('#ref_product').val('');
                $('#quantity').val('');
                $('#time').val('');

                e.preventDefault(); // avoid to execute the actual submit of the form.

            });

            // Formulaire Ajout

            $(".addBtn").click(function(e) {

                // alert('toto'); On vérifie si on passe bien dans l'event click

                e.preventDefault(); // avoid to execute the actual submit of the form.

                var ref_order_r = $('#ref_order_r').val();


                $.ajax({
                    type: "POST",
                    url: '../tableau_historique_commandes/delete.php',
                    data: {
                        ref_order_r: ref_order_r
                    },
                    success: function(data) {
                        console.log(data); // show response from the php script.

                        document.location.reload();

                    }
                });


            });

            $(".pdfBtn").click(function(e) {

            // alert('toto'); On vérifie si on passe bien dans l'event click

            e.preventDefault(); // avoid to execute the actual submit of the form.





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
                        <th>Numéro de commande</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Téléphone</th>
                        <th>Adresse</th>
                        <th>Code postal</th>
                        <th>Ville</th>
                        <th>Référence</th>
                        <th>Quantité</th>
                        <th>Date & Heure</th>
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
                            <p>Générer un document</p>
                            <form id="formEdition">
                                <div class="form-group">

                                    <input id="ref_order_r" name="ref_order_r" type="hidden" value="">
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="pdfBtn btn btn-success">Générer un PDF</button>
                            <button type="button" class="deleteBtn btn btn-warning">Supprimer</button>
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