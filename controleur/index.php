<?php
	include_once('../modele/connexion.php');
	
	
	$date=date('Y/m/d');	
		$res1=mysql_query("SELECT * from evenement WHERE datefinale > '$date'");
		$res2=mysql_query("SELECT * from numero WHERE id in (select MAX(id) from numero WHERE id in (select numero from article ))");
		$row= mysql_fetch_array($res2);
		$res3=mysql_query("SELECT * from numero WHERE id <> ".$row["id"]." AND id in (select numero from article)");
		$theme=mysql_query("SELECT DISTINCT theme FROM article");
	include_once('../vue/VueAccueil.php');
?>

