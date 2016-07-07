<?php

class reviewer
{
	private $id;
	private $nom;
	private $prenom;
	private $mail;
	private $login;
	private $pass;
	private $groupe;

	
	function __construct($nvid,$nvnom,$nvprenom,$nvmail,$nvlogin,$nvpass,$nvgroupe)
	{
		$this->id=$nvid;
		$this->nom=$nvnom;
		$this->prenom=$nvprenom;
		$this->mail=$nvmail;
		$this->login=$nvlogin;
		$this->pass=$nvpass;
		$this->groupe=$nvgroupe;

	}
	

	function seconnecter()
	{
		include('connexion.php');
	}
	function addreviewer()
	{
	
		$query="INSERT INTO `reviewer`(`id`,`nom`,`prenom`,`mail`,`login`,`pass`,`groupe`) VALUES ('".$this->id."','".$this->nom."','".$this->prenom."','".$this->mail."','".$this->login."','".$this->pass."','".$this->groupe."')";
			
		
			$result=mysql_query($query);
			
			if ($result)
			return true;
		
	}
	function Suppreviewer()
	{
		
			$query="DELETE FROM `reviewer` where `id`= '".$this->id."'";
			
			$result=mysql_query($query);
			if ($result)
				return true;
		
	}
	
	
	function Updatereviewer()
	{
		
			$query="Update  `reviewer` SET   `nom`= '".$this->nom."', `prenom`= '".$this->prenom."',`mail`='".$this->mail."' ,`login`= '".$this->login."',`pass`= '".$this->pass."',`groupe`= '".$this->groupe."' WHERE `id` ='".$this->id."'";
			
			$result=mysql_query($query);
			if ($result)
				return true;
			else
				return false;
		}
}


?>