<?php
include_once('../modele/connexion.php');

session_start();
if(!isset($_SESSION["id"])){
	echo"Vous n'avais pas le droit d'acceder � cette page";
	exit();
}else
	
		$res=mysql_query("SELECT * FROM numero");
		$mes="";
		
		if(isset($_POST["supprimer"])){
								
							$up=mysql_query("DELETE FROM `numero` WHERE id='".$_POST["s"]."'");
							
							if($up)
							{$mes="<div class='alert alert-success'>				
									<strong>Succ�s!</strong> Ce num�ro a �t� supprim�. 
								</div>";}
								
							}
	include_once('../vue/VueGestionNumero.php');
?>
