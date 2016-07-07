<?php
$numero=$_POST["numero"];
session_start();
$_SESSION["numero"]=$numero;
header("Location:lister.php");
?>