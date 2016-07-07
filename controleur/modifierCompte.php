<?php
include_once('../modele/connexion.php');

session_start();
if(!isset($_SESSION["id"])){
	echo"vous n'avais pas le droit d'acceder a cette page";
	exit();
}else
	$req=mysql_query("SELECT * FROM membre WHERE id = '".$_SESSION["id"]."'");
	$row=mysql_fetch_array($req);
	$mes="";
	if(isset($_POST["m"])){
		if($_POST["ancien"]==$row["mdp"]){
			include('../modele/membre.php');
			$u= new membre($row["id"],$_POST["nomA"],$_POST["prenomA"],$_POST["mail"],$_POST["login"],$_POST["nouveau"]);
				if($u->Update()){ 
				$mes="<div class='alert alert-success'>
						<strong>Félicitations!</strong> Votre compte a été modifié avec succée.&nbsp &nbsp <a href ='acceUser.php'>Retour</a>
					</div>";
				}
				else{
				$mes="<div class='alert alert-danger'>
						<strong>Erreur!</strong> Problème lors du modification.
					</div>";}
		}
	}
include_once('../vue/VueModifierCompte.php');
?>