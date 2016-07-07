<?php
include_once('../modele/connexion.php');

session_start();
if(!isset($_SESSION["id"])){
	echo"vous n'avais pas le droit d'acceder a cette page";
	exit();
}else
	
	$mes="";			
	$repository =$_SERVER["DOCUMENT_ROOT"].'/al-sabil/vue/images/';
	if(isset($_POST["s"])){	
				if(is_uploaded_file($_FILES['image']['tmp_name']))
				{
						$extensions = array('/png', '/gif', '/jpg', '/jpeg');		 
						$extension = strrchr($_FILES['image']['type'],'/');   
						if(!in_array($extension, $extensions))
							$mes= 'Vous devez uploader une image.';
						else {         		 					
							define('MAXSIZE', 2000000);        
							if($_FILES['image']['size'] > MAXSIZE)
							   $mes= 'Votre fichier est supérieure à la taille maximale de '.MAXSIZE.' octets';
							else {
								
							$image_type = $_FILES['image']['type'];
							$img_nom =  $_FILES['image']['name'];			
							if(!move_uploaded_file($_FILES['image']['tmp_name'],$repository.$img_nom)) $mes="impossible de copier le fichier";
							}
						}
				}else{
					$mes="<div class='alert alert-danger'>
								<strong>Erreur lors de l'upload, reéssayer plus tard </strong>
							</div>";
				}

				 include('../modele/classenumero.php');
				
				$numero = new classenumero('',$_POST["nom"],$_POST["theme"],$_POST["date"],$_POST["description"],$img_nom);
		
		if ($numero->addnumero())
			{

						$mes="
							<div class='alert alert-info'>
							
								<strong>un nouveau numero est ajouté. Vous pouvez le publier mainteneant <a href='gestion_numero.php'>retour</a> </strong>
							</div>";
			}
	}
	include_once('../vue/VueCreationNumero.php');
?>