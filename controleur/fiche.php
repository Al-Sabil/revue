<?php
include_once('../modele/connexion.php');
session_start();
if(!isset($_SESSION["id"])){
	echo"vous n'avais pas le droit d'acceder a cette page";
	exit();
}else
	$article=$_POST["article"];
		$reviewer=$_POST["reviewer"];		
		$res=mysql_query("SELECT * from fiche_article where idArticle='$article' AND idReviwer='$reviewer'");	
		
	include_once('../vue/VueFiche.php');

?>