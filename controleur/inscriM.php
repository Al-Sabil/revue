<?php
include_once("../modele/membre.php");
$nom=$_POST["nomA"];
$prenom=$_POST["prenomA"];
$email=$_POST["email"];
$login=$_POST["login"];
$pass1=$_POST["passC"];
$pass2=$_POST["pass"];

			
if($pass1==$pass2){
//$password=sha1($pass2);
$p = new membre('',$nom,$prenom,$email,$login,$pass2)  ;
$p-> seconnecter();

	if($p->addmembre()){
		
		$req="SELECT * FROM membre WHERE id in (select MAX(id) from membre)";
		$re=mysql_query($req);
		$row=mysql_fetch_array($re);
		if($row)
		{			
							session_start();
							$_SESSION['id']=$row['id'];
							$_SESSION['login']=$row['prenom'];
							
		}
		echo"1";
			
		}else {
			echo"0";
			}			
	}

		
?>