<?php

class classenumero
{
	public $id;
	private $nom;
	private $theme;
	private $dat;
	private $description;
	private $image;
	
		function __construct($nvid,$nvnom,$nvtheme,$nvdate,$nvdescription,$nvimage)
	{
		$this->id=$nvid;
		$this->nom=$nvnom;
		$this->theme=$nvtheme;
		$this->dat=$nvdate;
		$this->description=$nvdescription;
		$this->image=$nvimage;
		
	}
	

	function seconnecter()
	{
		include('connexion.php');
	}
	function addnumero()
	{
	
		$query="INSERT INTO `numero`(`id`, `nom`, `theme`, `date`, `description`, `image`)
		VALUES ('".$this->id."','".$this->nom."','".$this->theme."','".$this->dat."','".$this->description."','".$this->image."')";
			
		
			$result=mysql_query($query);
			if ($result){
			return true;}else
			return false;
			
			
	}
	function Suppnumero()
	{
		
			$query="DELETE FROM `numero` where `id`= '".$this->id."'";
			
			$result=mysql_query($query);
			if ($result){
			return true;}else
			return false;
	}
	
	
	function updatenumero()
	{
		
			$query="Update `numero` SET `nom`= '".$this->nom."', `theme`= '".$this->theme."',`date`='".$this->dat."' ,`description`= '".$this->description."',`image`= '".$this->image."' where `id`= '".$this->id."'";
			
			$result=mysql_query($query);
			if ($result){
					return true;}
				else
			return false;
		}
	}


?>