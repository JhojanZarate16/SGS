<?php
require_once("modelo/class.php");
if(isset($_SESSION["id_perfil"]))
{
if($_SESSION["id_perfil"]==1)
{
?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device−width, initial−scale=1.0" />
	<title>Pagina Principal</title>
	<link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
	<link rel="shortcut icon" href="http://static.tmimgcdn.com/img/favicon.ico">
	<link rel="icon" href="http://static.tmimgcdn.com/img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
	<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/li.css">
	<style type="text/css">
		body {
			padding-top: 70px;
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
			<li class="active"><a href="admin.php">Inicio</a></li>
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
		
	</div>
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
</html>