<?php
include_once('../modele/connexion.php');

$recherche=$_POST["recherche"];
	if(isset($recherche)){
			$query = "SELECT * FROM membre WHERE nom LIKE '%".$recherche."%' or prenom Like'%".$recherche."%' AND id in (select idAuteur from auteur_article) ";
	}	
	else{
		$query = "SELECT * FROM membre WHERE id in (select idAuteur from auteur_article)";
	}
	$res=mysql_query($query);
include_once('../vue/VueAuteurs.php');

 ?>