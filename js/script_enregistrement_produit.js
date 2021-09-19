$(document).ready(function() {
    $("#basic-form").validate({
      rules: {
        product_designation: {
          required: true,
        },
        product_price: {
          required: true,
          number: true
        },
        product_code: {
          required: true,
        },
        product_qty: {
          required: true,
          number: true
        }
      },
        messages : {
        product_designation: {
          required: "Veuillez saisir la désignation du produit",
        },
        product_price: {
          required: "Veuillez saisir le prix du produit",
          number:"Veuillez saisir uniquement des chiffres",
        },
        product_code: {
          required: "Veuillez saisir le prix du produit",
        },
        product_qty: {
          required: "Veuillez saisir a quantité",
          number:"Veuillez saisir uniquement des chiffres",
        }
      }
    });
  });
