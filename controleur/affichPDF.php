<?php
$article=$_POST["article"];
include_once('../modele/connexion.php');
$a=mysql_query("SELECT * FROM article WHERE id='$article'");
$html=mysql_fetch_array($a);


$content = file_get_contents($html["fichier"]);
header("Content-Disposition: inline; filename=".$html["titre"]."");
header("Content-type: application/pdf");
header('Cache-Control: private, max-age=0, must-revalidate');
header('Pragma: public');
echo $content;



?>