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
	
	public function ListarPersonas()
	{
		self::SetName();
		$sql = " select * from users order by nombre asc ";
		foreach($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
	
	public function PersonasXId($id_user)
	{
		self::SetName();
		$sql = " select * from users where id_user = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array( $id_user ) );
		$num = $stmt->rowCount();
		if($num==0)
		{
			header("Location: crudper.php");
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
	
	public function PersonasId($id_correspondencia)
	{
		self::SetName();
		$sql = " select * from correspondencia where id_correspondencia = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute( array( $id_correspondencia ) );
		$num = $stmt->rowCount();
		if($num==0)
		{
			header("Location: expcor.php");
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
	
	public function ActualizarPersona()
	{
		self::SetName();
		if(empty($_POST["nom"]) or empty($_POST["user"]) or empty($_POST["pass"]) or empty($_POST["t_user"]))
		{
			header("Location: actualizar.php?m=0&per=".$_POST["codigo"]);exit;
		}
		$sql = " update users set nombre = ?, user = ?, pass = ?, t_user = ? where id_user = ?";
		$stmt = $this->dbh->prepare($sql);	
			
		$stmt->bindParam(1,$nom);
		$stmt->bindParam(2,$user);
		$stmt->bindParam(3,$pass);
		$stmt->bindParam(4,$t_user);
		$stmt->bindParam(5,$id_user);
			
		$nom = strip_tags($_POST["nom"]);
		$user = strip_tags($_POST["user"]);
		$pass = md5(strip_tags($_POST["pass"]));
		$t_user = strip_tags($_POST["t_user"]);
		$id_user = strip_tags($_POST["codigo"]);
		$stmt->execute();
		
		header("Location: actualizar.php?m=1&per=".$_POST["codigo"]);exit;	

	}
	
	public function EliminarPersona($codigo)
	{
		self::SetName();
		$sql = " delete from users where id_user = ? ";
		$stmt = $this->dbh->prepare($sql);
		
		$stmt->bindParam(1,$id_user);
		$id_user = $codigo;
		$stmt->execute();
		
		header("Location: crudper.php?m=1");exit;	
	}
	
	public function RegistrarUsuarios()
	{
		self::SetName();
		if(empty($_POST["nom"]) or empty($_POST["user"]) or empty($_POST["pass"])  or empty($_POST["pass_2"])  or empty($_POST["select"]))
		{
			header("Location: register.php?m=0");exit;
		}

		$sql = " select user from users where user = ?";
		$stmt = $this->dbh->prepare($sql);
		
		$stmt->execute( array( $_POST["user"] ) );
		$num = $stmt->rowCount();
		if($num==0)
		{
			if($_POST["pass"] == $_POST["pass_2"])
			{
				$query = " insert into users values(null, ?, ?, ?, ?) ";
				$stmt = $this->dbh->prepare($query);
				
				$stmt->bindParam(1,$nom);
				$stmt->bindParam(2,$user);
				$stmt->bindParam(3,$pass);
				$stmt->bindParam(4,$tuser);
				
				$nom = strip_tags($_POST["nom"]);
				$user = strip_tags($_POST["user"]);
				$pass = md5(strip_tags($_POST["pass"]));
				$tuser = strip_tags($_POST["select"]);
				
				$stmt->execute();
				header("Location: register.php?m=3");	
			}
			else
			{
				header("Location: register.php?m=2");
			}
		}
		else
		{
			header("Location: register.php?m=1");
		}
	}

	public function ListarUsuarios()
	{
		self::SetName();
		$sql = " select * from users ";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->p[] = $row;
		}
		return $this->p;
		$this->dbh=null;
	}
	
	public function Loguin()
	{
		self::SetName();
		$pass = md5(strip_tags($_POST["pass"]));
		if(empty($_POST["user"]) or empty($_POST["pass"]))
		{
			header("Location: login.php?l=0");exit;
		}
		$sql = " select * from users where user = ? and pass = ? ";
		$stmt = $this->dbh->prepare($sql);
		
		$stmt->execute( array($_POST["user"], $pass ) );
		$num = $stmt->rowCount();
		if($num==0)
		{
			header("Location: login.php?l=1");
		}
		else
		{
			if($row = $stmt->fetch())
			{
				$p[]=$row;
			}
			switch($p[0]["t_user"])
			{
				case 1:
				$_SESSION["id_usuario"]=$p[0]["id_user"];
				$_SESSION["id_perfil"]=$p[0]["t_user"];
				$_SESSION["usuario_nombre"]=$p[0]["nombre"];
				header("Location: admin.php?Login=Correcto");exit;
				break;
				case 2;
					$_SESSION["id_usuario"]=$p[0]["id_user"];
					$_SESSION["id_perfil"]=$p[0]["t_user"];
					$_SESSION["usuario_nombre"]=$p[0]["nombre"];
					header("Location: usucor.php?Login=Correcto");exit;
				break;
				case 3;
					$_SESSION["id_usuario"]=$p[0]["id_user"];
					$_SESSION["id_perfil"]=$p[0]["t_user"];
					$_SESSION["usuario_nombre"]=$p[0]["nombre"];
					header("Location: usu.php?Login=Correcto");exit;
				break;
				case 4;
					$_SESSION["id_usuario"]=$p[0]["id_user"];
					$_SESSION["id_perfil"]=$p[0]["t_user"];
					$_SESSION["usuario_nombre"]=$p[0]["nombre"];
					header("Location: usumen.php?Login=Correcto");exit;
				break;
			}
			
		}
	}
}
?>