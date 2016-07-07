<?php
include_once('../modele/connexion.php');
					  $login=mysql_real_escape_string(htmlentities($_POST["login"]));
					  $pass = mysql_real_escape_string(htmlentities($_POST["pass"]));
					  //$revue=$_POST["revue"];
					  //$p=sha1($pass);
					  $query = "SELECT * FROM `reviewer` WHERE login='$login' and pass='$pass'";
					  $res=mysql_query($query);
		              $row=mysql_fetch_array($res);
					  if($row){
					  
								session_start();
						$_SESSION['id']=$row["id"];
						$_SESSION['login']=$row["prenom"];
						//$_SESSION['revue']=$revue;
						echo "1";
					  }
					  else
					  {
						echo "0";
						}
								
					
?>