<?php
session_start();
class Herramientas
{
	private $dbh;
	private $p;
	
	public function __construct()
	{
		$this->p= array();
		$this->dbh = new PDO("mysql:host=localhost;dbname=demo","root","qwerty");
	}
	public function SetName()
	{
		return $this->dbh->query("SET NAMES utf8");
	}
	
	public function Id($id_correspondencia)
	{
		self::SetName();
		$sql = " select * from correspondencia where id_correspondencia = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array( $id_correspondencia ) );
		$num = $stmt->rowCount();
		if($num==0)
		{
			header("Location: correspondencia.php");
		}
		else
		{
			if($row = $stmt->fetch())
			{
				$this->p[] = $row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
	
	public function Nal($id_nacional)
	{
		self::SetName();
		$sql = " select * from nacional where id_nacional = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array( $id_nacional ) );
		$num = $stmt->rowCount();
		if($num==0)
		{
			header("Location: morenal.php");
		}
		else
		{
			if($row = $stmt->fetch())
			{
				$this->p[] = $row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
	
	public function Inter($id_inter)
	{
		self::SetName();
		$sql = " select * from internacional where id_inter = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array( $id_inter ) );
		$num = $stmt->rowCount();
		if($num==0)
		{
			header("Location: moreint.php");
		}
		else
		{
			if($row = $stmt->fetch())
			{
				$this->p[] = $row;
			}
			return $this->p;
			$this->dbh=null;
		}
	}
}
?>