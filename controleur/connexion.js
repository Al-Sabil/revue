$(document).ready( function () { 
 $("#connexion").submit( function() { // à la soumission du formulaire       
  $.ajax({ // fonction permettant de faire de l'ajax
     type: "POST", // methode de transmission des données au fichier php
     url: "connexionML.php", // url du fichier php
     data: "login="+$("#login2").val()+"&pass="+$("#pass2").val(), // données à transmettre
     success: function(msg){ // si l'appel a bien fonctionné
    if(msg==1) // si la connexion en php a fonctionnée
    {
	$('.erreur').hide();
     $('.success').fadeIn(1000);
	 window.location.href="redige.php";
    }
    else // si la connexion en php n'a pas fonctionnée
    {
		$('.success').hide();
		$('.erreur').fadeIn(1000);
		
    }
     }
  });
  return false; // permet de rester sur la même page à la soumission du formulaire
 });
});