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
	
	public function RegistrarCorrespondencia()
	{
		self::SetName();
		if(empty($_POST["empresa"]) or empty($_POST["fecha"]) or empty($_POST["rem"]) or empty($_POST["sede"])  or empty($_POST["dest"])  or empty($_POST["dir"]) or empty($_POST["ciu"]) or empty($_POST["tel"])  or empty($_POST["ceco"])  or empty($_POST["tdoc"]))
		{
			header("Location: correspondencia.php?m=0");exit;
		}

		$sql = "select empresa from correspondencia where empresa = ?";
		$stmt = $this->dbh->prepare($sql);
		
		$stmt->execute( array( $_POST["id_correspondencia"] ) );
		$num = $stmt->rowCount();
		if($num==0)
		{
			$query = " insert into correspondencia values(null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, 'Activo')";
			$stmt = $this->dbh->prepare($query);
				
			$stmt->bindParam(1,$empresa);
			$stmt->bindParam(2,$fecha);
			$stmt->bindParam(3,$remitente);
			$stmt->bindParam(4,$ciudad);
			$stmt->bindParam(5,$destinatario);
			$stmt->bindParam(6,$direccion);
			$stmt->bindParam(7,$destino);
			$stmt->bindParam(8,$telefono);
			$stmt->bindParam(9,$ceco);
			$stmt->bindParam(10,$t_documento);
				
			$empresa = strip_tags($_POST["empresa"]);
			$fecha = strip_tags($_POST["fecha"]);
			$remitente = strip_tags($_POST["rem"]);
			$ciudad = strip_tags($_POST["sede"]);
			$destinatario = strip_tags($_POST["dest"]);
			$destino = strip_tags($_POST["ciu"]);
			$direccion = strip_tags($_POST["dir"]);
			$telefono = strip_tags($_POST["tel"]);
			$ceco = strip_tags($_POST["ceco"]);
			$t_documento = strip_tags($_POST["tdoc"]);

				
			$stmt->execute();
			header("Location: correspondencia.php?m=3");	
		}
		else
		{
			header("Location: login.php?m=1");
		}
	}
	
	public function RegistroNacional()
	{
		self::SetName();
		if(empty($_POST["empresa"]) or empty($_POST["fecha"]) or empty($_POST["rem"]) or empty($_POST["sede"]) or empty($_POST["dest"]) or empty($_POST["dir"]) or empty($_POST["ciu"]) or empty($_POST["tel"]) or empty($_POST["ceco"]) or empty($_POST["obser"]))
		{
			header("Location: nacional.php?m=0");exit;
		}

		$sql = "select empresa from nacional where empresa = ?";
		$stmt = $this->dbh->prepare($sql);
		
		$stmt->execute( array( $_POST["id_nacional"] ) );
		$num = $stmt->rowCount();
		if($num==0)
		{
			$query = " insert into nacional values(null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, 'Activo') ";
			$stmt = $this->dbh->prepare($query);
				
			$stmt->bindParam(1,$empresa);
			$stmt->bindParam(2,$fecha);
			$stmt->bindParam(3,$remitente);
			$stmt->bindParam(4,$ciudad);
			$stmt->bindParam(5,$destinatario);
			$stmt->bindParam(6,$direccion);
			$stmt->bindParam(7,$destino);
			$stmt->bindParam(8,$telefono);
			$stmt->bindParam(9,$ceco);
			$stmt->bindParam(10,$observaciones);
				
			$empresa = strip_tags($_POST["empresa"]);
			$fecha = strip_tags($_POST["fecha"]);
			$remitente = strip_tags($_POST["rem"]);
			$ciudad = strip_tags($_POST["sede"]);
			$destinatario = strip_tags($_POST["dest"]);
			$destino = strip_tags($_POST["ciu"]);
			$direccion = strip_tags($_POST["dir"]);
			$telefono = strip_tags($_POST["tel"]);
			$ceco = strip_tags($_POST["ceco"]);
			$observaciones = strip_tags($_POST["obser"]);
				
			$stmt->execute();
			header("Location: nacional.php?m=3");	
		}
		else
		{
			header("Location: login.php?m=1");
		}
	}
	
	public function Inter()
	{
		self::SetName();
		if(empty($_POST["empresa"]) or empty($_POST["fecha"]) or empty($_POST["rem"]) or empty($_POST["sede"]) or empty($_POST["dest"]) or empty($_POST["dir"]) or empty($_POST["ciu"]) or empty($_POST["tel"]) or empty($_POST["ceco"]) or empty($_POST["obser"]))
		{
			header("Location: internacional.php?m=0");exit;
		}

		$sql = "select empresa from internacional where empresa = ?";
		$stmt = $this->dbh->prepare($sql);
		
		$stmt->execute( array( $_POST["id_inter"] ) );
		$num = $stmt->rowCount();
		if($num==0)
		{
			$query = " insert into internacional values(null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, 'Activo') ";
			$stmt = $this->dbh->prepare($query);
				
			$stmt->bindParam(1,$empresa);
			$stmt->bindParam(2,$fecha);
			$stmt->bindParam(3,$remitente);
			$stmt->bindParam(4,$ciudad);
			$stmt->bindParam(5,$destinatario);
			$stmt->bindParam(6,$direccion);
			$stmt->bindParam(7,$destino);
			$stmt->bindParam(8,$telefono);
			$stmt->bindParam(9,$ceco);
			$stmt->bindParam(10,$observaciones);
				
			$empresa = strip_tags($_POST["empresa"]);
			$fecha = strip_tags($_POST["fecha"]);
			$remitente = strip_tags($_POST["rem"]);
			$ciudad = strip_tags($_POST["sede"]);
			$destinatario = strip_tags($_POST["dest"]);
			$destino = strip_tags($_POST["ciu"]);
			$direccion = strip_tags($_POST["dir"]);
			$telefono = strip_tags($_POST["tel"]);
			$ceco = strip_tags($_POST["ceco"]);
			$observaciones = strip_tags($_POST["obser"]);
				
			$stmt->execute();
			header("Location: internacional.php?m=3");	
		}
		else
		{
			header("Location: login.php?m=1");
		}
	}
}
?>	