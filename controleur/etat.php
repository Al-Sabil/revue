<?php
include_once('../modele/connexion.php');
session_start();

$id=$_GET["article"];
$mes="";
 $req1=mysql_query("SELECT * FROM article WHERE id='$id'");
 $row= mysql_fetch_array($req1);
 $somme=$_GET["q1"]+$_GET["q2"]+$_GET["q3"]+$_GET["q4"]+$_GET["q5"];
				

				$message="- ".$_GET["pointsForts"]."\n- ".$_GET["pointsFaibles"]."\n- ".$_GET["modifications"]."\n- ".$_GET["remarques"];
				$query2="INSERT INTO `fiche_article`(`id`, `idArticle`, `idReviwer`, `score`, `message`) VALUES ('','$id','".$_SESSION["id"]."','$somme','$message')";
				$res2=mysql_query($query2);
				if($res2)
				{	
					$mes="<div class='alert alert-success'>
							<strong>Succ�s!</strong> Cet article a �t� trait� avec un scrore �gale � $somme  <a href='acceReviewer.php'> Retour</a>
						</div>";
				}
				else {$mes="<div class='alert alert-danger'>
							<strong>Erreur!</strong> Veuillez re�ssayer plus tard  <a href='acceReviewer.php'> Retour</a>
						</div>";}
include_once('../vue/VueEtat.php');
?>