<?php

    $f=$_GET["fichier"];
   

  //Contrôle du fichier (à ne pas oublier !)
  if(substr($f,2,3)!='tmp' or strpos($f,'/') or strpos($f,'\\'))
    //die("Nom de fichier incorrect");
    if(!file_exists($f))
      die("Le fichier n'existe pas");
	   $uploadname=basename($_GET['fichier']);
  //Traitement de la requête spéciale IE au cas où
  if($HTTP_SERVER_VARS['HTTP_USER_AGENT']=='contype'){
    Header('Content-Type: application/pdf');
    exit;
  }
  //Envoi du PDF
  Header('Content-Type: application/pdf/force-download');
   header('Content-Disposition: attachment; filename="'.$uploadname.'"');
  Header('Content-Length: '.filesize($f));
  header("Pragma: no-cache");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0, public");
        header("Expires: 0");
  readfile($f);
  

?>