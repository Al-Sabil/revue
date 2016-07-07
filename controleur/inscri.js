$(document).ready( function () { 
 $("#inscri").submit( function() { // à la soumission du formulaire       
  $.ajax({ // fonction permettant de faire de l'ajax
     type: "POST", // methode de transmission des données au fichier php
     url: "inscri.php", // url du fichier php
     data: "nomA="+$("#nomA").val()+"&prenomA="+$("#prenomA").val()+"&email="+$("#email").val()+"&login="+$("#login").val()+"&pass="+$("#pass").val()+"&passC="+$("#passC").val(), // données à transmettre
     success: function(msg){ // si l'appel a bien fonctionné
    if(msg==1) // si la connexion en php a fonctionnée
    {
	
	$('.su').hide();
		$('.er').fadeIn(1000);
    }
    else // si la connexion en php n'a pas fonctionnée
    {
		$('.er').hide();
     $('.su').fadeIn(1000);
	
    }
     }
  });
  return false; // permet de rester sur la même page à la soumission du formulaire
 });
});