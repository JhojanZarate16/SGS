<?php
require_once("modelo/class.php");
$herr = new Herramientas();

if(isset($_POST["registrar"]) and $_POST["registrar"]=="si")
{
	$reg = $herr->RegistrarUsuarios();exit;
}
if(isset($_SESSION["id_perfil"]))
{
if($_SESSION["id_perfil"]==1)
{
?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
	<link rel="shortcut icon" href="http://static.tmimgcdn.com/img/favicon.ico">
	<link rel="icon" href="http://static.tmimgcdn.com/img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		body {
			padding-top: 70px;
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
				<li class="active"><a href="register.php">Registrar</a></li>
				<li><a href="crudper.php">Actualizar y Eliminar</a></li>
				<li><a href="salir.php">Cerrar Sesion</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="text-center register" style="padding-top:50px">
	<table border="0" align="center">
		<div class="login-form-1">
			<div class="main-login-form">
				<form name="form_reg" class="text-left" method="post">
					<div class="login-form-main-message"></div>
					<tr>
					<td colspan="4" align="center"><div class="logo">Registro</div></td>
					</tr>
					<tr>
					<div class="form-group">
						<td><label class="sr-only">Nombre</label></td>
						<td><input class="form-control" type="text" name="nom" placeholder="Nombre y Apellido" tabindex="1"></td>
					</div>
					<div class="form-group">
						<td><label class="sr-only">Usuario</label></td>
						<td><input class="form-control" type="text" name="user" placeholder="Usuario" tabindex="2"></td>
					</div>
					</tr>
					<tr>
					<div class="form-group">
						<td><label class="sr-only">Pass</label></td>
						<td><input class="form-control" type="password" name="pass" placeholder="Contraseña" tabindex="3"></td>
					</div>
					<div class="form-group">
						<td><label class="sr-only">Rep Pass</label></td>
						<td><input class="form-control" type="password" name="pass_2" placeholder="Confirmar Contraseña" tabindex="4"></td>
					</div>
					</tr>
					<tr align="center">
					<div class="form-group">
						<td><label class="sr-only">T. Usuario</label></td>
						<td><select tabindex="5" name="select" class="form-control">
						<option value="0">Tipo De Usuario</option>
						<option value="1">Administrador</option>
						<option value="2">Mensajeria</option>
						<option value="4">Correspondencia</option>
						<option value="3">Usuario</option>
						</select></td>
						<td><input type="hidden" name="registrar" value="si"></td>
						<td colspan="4" align="center"><input type="button" class="login-button" tabindex="6" value="Registrar Usuarios" onclick="window.form_reg.submit();" /></td>
					</div>
					</tr>
					<tr>
					<td>
					</td>
					<td colspan="4"><div id="resp">
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
							case 1:
							?>
								<div class="alert alert-info"> <h6 align="center">El Usuario Que Intentas Utilizar, Se Ecuentra en Uso</h6></div>
							<?php
							break;
							case 2:
							?>
								<div class="alert alert-warning" ><h6 style="color:#FF0000" align="center">Las Contraseñas No Coinciden</h6></div>
							<?php
							break;
							case 3:
							?>
								<div class="alert alert-success"> <h6 align="center">Usuario Ingresado Correctamente</h6></div>
							<?php
							break;
						}
					}
					?>
					</div>
				</form>
			</div>
		</div>
	</table>
</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
			<a href='login.php'>Volver</a>
		</h1>
    <?php
}
?>
</body>
</html>