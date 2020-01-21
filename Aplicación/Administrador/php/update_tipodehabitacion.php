<?php
	require('conexion.php');
	$Tipo_habitacion = $_POST['Tipo_habitacion'];
	$Precio = $_POST['Precio'];
	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
	$sql1 = "Update tipodehabitacion
					Set Precio='$Precio[0]'
					Where TipoHab='$Tipo_habitacion[0]'";
	$sql2 = "Update tipodehabitacion
					Set Precio='$Precio[1]'
					Where TipoHab='$Tipo_habitacion[1]'";
	$sql3 = "Update tipodehabitacion
					Set Precio='$Precio[2]'
					Where TipoHab='$Tipo_habitacion[2]'";
	$rs1 = mysqli_query($conexion,$sql1) or die(mysql_error());
	$rs2 = mysqli_query($conexion,$sql2) or die(mysql_error());
	$rs3 = mysqli_query($conexion,$sql3) or die(mysql_error());
?>
<html lang="es">
	<head>
		<title>Hotel</title>
		<meta charset="UTF-8"> <!-- Codificacion correta de escritura -->
		<meta name="title" content="Hotel - Registro de Habitaciones"> <!-- Título(Para buscadores) -->
		<meta name="description" content="Descripción de la WEB">   <!-- Descripcion(Para buscadores) -->
		<link href="../css/styles.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<header>
			<nav class="topnav">
					<a href="precios.php"><h1  align="left"> Volver </h1> </a>
			</nav>
			<font size=5  align="center">
				<p>Los precios de las habitaciones se han cambiado correctamente.</p>
			</font>
		</header>
	</body>
</html>
