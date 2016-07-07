
<?php
include_once('../modele/connexion.php');
session_start();
if(!isset($_SESSION["id"])){
	echo"vous n'avais pas le droit d'acceder a cette page";
	
}else
	$id=$_SESSION["id"];
		
		$query = "SELECT * from affectation where idReviwer='$id' and (idArticle,idReviwer) NOT IN (select idArticle,idReviwer from fiche_article)";
		$res=mysql_query($query);
		$nbr=mysql_num_rows($res);
		
		$query1 = "SELECT * from fiche_article F, article A where F.idReviwer='$id' AND F.idArticle=A.id   ";
		$res1=mysql_query($query1);
		$nbr1=mysql_num_rows($res1);
		
		$query2 = "SELECT * from article";
		$res2=mysql_query($query2);
		$nbr2=mysql_num_rows($res2);
include_once('../vue/VueReviewer.php');
?>