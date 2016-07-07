<?php
include_once('../modele/connexion.php');

$mes="";
if(isset($_POST["l"])&& isset($_POST["p"])){
					  $login=mysql_real_escape_string(htmlentities($_POST["l"]));
				
					  $pass = mysql_real_escape_string(htmlentities($_POST["p"]));
					 
					  $query = "SELECT * FROM `admin` WHERE login='$login' and pass='$pass'";
					  $res=mysql_query($query);
		              $row=mysql_fetch_array($res);
				}	
					if(isset($_POST["s"])){
						if($row){
						session_start();
						$_SESSION["id"]=$row["id"];
						$_SESSION["login"]=$row["login"];
					
						header("Location:../controleur/monrevueA.php");
					  }
					  else
					  {
						$mes="<img src='../vue/images/facebook3.jpg' width='30' height='20'> <font color='red'><b>Mot de passe ou login incorrect!</b></font><br>";
						}
					}
include_once('../vue/VueAdmin.php');
?>