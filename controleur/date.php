<?php
include_once('../modele/connexion.php');


	$query = "SELECT * FROM article WHERE etat='Valide' ORDER BY date DESC";

		if(isset($_POST["annee"])&&(($_POST["annee"])!='Annee')){
			if(isset($_POST["mois"])&&(($_POST["mois"])!='Mois')){
				if(isset($_POST["jour"])&&(($_POST["jour"])!='Jour')){
					$query="SELECT * FROM article WHERE etat='Valide' AND left(date,4)='".$_POST["annee"]."' AND substring(date,9,2)='".$_POST["jour"]."' AND substring(date,6,2)='".$_POST["mois"]."'";
			}else
				$query="SELECT * FROM article WHERE etat='Valide' AND left(date,4)='".$_POST["annee"]."' AND substring(date,6,2)='".$_POST["mois"]."'";
			}else
				if(isset($_POST["jour"])&&(($_POST["jour"])!='Jour')){
					$query="SELECT * FROM article WHERE revue='$rev' AND etat='Valide' AND left(date,4)='".$_POST["annee"]."' AND substring(date,9,2)='".$_POST["jour"]."'";
				}else
				$query="SELECT * FROM article WHERE etat='Valide' AND left(date,4)='".$_POST["annee"]."'";
		}else	

		if(isset($_POST["mois"])&&(($_POST["mois"])!='Mois')){
				if(isset($_POST["jour"])&&(($_POST["jour"])!='Jour')){
					$query="SELECT * FROM article WHERE etat='Valide' AND substring(date,6,2)='".$_POST["mois"]."' AND substring(date,9,2)='".$_POST["jour"]."' AND substring(date,6,2)='".$_POST["mois"]."'";
			}else
			$query="SELECT * FROM article WHERE etat='Valide' AND substring(date,6,2)='".$_POST["mois"]."'";
		}else

		if(isset($_POST["jour"])&&(($_POST["jour"])!='Jour')){
					$query="SELECT * FROM article WHERE etat='Valide' AND substring(date,9,2)='".$_POST["jour"]."'";
		
		}

$res=mysql_query($query);

include_once('../vue/VueDate.php');

 ?>