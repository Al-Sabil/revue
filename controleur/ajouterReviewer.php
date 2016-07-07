<?php
include_once('../modele/connexion.php');
session_start();
if(!isset($_SESSION["id"])){
	echo"vous n'avais pas le droit d'acceder a cette page";
	exit();
}else
	$mess="";
	if(isset($_POST["s"])){
			
			include('../modele/classreviewer.php');
			$r = new reviewer('',$_POST["nom"],$_POST["prenom"],$_POST["mail"],$_POST["login"],$_POST["pass"],$_POST["groupe"]);
			if($r->addreviewer())
			{
				$mes="Bonjour ".$_POST["prenom"]." , vous êtes invité pour être un Reviewer dans Al-Sabil. Voilà vos coordonnées : 
				 Login :" .$_POST["login"]. " Mot de pass :" .$_POST["pass"]." 
				 Veuillez nous visité, Merci.";
				if(mail($_POST["mail"],'Reviewing',$mes,'Invitation')){
					$mess="<div class='alert alert-success'>
							<strong>Succée!</strong> Ce reviewer a été enregistré, et le mail a été envoyer avec succée&nbsp &nbsp<a href='../controleur/Reviewers.php'>retour</a>
						</div>";}
				else{$mess="<div class='alert alert-success'>
							<strong>Succée!</strong> Ce reviewer a été enregistré, mais le mail n'est pas envoyer&nbsp &nbsp<a href='../controleur/sendmail.php'>Envoi par ici</a>
						</div>";}
			}
			else{$mess="echec";}
			}
	include_once('../vue/VueAjouterReviewer.php');
?>