<?php include('../modele/connexion.php');

session_start();
if(!isset($_SESSION["login"])){
	echo"vous n'avais pas le droit d'acceder a cette page";
	header("Location:index.php");
	exit();	
}else
	
include('../vue/VueConsignes.php');
?>