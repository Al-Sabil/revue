<?php
include_once('../modele/connexion.php');
session_start();
if(!isset($_SESSION["id"])){
	echo"vous n'avais pas le droit d'acceder a cette page";
	exit();
}else
$article=$_POST["articleM"];

		$res=mysql_query("SELECT * from article WHERE id='$article'");		
		$row= mysql_fetch_array($res);
		$res1=mysql_query("SELECT * FROM membre WHERE id in (SELECT idAuteur FROM auteur_article WHERE idArticle=".$row["id"].")");
		
		$mes="";
		
		$repository1 =$_SERVER["DOCUMENT_ROOT"].'/al-sabil/vue/images/';
			$repository =$_SERVER["DOCUMENT_ROOT"].'/al-sabil/controleur/';
			if(isset($_POST["m"])){
			
				if(is_uploaded_file($_FILES['imageM']['tmp_name']))
					{
							$extensions = array('/png', '/gif', '/jpg', '/jpeg');		 
							$extension = strrchr($_FILES['imageM']['type'],'/');   
							if(!in_array($extension, $extensions))
								$mes= 'Vous devez uploader une image.';
							else {         		 					
								define('MAXSIZE', 2000000);        
								if($_FILES['imageM']['size'] > MAXSIZE)
								   $mes= 'Votre fichier est supérieure à la taille maximale de '.MAXSIZE.' octets';
								else {
								
								$img_nom =  $_FILES['imageM']['name'];			
								if(!move_uploaded_file($_FILES['imageM']['tmp_name'],$repository1.$img_nom)) $mes="impossible de copier l'image";
								}
							}
					}else
					{$img_nom=$row["image"];}
				
				if(is_uploaded_file($_FILES['fichM']['tmp_name']))
					{
							$extensions = array('/pdf');		 
							$extension = strrchr($_FILES['fichM']['type'],'/');   
							if(!in_array($extension, $extensions))
								$mes= 'Vous devez uploader un fichier pdf.';
							else {         		 					
								define('MAXSIZE', 4000000);        
								if($_FILES['fichM']['size'] > MAXSIZE)
								   $mes= 'Votre fichier est supérieure à la taille maximale de '.MAXSIZE.' octets';
								else {
								
								$fich_nom =  $_FILES['fichM']['name'];			
								if(!move_uploaded_file($_FILES['fichM']['tmp_name'],$repository.$fich_nom)) $mes="impossible de copier le fichier";
								}
							}
					}else
					{$fich_nom=$row["fichier"];}
				
				if(($_POST["auteur"]!=$_SESSION["id"])&&($_POST["auteur"]!='Auteur')){
				mysql_query("INSERT INTO auteur_article VALUES('','".$row["id"]."','".$_POST["auteur"]."','".$row["date"]."')");
				}
				
			include('../modele/classarticle.php');
			$a = new classarticle($row["id"],$_POST["titreM"],$img_nom,$row["date"],$_POST["themeM"],$_POST["desM"],$fich_nom,$row["etat"],$_POST["motsclM"],$row["numero"]);
			if($a->updatearticle())
			{
				$mes="<div class='alert alert-success'>
							<strong>Succée!</strong> Cet article a été modifié. <a href ='acceUser.php'>retour</a>
					
						</div>";
			}
			else{$mes="echec";}
		}
$aut=mysql_query("SELECT * FROM membre");		
include_once('../vue/VueModifierArticle.php');
?>