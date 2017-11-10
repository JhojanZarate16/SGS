<?php
require_once("modelo/class.php");

if(isset($_SESSION["id_perfil"]))
{
if($_SESSION["id_perfil"]==1)
{
	$herr = new Herramientas();
	$perid = $herr->PersonasXId($_GET["per"]);
	if(isset($_POST["reigs_per"]) and $_POST["reigs_per"]=="si")
	{
		$herr->ActualizarPersona();exit;
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Actualizar</title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		body {
			padding-top: 20px;
		}
		table {
			border-collapse:separate;
			border-spacing: 10px;
		}
	</style>
</head>
<body>
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
<div class="text-center register" style="padding-top:50px">
<form name="form" method="post">
<table align="center">
	<tr>
		<td colspan="4" align="center"><div class="logo">Actualizar Usuarios</td>
	</tr>
</table>
<br>
<br>
<table align="center">
	<tr>
		<div class="form-group">
			<td><label>Id Usuario</label></td>
			<td><input type="text" class="form-control" name="id_user" placeholder="<?php echo $perid[0]["id_user"] ?>" disabled="disabled"></td>
			<td><label>Nombre</label></td>
			<td><input type="text" class="form-control" name="nom" tabindex="1" value="<?php echo $perid[0]["nombre"] ?>"></td>
		</div>
	</tr>
	<tr>
		<div class="form-group">
			<td><label>Usuario</label></td>
			<td><input type="text" class="form-control" name="user" tabindex="2" value="<?php echo $perid[0]["user"] ?>" disabled="disabled"></td>
			<td><label>Contraseña</label></td>
			<td><input type="text" class="form-control" name="pass" tabindex="3" value="<?php echo $perid[0]["pass"] ?>"></td>
		</div>
	</tr>
	<tr>
	<td><label>Tipo De Usuario</label></td>
	<td><input type="text" class="form-control" name="t_user" tabindex="4" value="<?php echo $perid[0]["t_user"] ?>"></td>
		<div class="form-group">
			<input type="hidden" name="reigs_per" value="si" />
			<input type="hidden" name="codigo" value="<?php echo $perid[0]["id_user"] ?>">
		</div>
	</tr>
	<tr>
		<td><hr /></td>
	</tr>
	<tr>
		<div class="form-group">
			<td colspan="4" align="center">
				<input type="button" class="login-button" tabindex="5" value="Registrar Informacion" onclick="document.form.submit();" />
				<input type="button" value="Cancelar" tabindex="6" onclick="window.location='crudper.php'">
			</td>
		</div>
	</tr>
	<tr>
		<td colspan="4" align="center">
		<br>
			<?php
				if(isset($_GET["m"]))
				{
					switch($_GET["m"])
					{
						case 0:
						?>
							<div class="alert alert-danger"><h6 align="center">Debes Rellenar Todos Los Campos</h6></div>
						<?php
						break;
						case 2:
							?>
								<div class="alert alert-info"> <h6 align="center">El Usuario Que Intentas Utilizar, Se Ecuentra en Uso</h6><div>
							<?php
							break;
						case 1:
						?>
							<div class="alert alert-success"> <h6 align="center">Usuario Ingresado Correctamente</h6><div>
						<?php
						break;
					}
				}
			?>
		<td>
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