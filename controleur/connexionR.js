$(document).ready( function () { 
 $("#reviewer").submit( function() { // � la soumission du formulaire       
  $.ajax({ // fonction permettant de faire de l'ajax
     type: "POST", // methode de transmission des donn�es au fichier php
     url: "connexionRev.php", // url du fichier php
     data: "login="+$("#log").val()+"&pass="+$("#pas").val(), // donn�es � transmettre
     success: function(msg){ // si l'appel a bien fonctionn�
    if(msg==1) // si la connexion en php a fonctionn�e
    {
	$('.erreur').hide();
     $('.success').fadeIn(1000);
	 window.location.href="acceReviewer.php";
    }
    else // si la connexion en php n'a pas fonctionn�e
    {
		$('.success').hide();
		$('.erreur').fadeIn(1000);
		
    }
     }
  });
  return false; // permet de rester sur la m�me page � la soumission du formulaire
 });
});