 <?php
include_once('../modele/connexion.php');

$recherche=$_POST["recherche"];

		$res=mysql_query("SELECT * FROM article WHERE etat='Valide' AND motsCle LIKE '%".$recherche."%' ");
include_once('../vue/VueMotCle.php');
 
 ?>