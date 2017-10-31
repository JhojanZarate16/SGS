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
	$pagination->rowCount("SELECT * FROM nacional WHERE guia LIKE '%".$search."%'");
	$pagination->config(3, 4);
	$sql = "SELECT * FROM nacional WHERE guia LIKE '%".$search."%' ORDER BY id_nacional ASC LIMIT $pagination->start_row, $pagination->max_rows";
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
	$pagination->rowCount("SELECT * FROM nacional");
	$pagination->config(3, 4);
	$sql = "SELECT * FROM nacional ORDER BY id_nacional ASC LIMIT $pagination->start_row, $pagination->max_rows";
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
	<title>Buscador De Mensajeria Nacional</title>
	<link rel="shortcut icon" href="http://static.tmimgcdn.com/img/favicon.ico">
	<link rel="icon" href="http://static.tmimgcdn.com/img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/li.css">
	<style type="text/css">
		body {
			padding-top: 70px;
		}
		table.pr{
			margin-left:250px;
			border-collapse: separate;
			border-spacing: 40px;
		}
		#pag{
			margin-top:50px;
			margin-left:870px;
		}
		
		#tit{
			margin-left:250px;
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
				<li><a href="crudper.php">Actualizar y Eliminar</a></li>
				<li><a href="salir.php">Cerrar Sesion</a></li>
            </ul>
        </div>
    </div>
</nav>
<div id="contenedor">
	<div id="menu" class="a">
		<label class="lo">Buscador</label>
		<ul>
			<li><a href="bcor.php">Correspondencia</a></li>
			<li><a href="bnal.php">M. Nacional</a></li>
			<li><a href="bint.php">M. Internacional</a></li>
			</ul>
		</ul>
	</div>
	<br>
	<div id="menu" class="a">
		<label class="lo">Exportar<br>Datos</label>
		<ul>
			<li><a href="expcor.php">Correspondencia</a></li>
			<li><a href="bnal.php">M. Nacional</a></li>
			<li><a href="bint.php">M. Internacional</a></li>
			</ul>
		</ul>
	</div>
	<div align="center" class="b">
		<table border="0" id="tit">
			<tr>
				<td colspan="2" align="center"><div class="logo">Buscador Mensajeria<br>Nacional</div></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<form name="form" method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
						<input class="form-control" name="search" type="text" placeholder="Buscar Guia" tabindex="1">
						<input type="submit" name="Submit" value="Buscar" tabindex="2">
					</form>
				</td>
			</tr>
		</table>
		<table align="center" class="pr">
			<tr align="center">
				<div class="form-group">
					<td>Guia</td>
					<td>Empresa</td>
					<td>Fecha</td>
					<td>Ce.Co</td>
					<td>Observaciones</td>
					<td>Ver Mas</td>
				</div>
			</tr>
		<?php
			foreach($model as $row)
		    {
		?>
		        <tr align="center">
					<td><?php echo $row["guia"] ?></td>
					<td><?php echo $row["empresa"] ?></td>
					<td><?php echo $row["fecha"] ?></td>
					<td><?php echo $row["ceco"] ?></td>
					<td><?php echo $row["observaciones"] ?></td>
					<td><a href="javascript:prueba('mornal.php?per=<?php echo $row["id_nacional"]?>')" tabindex="1"><img src="img/plus.png" width="20" height="20"></a></td>
				</tr>
		<?php	
		    }
		?>
		</table>
	</div>
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
<div id="pag">
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