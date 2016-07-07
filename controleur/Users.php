<?php
include_once('../modele/connexion.php');

session_start();
if(!isset($_SESSION["id"])){
	echo"vous n'avais pas le droit d'acceder a cette page";
	exit();
}else
	$res=mysql_query("SELECT * FROM membre");
	$mes="";
	
	if(isset($_POST["s"])){		
			include("../modele/membre.php");
			$p = new membre($_POST["s"],'','','','','','')  ;
			if($p->Suppmembre())
				$mes="<div class='alert alert-success'>						
						<strong>Succès!</strong> ce membre est supprimé.
					</div>";
		}
	include_once('../vue/VueGestionUsers.php');
?>