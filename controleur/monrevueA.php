<?php
include_once('../modele/connexion.php');

session_start();
if(!isset($_SESSION["id"])){
	echo"Vous n'avais pas le droit d'acceder a cette page";
	exit();
}else
	
	$query = "SELECT * from article ORDER BY date DESC";

	if(isset($_POST["z"])){
		if((isset($_POST["theme"]))&&(($_POST["theme"])!='--Theme--')){
			if(isset($_POST["annee"])&&(($_POST["annee"])!='--Annee--')){
				$query="SELECT * from article WHERE theme='".$_POST["theme"]."' AND left(date,4)='".$_POST["annee"]."'";	
			}else
			if(isset($_POST["mois"])&&(($_POST["mois"])!='--Mois--')){
				$query="SELECT * from article WHERE theme='".$_POST["theme"]."' AND substring(date,6,2)='".$_POST["mois"]."'";	
			}else
			if(isset($_POST["jour"])&&(($_POST["jour"])!='--Jour--')){
				$query="SELECT * from article WHERE theme='".$_POST["theme"]."' AND substring(date,9,2)='".$_POST["jour"]."'";	
			}else 
				$query = "SELECT * from article WHERE theme='".$_POST["theme"]."'";
		}else
		
		
		if(isset($_POST["annee"])&&(($_POST["annee"])!='--Annee--')){
			if(isset($_POST["mois"])&&(($_POST["mois"])!='--Mois--')){
				if(isset($_POST["jour"])&&(($_POST["jour"])!='--Jour--')){
					$query="SELECT * from article WHERE left(date,4)='".$_POST["annee"]."' AND substring(date,9,2)='".$_POST["jour"]."' AND substring(date,6,2)='".$_POST["mois"]."'";
			}else
				$query="SELECT * article WHERE left(date,4)='".$_POST["annee"]."' AND substring(date,6,2)='".$_POST["mois"]."'";
			}else
				if(isset($_POST["jour"])&&(($_POST["jour"])!='--Jour--')){
					$query="SELECT * article WHERE left(date,4)='".$_POST["annee"]."' AND substring(date,9,2)='".$_POST["jour"]."'";
				}else
				$query="SELECT * from article WHERE left(date,4)='".$_POST["annee"]."'";
		}else	

		if(isset($_POST["mois"])&&(($_POST["mois"])!='--Mois--')){
				if(isset($_POST["jour"])&&(($_POST["jour"])!='--Jour--')){
					$query="SELECT * from article WHERE substring(date,6,2)='".$_POST["mois"]."' AND substring(date,9,2)='".$_POST["jour"]."' AND substring(date,6,2)='".$_POST["mois"]."'";
			}else
			$query="SELECT * from article WHERE substring(date,6,2)='".$_POST["mois"]."'";
		}else

		if(isset($_POST["jour"])&&(($_POST["jour"])!='--Jour--')){
					$query="SELECT * from article WHERE substring(date,9,2)='".$_POST["jour"]."'";
		
		}
		
	}
	$res=mysql_query($query);
	$theme=mysql_query("SELECT DISTINCT theme FROM article");

	$mes="";
	if(isset($_POST["valider"])){
								
							$up=mysql_query("UPDATE `article` SET `etat`='Valide' WHERE id='".$_POST["val"]."'");
							
							if($up)
							{$mes="<div class='alert alert-success'>				
									<strong>Succés!</strong> Cet article a été validé avec succés
								</div>";}
								
							}
	if(isset($_POST["rejeter"])){
								
							$up=mysql_query("DELETE FROM `article` WHERE id='".$_POST["rej"]."'");
							mail($_POST["auteur"],'Rejet','Désolé, votre article a été rejeté, vous pouvez soumettre un autre article à tout moment');
							if($up)
							{$mes="<div class='alert alert-success'>				
									<strong>Succés!</strong> Cet article a été rejeté, un mail de notification a été envoyé vers l'auteur
								</div>";}
								
							}
	include_once('../vue/VueGestionAdmin.php');

?>