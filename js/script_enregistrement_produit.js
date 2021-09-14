$(document).ready(function() {
    $("#basic-form").validate({
      rules: {
        designation: {
          required: true,
        },
        price: {
          required: true,
          number: true
        }
      },
        messages : {
        designation: {
          required: "Veuillez saisir la désignation du produit",
        },
        price: {
          required: "Veuillez saisir le prix du produit",
          number:"Veuillez saisir uniquement des chiffres",
        }
      }
    });
  });
