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
				<li class="active"><a href="usumen.php">Ordenes Activas Nacionales</a></li>
				<li><a href="usumenint.php">Ordenes Activas Internacionales</a></li>
				<li><a href="salir.php">Cerrar Sesion</a></li>
            </ul>
        </div>
    </div>
</nav>
<body>
<table align="center" class="pm">
	<tr>
		<td colspan="6" align="center"><div class="logo">Registros Mensajeria Nacional<hr></div></td>
	</tr>
</table>
<table align="center" class="pr">  
    <tr align="center">  
		<div class="form-group">
			<td>ID</td>  
			<td>Empresa</td>  
			<td>Fecha</td>  
			<td>Remitente</td>  
			<td>CeCo</td>    
			<td>Ver Mas</td>  
		</div>
    </tr>  
	<?php
		$conexion = mysqli_connect("localhost", "root", "qwerty", "demo");  
		$query ="SELECT * FROM nacional where Estado = 'Activo' ORDER BY fecha DESC";  
		$result = mysqli_query($conexion, $query);  
							 
					while($row = mysqli_fetch_array($result))  
					{  
				?>
                <tr align="center">  
                    <td><?php echo $row["id_nacional"]; ?></td>  
                    <td><?php echo $row["empresa"]; ?></td>  
                    <td><?php echo $row["fecha"]; ?></td>  
                    <td><?php echo $row["remitente"]; ?></td>  
                    <td><?php echo $row["ceco"]; ?></td>
					<td><a href="javascript:prueba('morenal.php?per=<?php echo $row["id_nacional"]?>')"><img src="img/plus.png" width="20" height="20" tabindex="1"></a></td>
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
<body>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<h1 align="center">
			Contenido Bloqueado Solo Pueden Acceder, Personal Autorizado  
			<br>
			<a href='login.php'>Volver</a>
		</h1>
	<?php
}
?>
</body>
</html>