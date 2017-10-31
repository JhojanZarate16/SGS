<html>
<head>
	<title>Actualizacion Correcta</title>
	<style>
		body
		{
			background: #efefef;
			margin-top: 100px;
		}

		.act
		{
			background: #E4E3E3;
			margin: 10px;
			border-radius: 20px;
		}

		h1
		{
			font-size: 80px;
		}

		button
		{
			padding: 10px;
			background: #E4E3E3;
			border-radius: 20px;
		}

		button:hover
		{
			background: #414141;
			color: #FFFFFF;
		}
	</style>
</head>
<body>
<?php

	$host='localhost';
	$root='root';
	$pass='qwerty';
	$db='demo';

	$con = mysqli_connect($host,$root,$pass,$db);
	if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

	mysqli_select_db($con,"test");
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to BD: " . mysqli_connect_error();
		}
		else
		{
			mysqli_query($con, "UPDATE internacional set guia='$_POST[guia]', estado ='Resuelto' WHERE id_inter='$_POST[cod]'");
			if (mysqli_connect_errno())
			{
			echo "Error: " . mysqli_connect_error();
			}
			{
				echo 
				"<div align='center' class='act'>
					<br>
					<h1>Actualizacion Correcta</h1>
					<br>
				</div>
				<div align='center'>
					<button type='button' onclick='javascript:window.close()'>Cerrar Ventana</button>
				</div>";
			}
		}
	
	mysqli_close($con);
?>
</body>
</html>