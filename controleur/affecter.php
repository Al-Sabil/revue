<?php
include_once('../modele/connexion.php');

session_start();
if(!isset($_SESSION["id"])){
	echo"vous n'avais pas le droit d'acceder a cette page";
	exit();
}else 

		$aff=$_POST['aff'];
		$res1=mysql_query("SELECT * from article where id='$aff'");	

		$row1= mysql_fetch_array($res1);
		$res2=mysql_query("SELECT * FROM membre WHERE id in (SELECT idAuteur FROM auteur_article WHERE idArticle=".$row1["id"].")");	

		$res=mysql_query("SELECT * from reviewer");
		
		$mes="";
		if(isset($_POST["s"])){

					$res3=mysql_query("SELECT * from reviewer WHERE id='".$_POST["re"]."'");
					$row3= mysql_fetch_array($res3);
					$date = date('Y/m/d');
					$verif=mysql_query("SELECT * FROM affectation WHERE idReviwer='".$_POST["re"]."' AND idArticle='".$row1["id"]."'");
					if(mysql_num_rows($verif)!=0){
						$mes="<div class='alert alert-danger'>
							<strong>Echec!</strong> Ce reviewer est déjà affecté à cet article
						</div>";
					}else{
					$insert=mysql_query("INSERT INTO `affectation` (`id`, `idArticle`, `idReviwer`, `date`) VALUES ('', '".$row1["id"]."', '".$_POST["re"]."', '$date');");				
					if($insert){
							
							$mes="<div class='alert alert-success'>
							<strong>C'est bon!</strong> Cet article a été affecté à ".$row3["nom"]." <a href='monrevueA.php'> retour</a>
						</div>";
							
					} 
						else {$mes="<div class='alert alert-danger'>
							<strong>Echec!</strong> un erreur est produit lors de cette opération, reéssayer plus tard !
						</div>";}
					}
				
				}
include_once('../vue/VueAffecter.php');

?>