<?php
include_once('../modele/connexion.php');


		$theme=$_POST["theme"];
		$res=mysql_query("SELECT * FROM article WHERE etat='Valide' AND theme='$theme'");
include_once('../vue/VueTheme.php');

 ?>