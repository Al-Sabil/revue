$(document).ready( function () { 
 $("#connexion1").submit( function() { // � la soumission du formulaire       
  $.ajax({ // fonction permettant de faire de l'ajax
     type: "POST", // methode de transmission des donn�es au fichier php
     url: "connexionM.php", // url du fichier php
     data: "&login="+$("#login1").val()+"&pass="+$("#pass1").val(), // donn�es � transmettre
     success: function(msg){ // si l'appel a bien fonctionn�
    if(msg==1) // si la connexion en php a fonctionn�e
    {
	$('.erreur').hide();
     $('.success').fadeIn(1000);
	 window.location.href="acceUser.php";
	 console.log(msg);
    }
    else // si la connexion en php n'a pas fonctionn�e
    {
	
	 $('.success').hide();
		$('.erreur').fadeIn(1000);
		console.log(msg);
    }
     }
  });
  return false; // permet de rester sur la m�me page � la soumission du formulaire
 });
});