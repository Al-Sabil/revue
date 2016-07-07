<?php
require '../modele/pdfcrowd.php';
$article=$_POST["article"];
include("../modele/connexion.php");
$a=mysql_query("SELECT * FROM article WHERE id='$article'");
$html=mysql_fetch_array($a);
try
{   
    // create an API client instance
    $client = new Pdfcrowd("seif", "972b97482ec76dbe209dd1231f6fa269");

    // convert a web page and store the generated PDF into a $pdf variable
    $pdf = $client->convertHtml($html["fichier"]);

    // set HTTP response headers
   header("Content-Disposition: inline; filename=".$html["titre"]."");
header("Content-type: application/pdf");
header('Cache-Control: private, max-age=0, must-revalidate');
header('Pragma: public');

    // send the generated PDF 
    echo $pdf;
}
catch(PdfcrowdException $why)
{
    echo "Pdfcrowd Error: " . $why;
}
?>