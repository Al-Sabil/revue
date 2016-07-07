<?php
include_once('../modele/connexion.php');
session_start();
if(!isset($_SESSION["id"])){
	echo"vous n'avais pas le droit d'acceder a cette page";
	
}else
	$numero=$_POST["numero"];
		
		$res=mysql_query("SELECT * FROM numero WHERE id='$numero'");
		
		$ev=mysql_fetch_array($res);
		
		$mes="";
		
		$repository =$_SERVER["DOCUMENT_ROOT"].'/al-sabil/vue/images/';
			if(isset($_POST["m"])){
			
				if(is_uploaded_file($_FILES['image1']['tmp_name']))
					{
							$extensions = array('/png', '/gif', '/jpg', '/jpeg');		 
							$extension = strrchr($_FILES['image1']['type'],'/');   
							if(!in_array($extension, $extensions))
								$mes= 'Vous devez uploader une image.';
							else {         		 					
								define('MAXSIZE', 2000000);        
								if($_FILES['image1']['size'] > MAXSIZE)
								   $mes= 'Votre fichier est supérieure à la taille maximale de '.MAXSIZE.' octets';
								else {
								
								$img_nom =  $_FILES['image1']['name'];			
								if(!move_uploaded_file($_FILES['image1']['tmp_name'],$repository.$img_nom)) $mes="impossible de copier l'image";
								}
							}
					}else
					{$img_nom=$ev["image"];}
				
			include_once('../modele/classenumero.php');
			$n = new classenumero($numero,$_POST["nom"],$_POST["theme"],$_POST["date"],$_POST["description"],$img_nom);
			if($n->updatenumero())
			{
				$mes="<div class='alert alert-success'>
							<strong>Succée!</strong> Ce numéro a été modifié.
						</div>";
			}
			else{$mes="echec";}
		}	
	include_once('../vue/VueModifierNumero.php');
	

?>