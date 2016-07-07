<?php
include_once('../modele/connexion.php');

session_start();
if(!isset($_SESSION["id"])){
	echo"vous n'avais pas le droit d'acceder a cette page";
	exit();
}else
$auteur=$_POST["auteur"];
$mes="";

if(isset($_POST["submit"])){
$auteur=$_POST["auteur"];
$sujet=$_POST["sujet"];
$mes=$_POST["message"];

$header='Notification';
if(mail($auteur,$sujet,$mes,$header)){
$mes="<div class='row'>
			<div class='col-4 offset-1'>
				<div class='alert alert-success'>
				
					<strong>Succée!</strong> Votre message a été envoyé avec succée.
				</div>
			</div>
		</div>";}
else $mes="Vérifier l@ mail !";
}
include_once('../vue/VueSendMail.php');

?>