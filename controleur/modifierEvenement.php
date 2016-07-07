<?php
include_once('../modele/connexion.php');
session_start();
if(!isset($_SESSION["id"])){
	echo"vous n'avais pas le droit d'acceder a cette page";
	exit();
}else
		$query = "SELECT * FROM evenement WHERE id='".$_POST["evenement"]."'";
		$res=mysql_query($query);
		$ev=mysql_fetch_array($res);
	$mes="";
	if(isset($_POST["m"])){
			
			include('../modele/classevenement.php');
			$e = new evenement($ev["id"],$_POST["nom"],$_POST["type"],$_POST["datecreation"],$_POST["datefinale"],$_POST["d"],$_POST["text"],'a venir');
			if($e->updateevenement())
			{
				$mes="<div class='alert alert-success'>
							<strong>Succée!</strong> Cet événement a été modifié. <a href='../controleur/monrevueA.php'>Retour</a>
						</div>";
			}
			else{$mes"echec";}
			}
	include_once('../vue/VueModifierEvenement.php');

?>