<?php
include_once('../modele/connexion.php');
session_start();
if(!isset($_SESSION["id"])){
	echo"vous n'avais pas le droit d'acceder a cette page";
	exit();
}else
	
	$mes="";

	if(isset($_POST["creer"])){
			
			include_once('../modele/classevenement.php');
			$e = new evenement('',$_POST["nomA"],$_POST["typeA"],$_POST["datecreationA"],$_POST["datefinaleA"],$_POST["desA"],$_POST["text"],'a venir');
			if($e->addevenement())
			{
				$mes="<div class='alert alert-success'>
							<strong>Succ�e!</strong> Cet �v�nement a �t� cre�, tout le monde va �tre notifi�.
						</div>";
			}
			else{$mes="echec";}
			}
	include_once('../vue/VueCreationEvenement.php');

?>