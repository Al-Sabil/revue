<?php
include_once('../modele/connexion.php');
$evenement=$_POST["eve"];
		$res=mysql_query("SELECT * FROM evenement WHERE id='$evenement'");
		$row= mysql_fetch_array($res);
include_once('../vue/VueEvenement.php');
?>