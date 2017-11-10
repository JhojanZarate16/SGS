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
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
	<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/ko.css">
	<link rel="stylesheet" type="text/css" href="css/carrusel.css">
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
				<li><a id="menu" href="register.php">Registrar</a></li>
				<li><a id="menu" href="crudper.php">Actualizar y Eliminar</a></li>
				<li><a id="menu" href="salir.php">Cerrar Sesion</a></li>
            </ul>
        </div>
    </div>
</nav>
<div id="contenedor">
	<div id="menu" class="a">
		<label class="lo">Buscador</label>
		<ul>
			<li><a id="letras" href="bcor.php">Correspondencia</a></li>
			<li><a id="letras" href="bnal.php">M. Nacional</a></li>
			<li><a id="letras" href="bint.php">M. Internacional</a></li>
			</ul>
		</ul>
	</div>
	<br>
	<div id="menu" class="a">
		<label class="lo">Exportar<br>Datos</label>
		<ul>
			<li><a id="letras" href="expcor.php">Correspondencia</a></li>
			<li><a id="letras" href="bnal.php">M. Nacional</a></li>
			<li><a id="letras" href="bint.php">M. Internacional</a></li>
			</ul>
		</ul>
	</div>
	<div align="center" class="b">
		<h2>Control De Mensajeria</h2>
		<br>
		<div class="content-all">
			<div class="content-carrousel">
				<figure><img src="img/sgs.png"></figure>
				<figure><img src="img/img2.jpg"></figure>
				<figure><img src="img/img3.jpg"></figure>
				<figure><img src="img/img4.jpg"></figure>
				<figure><img src="img/img5.jpg"></figure>
				<figure><img src="img/img6.jpg"></figure>
				<figure><img src="img/img7.jpg"></figure>
				<figure><img src="img/img8.jpg"></figure>
				<figure><img src="img/img9.jpg"></figure>
			</div>
		</div>
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
		<a href='index.php'>Volver</a>
	</h1>
    <?php
}
?>
</html>