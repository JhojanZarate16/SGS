<?php
require_once("modelo/class2.php");
$herr = new Herramientas();

if(isset($_POST["registrar"]) and $_POST["registrar"]=="si")
{
	$reg = $herr->RegistroNacional();exit;
}
if(isset($_SESSION["id_perfil"]))
{	
	if($_SESSION["id_perfil"]==3)
	{
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Mensajeria Nacional</title>
	<link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
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
			border-spacing: 15px;
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
				<li><a href="usu.php">Inicio</a></li>
				<li><a href="correspondencia.php">Correspondencia</a></li>
				<li class="active"><a href="nacional.php">Mensajeria Nacional</a></li>
				<li><a href="internacional.php">Mensajeria Internacional</a></li>
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
						<td colspan="6" align="center"><div class="logo">Orden De Mensajeria Nacional</div></td>
					</tr>
					<tr align="center">
						<div class="form-group">
							<td><label class="sr-only">Empresa</label></td>
							<td><select tabindex="1" name="empresa" class="form-control">
							<option value="0">Empresa</option>
							<option value="SGS">SGS</option>
							<option value="ETSA">ETSA</option>
							<option value="CONTECON">CONTECON</option>
							<option value="SIGA">SIGA</option>
							</select></td>
						</div>
						<div class="form-group">
							<td><label class="sr-only">Fecha</label></td>
							<td><input class="form-control" type="date" name="fecha" tabindex="2"></td>
						</div>
						<div class="form-group">
							<td><label class="sr-only">Remitente</label></td>
							<td><input class="form-control" type="text" placeholder="Remitente" name="rem" tabindex="3"></td>
						</div>
					</tr>
					<tr>
						<div class="form-group">
							<td><label class="sr-only">Sede Remitente</label></td>
							<td><input class="form-control" type="text" placeholder="Ciudad De Remitente" name="sede" tabindex="4"></td>
						</div>
						<div class="form_group">
							<td><label class="sr-only">Destinatario</label></td>
							<td><input class="form-control" type="text" placeholder="Destinatario" name="dest" tabindex="5"></td>
						</div>
						<div class="form-group">
							<td><label class="sr-only">Sucursal O Ciudad</label></td>
							<td><input class="form-control" type="text"placeholder="Ciudad De Destino" name="ciu" tabindex="6"></td>
						</div>
					</tr>
					<tr>
						<div class="form-group">
							<td><label class="sr-only">Direccion</label></td>
							<td colspan="3" ><input class="form-control" placeholder="Direccion De Destino" name="dir" tabindex="7"></td>
						</div>
						<div class="form-group">
							<td><label class="sr-only">Telefono</label></td>
							<td><input class="form-control" type="tel" placeholder="Telefono De Contacto" name="tel" tabindex="8"></td>
						</div>
					</tr>
					<tr>
						<div class="form-group">
							<td><label class="sr-only">Centro De Costo</label></td>
							<td><input class="form-control" type="text" placeholder="Centro De Costo" name="ceco" tabindex="9"></td>
						</div>
						<div class="form-group">
							<td><label class="sr-only">Observaciones</label></td>
							<td colspan="3" ><input class="form-control" type="text" placeholder="Observaciones" name="obser" tabindex="10"></td>
						</div>
					</tr>
					<tr>
						<div class="form-group">
							<td><input type="hidden" name="registrar" value="si"></td>
							<td colspan="6" align="center"><input type="button" class="login-button" value="Registrar Orden" onclick="window.form_reg.submit();" tabindex="11"></td>
						</div>
					</tr>
					<tr>
						<td>
						</td>
						<td colspan="5"><div id="resp">
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
								case 3:
								?>
								<div class="alert alert-success"> <h6 align="center">Usuario Ingresado Correctamente</h6><div>
								<?php
								break;
							}
						}
						?>
						</td>
					</tr>
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
			Contenido Bloqueado Solo Puede Acceder, Usuarios 
			<br>
			<a href='login.php'>Volver</a>
		</h1>
    <?php
}
?>
</body>
</html>