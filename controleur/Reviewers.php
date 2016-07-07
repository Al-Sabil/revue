<?php
include_once('../modele/connexion.php');
session_start();
if(!isset($_SESSION["id"])){
	echo"vous n'avais pas le droit d'acceder a cette page";
	
}else
	
		$res=mysql_query("SELECT * from reviewer");	
		$mes="";
		
			if(isset($_POST["supprimer"])){
								
							$up=mysql_query("DELETE FROM `reviewer` WHERE id='".$_POST["s"]."'");
							
							if($up)
							{$mes="<div class='alert alert-success'>				
									<strong>Succés!</strong> Ce reviewer a été supprimé. 
								</div>";}
								
							}
	include_once('../vue/VueGestionReviewers.php');

?>

