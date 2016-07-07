<?php

class classarticle
{
	private $id;
	private $titre;
	private $image;
	private $dat;
	private $theme;
	private $description;
	private $fichier;
	private $etat;
	private $motcle;
	private $numero;

	
	
		function __construct($nvid,$nvtitre,$nvimage,$nvdat,$nvtheme,$nvdescription,$nvfichier,$nvetat,$nvmotcle,$nvnumero)
	{
		$this->id=$nvid;
		$this->titre=$nvtitre;
		$this->image=$nvimage;
		$this->dat= $nvdat;
		$this->theme=$nvtheme;
		$this->description=$nvdescription;
		$this->fichier=$nvfichier;
		$this->etat=$nvetat;
		$this->motcle=$nvmotcle;
		$this->numero=$nvnumero;
		
		
	}
	

	function seconnecter()
	{
		include('connexion.php');
	}
	function addarticle()
	{
	
		$query="INSERT INTO `article`(`id`, `titre`, `image`, `date`, `theme`, `description`, `fichier`,`etat`,`motsCle`,`numero`)
		VALUES ('".$this->id."','".$this->titre."','".$this->image."','".$this->dat."','".$this->theme."','".$this->description."','".$this->fichier."','".$this->etat."','".$this->motcle."','".$this->numero."')";
			
		
			$result=mysql_query($query);
			if ($result){
			return true;}else
			return false;
			
			
	}
	function Supparticle()
	{
		
			$query="DELETE FROM `article` where `id`= '".$this->id."'";
			
			$result=mysql_query($query);
			if ($result)
				return true;
			else
				return false;
		
	}
	
	
	function updatearticle()
	{
		
			$query="Update `article` SET `titre`= '".$this->titre."', `image`= '".$this->image."',`date`='".$this->dat."' ,`theme`= '".$this->theme."',`description`= '".$this->description."',`fichier`= '".$this->fichier."',`etat`= '".$this->etat."',`motsCle`= '".$this->motcle."',`numero`= '".$this->numero."' 
			WHERE `id` ='".$this->id."'";
			
			$result=mysql_query($query);
			if ($result){
					return true;}
				else
			return false;
		}
	}


?>