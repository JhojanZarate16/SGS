<?php
require_once("modelo/class.php");

if(isset($_SESSION["id_perfil"]))
{	
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
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
	</style>
<title>Control De Mensajeria</title>
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
				<li class="active"><a href="usu.php">Inicio</a></li>
				<li><a href="correspondencia.php">Correspondencia</a></li>
				<li><a href="nacional.php">Mensajeria Nacional</a></li>
				<li><a href="internacional.php">Mensajeria Internacional</a></li>
				<li><a href="salir.php">Cerrar Sesion</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="text-center register" style="padding-top:9px">
	<div align="center">
		<div class="over">
			<div class="logo">Control De Mensajeria<br>Y Correspondencia</div>
		</div>
	</div>
		<div id="myCarousel" align="center" class="carousel slide" data-interval="3000" data-ride="carousel" style="width: 100%">
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="item active">
					<img src="img/s1.png" alt="First Slide" onclick="window.location='correspondencia.php'">
					<div class="carousel-caption">
						<h3 onclick="window.location='correspondencia.php'">Correspondencia</h3>
						<p onclick="window.location='correspondencia.php'">Dale Click Aqui</p>
					</div>
				</div>
				<div class="item">
					<img src="img/s2.png" alt="Second Slide" onclick="window.location='nacional.php'">
					<div class="carousel-caption">
						<h3 onclick="window.location='nacional.php'">Mensajeria Nacional</h3>
						<p onclick="window.location='nacional.php'">Dale Click Aqui</p>
					</div>
				</div>
				<div class="item">
					<img src="img/s3.png" alt="Third Slide" onclick="window.location='internacional.php'">
					<div class="carousel-caption">
						<h3 onclick="window.location='internacional.php'">Mensajeria Internacional</h3>
						<p onclick="window.location='internacional.php'">Dale Click Aqui</p>
					</div>
				</div>
			</div>
			<a class="carousel-control left" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="carousel-control right" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div>
</div>
<?php
}
else
{
	?>
   Contenido Bloqueado Solo Puede Acceder, Usuarios <a href='javascript:history.back(-1)'>Volver</a>

  
    <?php
}
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- css3-mediaqueries.js for IE8 or older -->
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
</body>
</html>