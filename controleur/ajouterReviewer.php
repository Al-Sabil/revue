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
				$mes="Bonjour ".$_POST["prenom"]." , vous �tes invit� pour �tre un Reviewer dans Al-Sabil. Voil� vos coordonn�es : 
				 Login :" .$_POST["login"]. " Mot de pass :" .$_POST["pass"]." 
				 Veuillez nous visit�, Merci.";
				if(mail($_POST["mail"],'Reviewing',$mes,'Invitation')){
					$mess="<div class='alert alert-success'>
							<strong>Succ�e!</strong> Ce reviewer a �t� enregistr�, et le mail a �t� envoyer avec succ�e&nbsp &nbsp<a href='../controleur/Reviewers.php'>retour</a>
						</div>";}
				else{$mess="<div class='alert alert-success'>
							<strong>Succ�e!</strong> Ce reviewer a �t� enregistr�, mais le mail n'est pas envoyer&nbsp &nbsp<a href='../controleur/sendmail.php'>Envoi par ici</a>
						</div>";}
			}
			else{$mess="echec";}
			}
	include_once('../vue/VueAjouterReviewer.php');
?>