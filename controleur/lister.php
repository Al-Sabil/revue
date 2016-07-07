 <?php
 include_once('../modele/connexion.php');

	session_start();
	$numero=$_SESSION["numero"];
	mysql_query("SET NAMES 'utf8'");
		$query = "SELECT * from article WHERE numero='$numero'";
		$res=mysql_query($query);
		
		$query2 = "SELECT * from numero WHERE id='$numero'";
		$res2=mysql_query($query2);
	include_once('../vue/VueLister.php');
 ?>