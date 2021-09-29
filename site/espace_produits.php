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
                        console.log(data.id); // log les emails ...


                            // HTML à construire

                            $('.tab').append("<tr><td>" + data.id + "</td><td>" + data.product_code + "</td><td>" + data.product_designation + "</td><td>" + data.product_price + "</td><td>" + data.product_qty + "</td><td><button data-id='" + data.id + "' data-product_code='" + data.product_code + "' data-product_designation='" + data.product_designation + "' data-product_price='" + data.product_price + "' data-product_qty='" + data.product_qty + "' data-product_image='" + data.product_image + "' class='btn edit' data-toggle='modal' data-target='#editionModal'>EDITION</button></td></tr>");


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

                $('#id_r').val($(this).data('id'));
                $('#product_designation').val($(this).data('product_designation'));
                $('#product_price').val($(this).data('product_price'));
                $('#product_qty').val($(this).data('product_qty'));
                $('#product_code').val($(this).data('product_code'));

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
                        <th>Désignation</th>
                        <th>Prix</th>
                        <th>Quantité</th>

                    </tr>
                </thead>
                <tbody class="tab">
                    <!-- Alimenté depuis ajax -->
                </tbody>
            </table>


            <!-- Modal d'édition-->
            <div class="editionModal modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Formulaire Edition</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Edition produit</p>
                            <form id="formEdition">
                                <div class="form-group">

                                    <label for="product_code">Référence</label>
                                    <input type="text" class="form-control" id="product_code" name="product_code" aria-describedby="nh" placeholder="La référence que vous souhaitez modifier">
                                    <small id="nh" class="form-text text-muted">Info référence</small>

                                    <label for="product_designation">Désignation</label>
                                    <input type="text" class="form-control" id="product_designation" name="product_designation" aria-describedby="nh" placeholder="La désignation que vous souhaitez modifier">
                                    <small id="nh" class="form-text text-muted">Info désignation</small>

                                    <label for="product_price">Prix</label>
                                    <input type="text" class="form-control" id="product_price" name="product_price" aria-describedby="nh" placeholder="Le prix que vous souhaitez modifier">
                                    <small id="nh" class="form-text text-muted">Info prix</small>

                                    <label for="product_qty">Stocks</label>
                                    <input type="text" class="form-control" id="product_qty" name="product_qty" aria-describedby="nh" placeholder="Le stock que vous souhaitez modifier">
                                    <small id="nh" class="form-text text-muted">Info stocks</small>

                                    <label for="product_image">Fichier</label>
                                    <input type="text" class="form-control" id="product_image" name="product_image" aria-describedby="nh" placeholder="Le fichier que vous souhaitez modifier">
                                    <small id="nh" class="form-text text-muted">Info fichier</small>





                                            <?php
                                            include('../config.php');
                                            $sql = "SELECT file_img FROM files WHERE file_num=5";
                                            $result = mysqli_query($link, $sql);
                                            $row = mysqli_fetch_assoc($result);
                                            echo "<img src='../uploads/".$row['file_img']."' width='300px' ><br>";  
                                            ?>


                                </div>
                                <input id="id_r" name="id_r" type="hidden" value="">

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="submitBtn btn btn-success">Valider</button>
                            <button type="submit" class="addBtn btn btn-info">Enregistrer</button>
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