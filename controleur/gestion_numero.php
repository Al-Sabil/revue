<?php
include_once('../modele/connexion.php');

session_start();
if(!isset($_SESSION["id"])){
	echo"Vous n'avais pas le droit d'acceder à cette page";
	exit();
}else
	
		$res=mysql_query("SELECT * FROM numero");
		$mes="";
		
		if(isset($_POST["supprimer"])){
								
							$up=mysql_query("DELETE FROM `numero` WHERE id='".$_POST["s"]."'");
							
							if($up)
							{$mes="<div class='alert alert-success'>				
									<strong>Succés!</strong> Ce numéro a été supprimé. 
								</div>";}
								
							}
	include_once('../vue/VueGestionNumero.php');
?>
