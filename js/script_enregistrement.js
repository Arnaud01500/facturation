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
          "regex": /^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/
        },
        address: {
          required: true,
        },
        zipcode: {
          required: true,
          "regexzip": /^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/
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
        address: {
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

  jQuery.validator.addMethod(
    "regex",
     function(value, element, regexp) {
         if (regexp.constructor != RegExp)
            regexp = new RegExp(regexp);
         else if (regexp.global)
            regexp.lastIndex = 0;
            return this.optional(element) || regexp.test(value);
     },"Le format du numéro de téléphone doit être valide"
  );

  jQuery.validator.addMethod(
    "regexzip",
     function(value, element, regexp) {
         if (regexp.constructor != RegExp)
            regexp = new RegExp(regexp);
         else if (regexp.global)
            regexp.lastIndex = 0;
            return this.optional(element) || regexp.test(value);
     },"Le format du code postal doit être valide"
  );

  
  $(document).ready(function(){	
    $("#contactForm").submit(function(event){
      submitForm();
      return false;
    });
  });
  function submitForm(){
    $.ajax({
     type: "POST",
     url: "saveContact.php",
     cache:false,
     data: $('form#contactForm').serialize(),
     success: function(response){
       $("#contact").html(response)
       $("#contact-modal").modal('hide');
     },
     error: function(){
       alert("Error");
     }
   });
 }