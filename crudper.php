<?php
require_once("modelo/class.php");
if(isset($_SESSION["id_perfil"]))
{
if($_SESSION["id_perfil"]==1)
{
	$herr = new Herramientas();
	$per = $herr->ListarPersonas();
?>
<?php
require "modelo/Pagination.php";

$host = 'localhost';
$root = 'root';
$password = 'qwerty';
$dbname = 'demo';

$connection = new PDO("mysql:host=$host;dbname=$dbname;", $root, $password);
$pagination = new PDO_Pagination($connection);

$search = null;
if(isset($_REQUEST["search"]) && $_REQUEST["search"] != "")
{
	$search = htmlspecialchars($_REQUEST["search"]);
	$pagination->param = "&search=$search";
	$pagination->rowCount("SELECT * FROM users WHERE nombre LIKE '%".$search."%' OR user LIKE '%".$search."%'");
	$pagination->config(3, 4);
	$sql = "SELECT * FROM users WHERE nombre LIKE '%".$search."%' OR user LIKE '%".$search."%' ORDER BY id_user ASC LIMIT $pagination->start_row, $pagination->max_rows";
	$query = $connection->prepare($sql);
	$query->execute();
	$model = array();
while($rows = $query->fetch())
{
    $model[] = $rows;
}
}
else
{
	$pagination->rowCount("SELECT * FROM users");
	$pagination->config(3, 4);
	$sql = "SELECT * FROM users ORDER BY id_users ASC LIMIT $pagination->start_row, $pagination->max_rows";
	$query = $connection->prepare($sql);
	$query->execute();
	$model = array();
while($rows = $query->fetch())
{
    $model[] = $rows;
}
}
?>
<html>
<head>
<meta charset="UTF-8">
	<title>Gestion De Usuarios</title>
	<link rel="shortcut icon" href="http://static.tmimgcdn.com/img/favicon.ico">
	<link rel="icon" href="http://static.tmimgcdn.com/img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		body {
			padding-top: 50px;
		}
		table.pr{
			border-collapse: separate;
			border-spacing: 40px;
		}
	</style>
</head>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
		<div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
			<div class="update-nag">
				<div class="update-split update-info"><i class="glyphicon glyphicon-user"></i></div>
				<div class="update-text">
					<?php
						echo "Bienvenido ";
						echo $_SESSION["usuario_nombre"]
					?>
				</div>
			</div>
		</div>
        <div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li><a href="admin.php">Inicio</a></li>
				<li><a href="register.php">Registrar</a></li>
				<li class="active"><a href="crudper.php">Actualizar y Eliminar</a></li>
				<li><a href="salir.php">Cerrar Sesion</a></li>
            </ul>
        </div>
    </div>
</nav>
<table border="0" align="center">
	<tr>
		<td colspan="2" align="center"><div class="logo">Gestion De Usuarios</div></td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<form name="form" method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
				<input class="form-control" name="search" type="text" placeholder="Buscar Usuario" tabindex="1">
				<input type="submit" name="Submit" value="Buscar" tabindex="2">
			</form>
		</td>
	</tr>
</table>
<table align="center" class="pr">
	<tr align="center">
		<div class="form-group">
			<td>Id_Usuario</td>
			<td>Nombre</td>
			<td>Usuario</td>
			<td>Tipo De Usuario</td>
			<td>Actualizar</td>
			<td>Eliminar</td>
		</div>
	</tr>
<?php
	foreach($model as $row)
    {
?>
        <tr align="center">
			<td><?php echo $row["id_user"] ?></td>
			<td><?php echo $row["nombre"] ?></td>
			<td><?php echo $row["user"] ?></td>
			<td><?php echo $row["t_user"] ?></td>
			<td><a href="actualizar.php?per=<?php echo $row["id_user"]?>" tabindex="3"><img src="img/editar.jpg" width="18" height="18"></a></td>
			<td><a href="eliminar.php?per=<?php echo $row["id_user"] ?>" tabindex="4"><img src="img/eliminar.jpg" width="18" height="18"></a></td>
		</tr>
<?php	
    }
?>
</table>
<?php	
	}
	else
	{
?>
	<h1 align="center">
		Contenido Bloqueado Solo Puede Acceder, Administradores 
		<br>
		<a href='login.php'>Volver</a>
	</h1>
<?php	
	}
}
?>
</body>
<div align="center">
<?php
	$pagination->pages("btn");
?>
</div>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>