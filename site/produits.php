<!DOCTYPE html>
<html lang="fr">
  <head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <!-- CSS only -->
  </head>
<?php
include('../include/header.php');
?>

<form id="basic-form" action="../traitement/traitement_produits.php" method="POST">
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