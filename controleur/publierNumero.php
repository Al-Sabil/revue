	<?php
include_once('../modele/connexion.php');

session_start();
if(!isset($_SESSION["id"])){
	echo"vous n'avais pas le droit d'acceder a cette page";
	exit();
}else		
	$res=mysql_query("SELECT * from article where etat='Valide' and numero='0'");
$mes="";
$numero=$_POST["numeroP"];
if(isset($_POST["se"])){
		$i=$_POST["nbr"];
		
	for($j=1;$j<=$i-1;$j++){
			if(isset($_POST["article$j"])){
				$result=mysql_query("Update `article` SET numero = '$numero' where id='".$_POST["article$j"]."'"	);
			}
			
		}					
							if($result){
								$mes= "<div class='alert alert-success'>
											<strong>Succés!</strong> votre numero est publié avec succée...<a href='../controleur/gestion_numero.php'>Retour</a>
										</div>";
							}
						else {$mes= "erreur";}
}
include_once('../vue/VuePublication.php');
?>