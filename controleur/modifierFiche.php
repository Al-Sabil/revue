<?php
include_once('../modele/connexion.php');
session_start();
if(!isset($_SESSION["id"])){
	echo"vous n'avais pas le droit d'acceder a cette page";
	exit();
}else
$idR=$_SESSION["id"];

					$req1=mysql_query("SELECT * FROM article WHERE id='".$_GET["article"]."'");
					$row= mysql_fetch_array($req1);
					
					$re=mysql_query("SELECT * FROM fiche_article WHERE idArticle='".$_GET["article"]."' AND idReviwer='$idR'");
					$row2= mysql_fetch_array($re);
					
					$mes="";
					
					if(isset($_GET["modif"])){
					$somme=$_GET["q1"]+$_GET["q2"]+$_GET["q3"]+$_GET["q4"]+$_GET["q5"];
					$mes="<div class='alert alert-success'>
							Le score de cet article est " .$somme. " 
						</div>";

					$message="- ".$_GET["pointsForts"]."\n- ".$_GET["pointsFaibles"]."\n- ".$_GET["modifications"]."\n- ".$_GET["remarques"];
					$query2="UPDATE `fiche_article` SET `score`='$somme', `message`='$message' WHERE id='".$row2["id"]."'";
					$res2=mysql_query($query2);
					if($res2)
					{$mes=" <div class='alert alert-success'>
								<strong><span class='glyphicon glyphicon-ok'></span> Succès ! </strong> La fiche de cet article a été modifié <a href='acceReviewer.php'>retour</a>
							</div> ";}
					else {$mes="<span class='glyphicon glyphicon-remove'></span> 
								<div class='alert alert-alert'>
									<strong>Désolé! </strong> Erreur lors de la modification
								</div>";}
				}
include_once('../vue/VueModifierFiche.php');
?>