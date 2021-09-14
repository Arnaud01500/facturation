$(document).ready(function() {
    $("#basic-form").validate({
      rules: {
        name : {
          required: true,
        },
        forname: {
          required: true,
        },
        email: {
          required: true,
          email: true
        },
        phone: {
          required: true,
        },
        adress: {
          required: true,
        },
        zipcode: {
          required: true,
        },
        town: {
          required: true,
        }
      },
        messages : {
        name: {
            required: "Veuillez saisir le nom du client",
        },
        forname: {
          required: "Veuillez saisir le prénom du client",
        },
        email: {
          required: "Veuillez saisir l'adresse email du client",
        },
        phone: {
          required: "Veuillez saisir le numéro de téléphone du client",
        },
        adress: {
          required: "Veuillez saisir l'adresse du client",
        },
        zipcode: {
          required: "Veuillez saisir le code postal du client",
        },
        town: {
          required: "Veuillez saisir la ville de résidence du client"
        }
      }
    });
  });