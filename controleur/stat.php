<?php
include_once('../modele/connexion.php');

session_start();
if(!isset($_SESSION["id"])){
	echo"vous n'avais pas le droit d'acceder a cette page";
	
}else
	$article=mysql_query("SELECT * FROM article");
			$nbrArticle=mysql_num_rows($article);
			
	$articleNT=mysql_query("SELECT * FROM article WHERE etat='Non traite'");
			$nbrArticleNT=mysql_num_rows($articleNT);
			
	$articleT=mysql_query("SELECT * FROM article WHERE etat='Traite'");
			$nbrArticleT=mysql_num_rows($articleT);
	
	$articleV=mysql_query("SELECT * FROM article WHERE etat='Valide'");
			$nbrArticleV=mysql_num_rows($articleV);
			
	$numero=mysql_query("SELECT * FROM numero");
			$nbrNumero=mysql_num_rows($numero);
			
	$numeroNP=mysql_query("SELECT * FROM numero WHERE id NOT IN (select numero from article)");
			$nbrNumeroNP=mysql_num_rows($numeroNP);
			
	$numeroP=mysql_query("SELECT * FROM numero WHERE id in (select numero from article)");
			$nbrNumeroP=mysql_num_rows($numeroP);
			
	$auteurA=mysql_query("SELECT * FROM membre WHERE id in (select idAuteur from auteur_article)");
			$nbrAuteurA=mysql_num_rows($auteurA);
	$auteurNA=mysql_query("SELECT * FROM membre WHERE id NOT IN (select idAuteur from auteur_article)");
			$nbrAuteurN=mysql_num_rows($auteurNA);
	
	$reviewerA=mysql_query("SELECT * FROM reviewer WHERE id in (select idReviwer from fiche_article)");
			$nbrReviewerA=mysql_num_rows($reviewerA);
	$reviewerNA=mysql_query("SELECT * FROM reviewer WHERE id not in (select idReviwer from fiche_article)");
			$nbrReviewerN=mysql_num_rows($reviewerNA);
include_once('../vue/VueStat.php');
?>