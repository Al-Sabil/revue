<?php
include_once('../modele/connexion.php');
		session_start();
		$id=$_POST["article"];
		$res=mysql_query("SELECT * from article WHERE id='$id'");	
		$req1=mysql_query("SELECT * FROM commentaire WHERE article='$id'");
		$mes="";
		if(isset($_POST["mod"]))
				{
					$requete=mysql_query("INSERT INTO commentaire VALUES('','".$_POST["pseudo"]."','".$_POST["commentaire"]."','".$_POST["article"]."')");
					if($requete){
						$mes="<div class='alert alert-success'>
								<strong>Success!</strong> Votre commentaire a été enregistré.
							</div>";
					}
					else{
						$mes="<div class='alert alert-success'>	
								<strong>Warning!</strong> Erreur.
							</div>";
					}
				}
				
		if(isset($_POST["c"])){
			
				$n=mysql_query("SELECT * FROM membre WHERE id='".$_SESSION["id"]."'");
				$nom=mysql_fetch_array($n);
				$requete=mysql_query("INSERT INTO commentaire VALUES('','".$nom["nom"]."','".$_POST["commentaire"]."','$id')");
				if($requete){
						$mes="<div class='alert alert-success'>
								<strong>Success!</strong> Votre commentaire a été enregistré.
							</div>";
					}
					else{
						$mes="<div class='alert alert-success'>	
								<strong>Warning!</strong> Erreur.
							</div>";
					}
		}	
				
		include_once('../vue/VueArticle.php');

 ?>