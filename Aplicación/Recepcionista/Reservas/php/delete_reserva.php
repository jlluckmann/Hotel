<?php
	require('conexion.php');
	$rut = $_GET['rut'];
	$Numero_habitacion = $_GET['Numero_habitacion'];
	$fecha1 = $_GET['fecha1'];
	$fecha2 = $_GET['fecha2'];
	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
	$sql = "Delete
			From reserva
			Where RutCliente='$rut' AND NumHab='$Numero_habitacion' AND FechaReserva='$fecha1' AND FechaSalida='$fecha2'";
	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
?>
<html lang="es">
	<head>
		<title>Hotel</title>
		<meta charset="UTF-8"> <!-- Codificacion correta de escritura -->
		<meta name="title" content="Hotel - Registro de Reservas"> <!-- Título(Para buscadores) -->
		<meta name="description" content="Descripción de la WEB">   <!-- Descripcion(Para buscadores) -->
		<link href="../../css/styles.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<p>El registro se ha eliminado correctamente</p> <a href="../menu.html">volver</a>
	</body>
</html>
