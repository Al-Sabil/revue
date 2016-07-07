<?php
include_once('../modele/connexion.php');

session_start();
if(!isset($_SESSION["id"])){
	echo"vous n'avais pas le droit d'acceder a cette page";
	
}else
		$res=mysql_query("SELECT * FROM evenement");
		
		$mes="";
		if(isset($_POST["annuler"])){
								
							$up=mysql_query("UPDATE `evenement` SET etat ='Annule' WHERE id='".$_POST["evenement"]."'");
							
							if($up)
							{$mes="<div class='alert alert-success'>				
									<strong>Succés!</strong> Cet événement a été annulé. 
								</div>";}
								
							}
	if(isset($_POST["supprimer"])){
								
							$up=mysql_query("DELETE FROM `evenement` WHERE id='".$_POST["evenement1"]."'");
							
							if($up)
							{$mes="<div class='alert alert-success'>				
									<strong>Succés!</strong> Cet événement a été annulé. 
								</div>";}
								
							}
	
		
	include_once('../vue/VueGestionEvenement.php');
?>