<?php
require_once("modelo/class3.php");

if(isset($_SESSION["id_perfil"]))
{
if($_SESSION["id_perfil"]==4)
{
	$herr = new Herramientas();
	$perid = $herr->Inter($_GET["per"]);
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Guia N° <?php echo $perid[0]["guia"] ?></title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		table {
			border-collapse:separate;
			border-spacing: 5px;
		}
		
		#reg{
			border: 1px solid;
			padding: 10px;
			border-radius: 20px;
		}
	</style>
</head>
<body>
<div class="text-center register">
<form name="form" class="text-left" method="post" action="">
<table align="center">
	<tr>
		<td colspan="4" align="center"><div class="logo">Guia N° <?php echo $perid[0]["guia"] ?></td>
	</tr>
</table>
<table align="center">
	<tr>
		<div class="form-group">
		<td><label>Empresa</label></td>
			<td><input type="text" class="form-control" value="<?php echo $perid[0]["empresa"] ?>" disabled="disabled"></td>
		</div>
	</tr>
	<tr>
		<div class="form-group">
			<td><label>Fecha</label></td>
			<td><input type="text" class="form-control" value="<?php echo $perid[0]["fecha"] ?>" disabled="disabled"></td>
		</div>
	</tr>
	<tr>
		<div class="form-group">		
			<td><label>Remitente</label></td>
			<td><input type="text" class="form-control" value="<?php echo $perid[0]["remitente"] ?>" disabled="disabled"></td>
		</div>
	</tr>
	<tr>
		<div class="form-group">
			<td><label>Ciudad</label></td>
			<td><input type="text" class="form-control" value="<?php echo $perid[0]["ciudad"] ?>" disabled="disabled"></td>
		</div>
	</tr>
	<tr>
		<div class="form-group">
			<td><label>Destinatario</label></td>
			<td><input type="text" class="form-control" value="<?php echo $perid[0]["destinatario"] ?>" disabled="disabled"></td>
		</div>
	</tr>
	<tr>
		<div class="form-group">
			<td><label>Direccion</label></td>
			<td><input type="text" class="form-control" value="<?php echo $perid[0]["direccion"] ?>" disabled="disabled"></td>
		</div>
	</tr>
	<tr>
		<div class="form-group">
			<td><label>Destino</label></td>
			<td><input type="text" class="form-control" value="<?php echo $perid[0]["destino"] ?>" disabled="disabled"></td>
		</div>
	</tr>
	<tr>
		<div class="form-group">
			<td><label>Telefono</label></td>
			<td><input type="text" class="form-control" value="<?php echo $perid[0]["telefono"] ?>" disabled="disabled"></td>
		</div>
	</tr>
	<tr>
		<div class="form-group">
			<td><label>Centro De Costo</label></td>
			<td><input type="text" class="form-control" value="<?php echo $perid[0]["ceco"] ?>" disabled="disabled"></td>
		</div>
	</tr>
	<tr>
		<div class="form-group">
			<td><label>Observaciones</label></td>
			<td><input type="text" class="form-control" value="<?php echo $perid[0]["observaciones"] ?>" disabled="disabled"></td>
		</div>
	</tr>
</table>
<table align="center">
	<tr>
		<div class="form-group">
			<td><input type="hidden" name="registrar" value="si"></td>
			<td align="left">
				<a href="bint2.php" id="reg" tabindex="2">Regresar</a>
			</td>
		</div>
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
			Contenido Bloqueado Solo Pueden Acceder, Mensajeros 
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