<?php
require_once("modelo/class3.php");

if(isset($_SESSION["id_perfil"]))
{
if($_SESSION["id_perfil"]==4)
{
?>
<html>  
    <head>  
		<meta charset="UTF-8">
			<title>Ordenes Nacionales</title>
			<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
			<link rel="icon" href="img/favicon.ico" type="image/x-icon">
			<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
			<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
			<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<link rel="stylesheet" type="text/css" href="css/ok.css">
			<style type="text/css">
				body {
					padding-top: 70px;
				}
				table.pr{
					border-collapse: separate;
					border-spacing: 20px;
				}
				table.pm{
					border-collapse: separate;
					border-spacing: 10px;
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
				<li><a id="menu" href="usumen.php">Ordenes Activas Nacionales</a></li>
				<li class="active"><a href="usumenint.php">Ordenes Activas Internacionales</a></li>
				<li><a id="menu" href="salir.php">Cerrar Sesion</a></li>
            </ul>
        </div>
    </div>
</nav>
<body>
<div id="contenedor">
	<div id="menu" class="a">
		<label class="lo">Buscador</label>
		<ul>
			<li><a href="bnal2.php">M. Nacional</a></li>
			<li><a href="bint2.php">M. Internacional</a></li>
		</ul>
	</div>
	<div align="center" class="b">
		<table align="center" class="pm">
			<tr>
				<td colspan="6" align="center"><div class="logo">Registros Mensajeria Internacional<hr></div></td>
			</tr>
		</table>
		<table align="center" class="pr">  
			<tr align="center">  
				<div class="form-group">
					<td class="td">ID</td>  
					<td class="td">Empresa</td>  
					<td class="td">Fecha</td>  
					<td class="td">Remitente</td>  
					<td class="td">CeCo</td>    
					<td class="td">Ver Mas</td>  
				</div>
			</tr>  
			<?php
				$conexion = mysqli_connect("localhost", "root", "qwerty", "demo");  
				$query ="SELECT * FROM internacional where Estado = 'Activo' ORDER BY fecha DESC";  
				$result = mysqli_query($conexion, $query);  
									 
							while($row = mysqli_fetch_array($result))  
							{  
						?>
						<tr align="center">  
							<td><?php echo $row["id_inter"]; ?></td>  
							<td><?php echo $row["empresa"]; ?></td>  
							<td><?php echo $row["fecha"]; ?></td>  
							<td><?php echo $row["remitente"]; ?></td>  
							<td><?php echo $row["ceco"]; ?></td>
							<td><a href="javascript:prueba('moreint.php?per=<?php echo $row["id_inter"]?>')"><img src="img/plus.png" width="20" height="20" tabindex="1"></a></td>
							<script language="javascript">
							
							function prueba (url){
								window.open(url, "Diseño Web", "width=800, height=800")
							}
							</script>
						</tr>  
						<?php       
							}  
						?>  
			</table>
	</div>
<?php
	}
}
else
{
?>
	<h1 align="center">
		Contenido Bloqueado Solo Pueden Acceder, Personal Autorizado  
		<br>
		<a href='index.php'>Volver</a>
	</h1>
<?php
}
?>
</div>
</body>
<body>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>