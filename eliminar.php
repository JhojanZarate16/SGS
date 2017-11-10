<?php
require_once("modelo/class.php");

if(isset($_SESSION["id_perfil"]))
{
if($_SESSION["id_perfil"]==1)
{
	$herr = new Herramientas();
	$per = $herr->PersonasXId($_GET["per"]);
	if(isset($_POST["eliminar"]) and $_POST["eliminar"]=="si")
	{
		print_r($_POST);exit;
	}
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="js/fun.js"></script>
	<title>Eliminar</title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		body {
			padding-top: 60px;
		}
		table {
			border-collapse:separate;
			border-spacing: 30px;
		}
	</style>
</head>
<body>
<div class="text-center register" style="padding-top:30px">
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
<form name="form" method="post">
<table border="0" align="center">
	<tr>
		<td colspan="4" align="center"><div class="logo">Eliminar Usuario</div></td>
	</tr>
	<tr align="center">
		<td>Id_Usuario</td>
		<td>Nombre</td>
		<td>Usuario</td>
		<td>Tipo De Usuario</td>
	</tr>
	<tr align="center">
		<td><?php echo $per[0]["id_user"] ?></td>
		<td><?php echo $per[0]["nombre"] ?></td>
		<td><?php echo $per[0]["user"] ?></td>
		<td><?php echo $per[0]["t_user"] ?></td>
	</tr>
	<tr>
		<input type="hidden" name="eliminar" value="si" />
		<input type="hidden" name="ced" value="<?php echo $per[0]["id_user"] ?>" />
		<td colspan="4" align="center"><input type="button" value="Eliminar <?php echo $per[0]["nombre"] ?>" onclick="eliminar_123('elim.php?el=<?php echo $per[0]["id_user"] ?>');" /> &nbsp;&nbsp;
			<input type="button" value="Cancelar" onclick="window.location='crudper.php'" />
		</td>
	</tr>
</table>
</form>
</body>
<body>
<?php
}
}
else
{
	?>
		<h1 align="center">
			Contenido Bloqueado Solo Puede Acceder, Administradores 
			<br>
			<a href='index.php'>Volver</a>
		</h1>
    <?php
}
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>