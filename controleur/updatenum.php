<?php
include('../modele/connexion.php');
$i=$_POST["nbr"];
$mes="";
for($j=1;$j<=$i-1;$j++){
		if(isset($_POST["article$j"])){
			$result=mysql_query("Update `article` SET numero = (select MAX(id) from `numero`) where id='".$_POST["article$j"]."'"	);
		}
		
	}					
						if($result){
							$mes= "<div class='alert alert-success'>
										<strong>Succés!</strong> votre numero est publié avec succée...<a href='../controleur/gestion_numero.php'>Retour</a>
									</div>";
						}
						else {$mes= "erreur";}
include_once('../vue/VueUpdatenum.php');
?>