<?php

class evenement
{
	public $id;
	private $nom;
	private $type;
	private $datecreation;
	private $datefinale;
	private $des;
	private $text;
	private $etat;


	function __construct($nvid,$nvnom,$nvtype,$nvdatecreation,$nvdatefinale,$nvdesc,$nvtext,$nvetat)
	{
		$this->id=$nvid;
		$this->nom=$nvnom;
		$this->type=$nvtype;
		$this->datecreation = $nvdatecreation;
		$this->datefinale=$nvdatefinale;
		$this->des=$nvdesc;
		$this->text=$nvtext;
		$this->etat=$nvetat;

	}
	

	function seconnecter()
	{
		include('connexion.php');
	}
	function addevenement()
	{
	
		$query="INSERT INTO `evenement`(`id`, `nom`, `type`, `datecreation`, `datefinale`, `description`, `text`, `etat`) 
		VALUES ('".$this->id."','".$this->nom."','".$this->type."','".$this->datecreation."','".$this->datefinale."','".$this->des."','".$this->text."','".$this->etat."')";
			
		
			$result=mysql_query($query);
			if ($result){
			return true;}else
			return false;
		
	}

	function Suppevenement()
	{
		
			$query="DELETE FROM `evenement` where `id`= '".$this->id."'";
			
			$result=mysql_query($query);
			if ($result)
				return true;
			else
				return false;
		
	}
	
	
	function updateevenement()
	{
		
			$query="
			Update  `evenement` SET  `nom`= '".$this->nom."', `type`= '".$this->type."',`datecreation`='".$this->datecreation."' ,`datefinale`= '".$this->datefinale."', `description`= '".$this->des."', `text`= '".$this->text."', `etat`= '".$this->etat."' WHERE `id` ='".$this->id."'";
			
			$result=mysql_query($query);
			if ($result){
				return true;}else
			return false;
	}
}


?>