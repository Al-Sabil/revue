<?php
include_once('../modele/connexion.php');
session_start();
if(!isset($_SESSION["id"])){
	echo"vous n'avais pas le droit d'acceder a cette page";
	exit();
}else
	
$id=$_SESSION["id"];
$mes="";
	if(isset($_POST["soumettre"])){
			$date = date('Y/m/d');
			include('../modele/classarticle.php');
			$a = new classarticle('',$_POST["titre"],'',$date,$_POST["theme"],$_POST["description"],$_POST["text"],'Non traite',$_POST["motcle"],'');
			if($a->addarticle())
			{
				$idArticle=mysql_query("SELECT * FROM article where id in (select MAX(id) from article)");
				$article=mysql_fetch_array($idArticle);
				mysql_query("INSERT INTO `auteur_article`(`id`, `idArticle`, `idAuteur`, `date`) VALUES ('','".$article["id"]."','$id','$date')");
				
				$mes="<div class='alert alert-success'>
							<strong>Succ�e!</strong> Cet article a �t� soumis avec succ�s, vous serez notifi� apr�s le traitement.
						</div>";
			}
			else{$mes="<div class='alert alert-danger'>
							<strong>D�sol�!</strong> Il y a un probl�me de t�l�chargement, veuillez re�ssayer plus tard.
						</div>";}
			}
include_once('../vue/VueRedige.php');

			
			
?>