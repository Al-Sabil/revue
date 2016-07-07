<?php
include_once('../modele/connexion.php');
session_start();
if(!isset($_SESSION["id"])){
	echo"vous n'avais pas le droit d'acceder a cette page";
	exit();
}else
$id=$_GET["article"];
	$req=mysql_query("SELECT * FROM article WHERE id='$id'");
	$row= mysql_fetch_array($req);
include_once('../vue/VueEvaluation.php');
?>