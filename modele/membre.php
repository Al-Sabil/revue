<?php

class membre
{
	private $id;
	private $nom;
	private $prenom;
	private $mail;
	private $login;
	private $mdp;

	function __construct($nvid,$nvnom,$nvprenom,$nvmail,$nvlogin,$nvmdp)
	{
		$this->id=$nvid;
		$this->nom=$nvnom;
		$this->prenom=$nvprenom;
		$this->mail = $nvmail;
		$this->login=$nvlogin;
		$this->mdp=$nvmdp;
	
	}
	
	function seconnecter()
	{
	include('connexion.php');
	}
	function addmembre()
	{
	
		$query="INSERT INTO `membre`(`id`,`nom`,`prenom`,`mail`,`login`,`mdp`) VALUES ('".$this->id."','".$this->nom."','".$this->prenom."','".$this->mail."','".$this->login."','".$this->mdp."')";
			
		
			$result=mysql_query($query);
			
			if ($result)
			{return true;}
			else {return false;}
		
	}
	function Suppmembre()
	{
		
			$query="DELETE FROM `membre` where `id`= '".$this->id."'";
			
			$result=mysql_query($query);
			if ($result)
				if ($result)
			{return true;}
			else {return false;}
		
	}
	
	
	function Update()
	{
		
			$query="Update  `membre` SET   `nom`= '".$this->nom."', `prenom`= '".$this->prenom."',`mail`='".$this->mail."',`login`='".$this->login."'  ,`mdp`= '".$this->mdp."' WHERE `id` ='".$this->id."'";
			
			$result=mysql_query($query);
			if ($result)
			{return true;}
			else {return false;}
	}
}

?>