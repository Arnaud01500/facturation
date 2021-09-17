<?php
include('../include/header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <!-- Config DATATABLES https://datatables.net/download/ -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.11.1/af-2.3.7/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/cr-1.5.4/r-2.2.9/sb-1.2.1/datatables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.11.1/af-2.3.7/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/cr-1.5.4/r-2.2.9/sb-1.2.1/datatables.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css">

</head>

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
                    url: '../Tableau_client/data.php',
                    success: function(data) {

                        var arrayData = JSON.parse(data);
                        var tabUSer = arrayData['data'];

                        // Boucle jQuery sur le tableau de données tabUser
                        $.each(tabUSer, function(index, data) {




                            // HTML à construire

                            $('.tab').append("<tr><td>" + data.customer_num + "</td><td>" + data.customer_name + "</td><td>" + data.customer_forname + "</td><td>" + data.customer_email + "</td><td>" + data.customer_phone + "</td><td>" + data.customer_address + "</td><td>" + data.customer_zipcode + "</td><td>" + data.customer_town + "</td><td><button data-customer_num='" + data.customer_num + "' data-customer_name='" + data.customer_name + "' data-customer_forname='" + data.customer_forname + "' data-customer_email='" + data.customer_email + "' data-customer_phone='" + data.customer_phone + "' data-customer_address='" + data.customer_address + "'data-customer_zipcode='" + data.customer_zipcode + "'data-customer_town='" + data.customer_town + "' class='btn edit' data-toggle='modal' data-target='#editionModal'>EDITION</button></td></tr>");


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
                $('#customer_name').val($(this).data('customer_name'));
                $('#customer_forname').val($(this).data('customer_forname'));
                $('#customer_email').val($(this).data('customer_email'));
                $('#customer_phone').val($(this).data('customer_phone'));
                $('#customer_address').val($(this).data('customer_address'));
                $('#customer_zipcode').val($(this).data('customer_zipcode'));
                $('#customer_town').val($(this).data('customer_town'));
                $('#customer_num_r').val($(this).data('customer_num'));

            });


            // Gestion du formulaire de modif

            $(".submitBtn").click(function(e) {

                // alert('toto'); On vérifie si on passe bien dans l'event click

                e.preventDefault(); // avoid to execute the actual submit of the form.

                var form = $("#formEdition");


                $.ajax({
                    type: "POST",
                    url: '../Tableau_client/edit.php',
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

                var customer_num_r = $('#customer_num_r').val();


                $.ajax({
                    type: "POST",
                    url: '../Tableau_client/delete.php',
                    data: {
                        customer_num_r: customer_num_r
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

                $('#customer_name').val('');
                $('#customer_forname').val('');
                $('#customer_email').val('');
                $('#customer_phone').val('');
                $('#customer_address').val('');
                $('#customer_zipcode').val('');
                $('#customer_town').val('');
                $('#customer_num_r').val('');

                e.preventDefault(); // avoid to execute the actual submit of the form.

            });

            // Formulaire Ajout

            $(".addBtn").click(function(e) {

                // alert('toto'); On vérifie si on passe bien dans l'event click

                e.preventDefault(); // avoid to execute the actual submit of the form.

                var customer_num_r = $('#customer_num_r').val();


                $.ajax({
                    type: "POST",
                    url: '../Tableau_client/delete.php',
                    data: {
                        customer_num_r: customer_num_r
                    },
                    success: function(data) {
                        console.log(data); // show response from the php script.

                        document.location.reload();

                    }
                });


            });

                                    // FIN Tableau fait à la main


                                // Initialisation DataTables
                            //         $('#example').DataTable({
                            //             "ajax": {
                            //                 "processing": true,
                            //                 "url": "./data.php"
                            //             },
                            //             dom: 'Bfrtip',
                            //             buttons: [
                            //                 'copyHtml5',
                            //                 'excelHtml5',
                            //                 'csvHtml5',
                            //                 'pdfHtml5'
                            //             ],
                            //             select: true,
                            //             columns: [{
                            //                     'data': 'id'
                            //                 },
                            //                 {
                            //                     'data': 'customer_name'
                            //                 },
                            //                 {
                            //                     'data': 'customer_forname'
                            //                 },
                            //                 {
                            //                     'data': 'customer_email'
                            //                 },
                            //                 {
                            //                     'data': 'customer_phone'
                            //                 },
                            //                 {
                            //                     'data': 'customer_address'
                            //                 },
                            //                 {
                            //                     'data': 'customer_zipcode'
                            //                 },
                            //                 {
                            //                     'data': 'customer_town'
                            //                 }
                            //             ]
                            //         });


        });
    </script>


    <body>

        <div class="container" style="margin-top:50px;">



            <!-- Tableau Manuel -->
            <!-- <button class="btn btn-lg btn-info add">Ajouter un enregistrement</button> -->

         <table id="manuel" class="table table-hover table-dark" style="width:100%;margin-top:20px;">
                <thead class="thead-dark">
                    <tr>
                        <th>numéro client</th>
                        <th>nom</th>
                        <th>prenom</th>
                        <th>email</th>
                        <th>téléphone</th>
                        <th>adresse</th>
                        <th>Code postal</th>
                        <th>Ville</th>
                    </tr>
                </thead>
                <tbody class="tab">
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
                            <p>Edition client</p>
                            <form id="formEdition">
                                <div class="form-group">

                                    <label for="customer_name">Nom</label>
                                    <input type="text" class="form-control" id="customer_name" name="customer_name" aria-describedby="nh" placeholder="Veuillez saisir le nom du client">
                                    <small id="nh" class="form-text text-muted">Nom du client</small>

                                    <label for="customer_forname">Prénom</label>
                                    <input type="text" class="form-control" id="customer_forname" name="customer_forname" aria-describedby="nh" placeholder="Veuillez saisir le prénom du client">
                                    <small id="nh" class="form-text text-muted">Prénom du client</small>

                                    <label for="customer_email">Email</label>
                                    <input type="email" class="form-control" id="customer_email" name="customer_email" aria-describedby="ph" placeholder="Veulliez saisir l'adresse email du client">
                                    <small id="ph" class="form-text text-muted">Email du client</small>

                                    <label for="customer_phone">Téléphone</label>
                                    <input type="text" class="form-control" id="customer_phone" name="customer_phone" aria-describedby="emailHelp" placeholder="Veuillez saisir un numéro de téléphone">
                                    <small id="emailHelp" class="form-text text-muted">Numéro de téléphone du client</small>

                                    <label for="customer_address">Adresse</label>
                                    <input type="text" class="form-control" id="customer_address" name="customer_address" aria-describedby="ph" placeholder="Veuillez saisir l'adresse du client">
                                    <small id="ph" class="form-text text-muted">Adresse du client</small>

                                    <label for="customer_zipcode">Code postal</label>
                                    <input type="text" class="form-control" id="customer_zipcode" name="customer_zipcode" aria-describedby="ph" placeholder="Veuillez saisir le code postal du client">
                                    <small id="ph" class="form-text text-muted">Code postal du client</small>

                                    <label for="customer_town">Ville</label>
                                    <input type="text" class="form-control" id="customer_town" name="customer_town" aria-describedby="ph" placeholder="Veuillez saisir la ville de résidence du client">
                                    <small id="ph" class="form-text text-muted">Ville de résidence du client</small>


                                    <input id="customer_num_r" name="customer_num_r" type="hidden" value="">
                                </div>

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

    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>