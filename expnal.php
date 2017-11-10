<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("modelo/class.php");
if(isset($_SESSION["id_perfil"]))
{
if($_SESSION["id_perfil"]==1)
{
	$herr = new Herramientas();
	$per = $herr->ListarPersonas();
?>
<html>  
    <head>  
		<meta charset="UTF-8">
			<title>Exportar Correspondencia</title>
			<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
			<link rel="icon" href="img/favicon.ico" type="image/x-icon">
			<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
			<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
			<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<link rel="stylesheet" type="text/css" href="css/li.css">
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
				<li><a href="admin.php">Inicio</a></li>
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
			<li><a href="expnal.php">M. Nacional</a></li>
			<li><a href="expint.php">M. Internacional</a></li>
			</ul>
		</ul>
	</div>
	<div align="center" class="b">
		<table align="center" class="">
			<tr>
				<td colspan="6" align="center"><div class="logo">Registros<br>Mensajeria Nacional<hr></div></td>
			</tr>
			<tr align="center">
				<td align="center">
					<form name="form" method="post" action="expnal.php">
						<td>
							<label>Fecha Inicial</label>
						</td>
						<td>
							<label>Fecha Final</label>
						</td>
				</td>	
			</tr>
			<tr>
				<td>
						<td>
							<input class="form-control" name="buscar" type="date" placeholder="Buscar Usuario" tabindex="1">
						</td>
						<td>
							<input class="form-control" name="buscar2" type="date" placeholder="Buscar Usuario" tabindex="2">
						</td>
				</td>
			</tr>
			<tr align="center"> 
				<td>
				</td>
				<td colspan="6">
					<input type="submit" name="Submit" value="Buscar" tabindex="3">
					</form>
				</td>
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
			$buscar = ($_POST['buscar']); 
			$buscar2 = ($_POST['buscar2']);
			$conexion = mysqli_connect("localhost", "root", "qwerty", "demo");  
			$query ="SELECT * FROM nacional WHERE fecha BETWEEN '".$buscar."' and '".$buscar2."'";  
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
							<td><a href="javascript:prueba('moren.php?per=<?php echo $row["id_nacional"]?>')" tabindex="3"><img src="img/plus.png" width="20" height="20" tabindex="4"></a></td>
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
</div> 
</body>
<?php
	}
?>  
<body>
<?php
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
</body>
</html>