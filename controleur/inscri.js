$(document).ready( function () { 
 $("#inscri").submit( function() { // � la soumission du formulaire       
  $.ajax({ // fonction permettant de faire de l'ajax
     type: "POST", // methode de transmission des donn�es au fichier php
     url: "inscri.php", // url du fichier php
     data: "nomA="+$("#nomA").val()+"&prenomA="+$("#prenomA").val()+"&email="+$("#email").val()+"&login="+$("#login").val()+"&pass="+$("#pass").val()+"&passC="+$("#passC").val(), // donn�es � transmettre
     success: function(msg){ // si l'appel a bien fonctionn�
    if(msg==1) // si la connexion en php a fonctionn�e
    {
	
	$('.su').hide();
		$('.er').fadeIn(1000);
    }
    else // si la connexion en php n'a pas fonctionn�e
    {
		$('.er').hide();
     $('.su').fadeIn(1000);
	
    }
     }
  });
  return false; // permet de rester sur la m�me page � la soumission du formulaire
 });
});