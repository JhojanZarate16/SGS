<?php
require_once("modelo/class.php");
$herr = new Herramientas();

if(isset($_POST["login"]) and $_POST["login"]=="si")
{
	$log = $herr->Loguin();
}
?>
<html lang="es">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Iniciar Sesion</title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="text-center login" style="padding:20px 0">
	<img id="img" src="img/2.jpg">
    <div class="logo">Login</div>
	<div class="login-form-1">
		<form id="login-form" class="text-left" name="form" method="post">
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="lg_username" class="sr-only">Usuario</label>
						<input type="text" class="form-control" id="lg_username" name="user" placeholder="Usuario" required="">
					</div>
					<div class="form-group">
						<label for="lg_password" class="sr-only">Contraseña</label>
						<input type="password" class="form-control" id="lg_password" name="pass" placeholder="Contraseña" required="">
					</div>
					<div class="form-group login-group-checkbox">
						<input type="checkbox" id="lg_remember" name="lg_remember">
						<label for="lg_remember">Recordar</label>
					</div>
				</div>
				<input type="hidden" name="login" value="si" />
				<button type="submit" class="login-button" name="iniciar"><i class="fa fa-chevron-right"></i></button>
			</div>
			<br>
			<div align="center">
				<?php
					if(isset($_GET["l"]))
					{
						switch($_GET["l"])
						{
						case 1:
				?>
						<div class="alert alert-danger"><h6>Usuario o Contraseña Herrado</h6></div>
				<?php
						break;
						}
					}
				?>
			</div>
		</form>
	</div>
</div>
</body>
</html>