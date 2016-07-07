<?php 

include_once('../modele/connexion.php');

session_start();
if(!isset($_SESSION['id'])){
	echo"vous n'avais pas le droit d'acceder a cette page <a href='index.php'>aller à la page d'acceuil</a>";
}
else
	$id=$_SESSION["id"];
	$req=mysql_query("SELECT * FROM auteur_article WHERE idAuteur=$id");
	$res1=mysql_query("SELECT * from numero WHERE id in (select MAX(id) from numero WHERE id in (select numero from article ))");
	$theme=mysql_query("SELECT DISTINCT theme FROM article");
	$mes="";
	if(isset($_POST["sup"])){
		
			include('../modele/classarticle.php');
			$a= new classarticle($_POST["articl"],'','','','','','','','','');
				if($a->Supparticle()){ 
				$mes="<div class='alert alert-success'>
						<strong>C'est fait!</strong> Cet article est supprimé
					</div>";
				}
				else{
				$mes="<div class='alert alert-danger'>
						<strong>Erreur!</strong> Problème lors du supprission
					</div>";}
		
	}
	include_once('../vue/VueAuteur.php');
?>