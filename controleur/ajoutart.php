<?php
include_once('../modele/connexion.php');

session_start();
if(!isset($_SESSION["id"])){
	echo"Vous n'avais pas le droit d'acceder a cette page";
	exit();
}else

$id=$_SESSION['id'];

	$mes="";
		$repository =$_SERVER["DOCUMENT_ROOT"].'/al-sabil/controleur/';
		$repository1 =$_SERVER["DOCUMENT_ROOT"].'/al-sabil/vue/images/';
		if(!is_uploaded_file($_FILES['fich']['tmp_name']))
		$mes="<div class='alert alert-danger'>
					<strong>Attention!</strong> Un probl�me est survenu durant l'op�ration. Veuillez r�essayer ! <a href='../controleur/acceUser.php'>Retour</a>
				</div>";
	 else {
		   
 
		//r�cup�re la cha�ne � partir du dernier / pour conna�tre l'extension
		$extensions = array('/pdf');
		$extension = strrchr($_FILES['fich']['type'],'/');
 
		//v�rifie si l'extension est dans notre tableau            
		if(!in_array($extension, $extensions))
			$mes= "<div class='alert alert-danger'>
					<strong>Attention!</strong> Vous devez uploader un fichier de type pdf... <a href='../controleur/acceUser.php'>Retour</a>
				</div>";
		else {         
 
		
			define('MAXSIZE', 2000000);        
			if($_FILES['fich']['size'] > MAXSIZE)
			   $mes= "<div class='alert alert-danger'>
					<strong>D�sol�!</strong> Votre fichier est sup�rieure � la taille maximale de ".MAXSIZE." octets ..<a href='../controleur/acceUser.php'>Retour</a>
				</div>";
			else {
				
				$fich_type = $_FILES['fich']['type'];
				$fich_nom =  $_FILES['fich']['name'];
				
				
				$a=$_FILES["fich"]["tmp_name"];
				if(!move_uploaded_file($_FILES['fich']['tmp_name'],$repository.$fich_nom)) $mes="<div class='alert alert-danger'>
					<strong>D�sol�!</strong> impossible de copier le fichier <a href='../controleur/acceUser.php'>Retour</a>
				</div>";
				
		
if(!is_uploaded_file($_FILES['image']['tmp_name']))
		$mes= "<div class='alert alert-danger'>
					<strong>Attention!</strong> Un probl�me est survenu durant l op�ration image. Veuillez r�essayer ! <a href='../controleur/acceUser.php'>Retour</a>
				</div>";
	 else {
		//liste des extensions possibles    
		$extensions1 = array('/png', '/gif', '/jpg', '/jpeg');
 
		//r�cup�re la cha�ne � partir du dernier / pour conna�tre l'extension
		$extension1 = strrchr($_FILES['image']['type'],'/');
 
		//v�rifie si l'extension est dans notre tableau            
		if(!in_array($extension1, $extensions1))
			 $mes= "<div class='alert alert-danger'>
					<strong>Attention!</strong> Vous devez uploader un fichier de type png, gif, jpg, jpeg... <a href='../controleur/acceUser.php'>Retour</a>
				</div>";
		else {         
 
	       
			if($_FILES['image']['size'] > MAXSIZE)
			   $mes= "<div class='alert alert-danger'>
					<strong>D�sol�!</strong> Votre image est sup�rieure � la taille maximale de ".MAXSIZE." octets ..<a href='../controleur/acceUser.php'>Retour</a>
				</div>";
			else {
				
				$img_type = $_FILES['image']['type'];
				$img_nom =  $_FILES['image']['name'];
				
				
				if(!move_uploaded_file($_FILES['image']['tmp_name'],$repository1.$img_nom)) 
				{$mes="<div class='alert alert-danger'>
					<strong>D�sol�!</strong> impossible de copier l image <a href='../controleur/acceUser.php'>Retour</a>
				</div>";}
				

				$date = date('Y/m/d');
			include('../modele/classarticle.php');
			$ar = new classarticle('',$_POST["titreA"],$img_nom,$date,$_POST["themE"],$_POST["descR"],$fich_nom,'Non traite',$_POST["motsClE"],'0');
			if($ar->addarticle()){
				
				$idArticle=mysql_query("SELECT * FROM article where id in (select MAX(id) from article)");
				$article=mysql_fetch_array($idArticle);
				mysql_query("INSERT INTO `auteur_article`(`id`, `idArticle`, `idAuteur`, `date`) VALUES ('','".$article["id"]."','$id','$date')");
				$mes= "
		<div class='container'>
		<br><br>
		
			<div class='row'>
				<div class='progress'>
					<div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='60' aria-valuemin='0' aria-valuemax='100' style='width: 100%;'>
					100%
					</div>
				</div>
			</div>
			<div class='row'>
				<div class='alert alert-success'>
					<strong>Success!</strong> Cet article a �t� soumis avec succ�s, vous serez notifi� apr�s le traitement.. <a href='../controleur/acceUser.php'>Retour</a>
				</div>
			</div>
		</div>";
			}else {
				$mes= "<div class='alert alert-danger'>
						<strong>D�sol�!</strong> Erreur lors de la soumission.. <a href='../controleur/acceUser.php'>Retour</a>
					</div>
				</div>
				</div>";
				}

 
				}
			 }
		  }
	  }

	}
	}
include_once('../vue/VueAjoutart.php');
?>