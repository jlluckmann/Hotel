<?php
	require('conexion.php');
	$rut = $_GET['rut'];
	$nombre = $_GET['nombre'];
	$apellido_p = $_GET['apellido_p'];
	$apellido_m = $_GET['apellido_m'];

	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
	$sql = "Update clienteregistrado
			Set NombreCliente='$nombre', ApPat='$apellido_p', ApMat='$apellido_m'
			Where RutCliente='$rut'";
	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
?>
<html lang="es">
	<head>
		<title>Hotel</title>
		<meta charset="UTF-8"> <!-- Codificacion correta de escritura -->
		<meta name="title" content="Hotel - Registro de Clientes"> <!-- Título(Para buscadores) -->
		<meta name="description" content="Descripción de la WEB">   <!-- Descripcion(Para buscadores) -->
		<link href="../../css/styles.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<p>Los datos del cliente se han actualizado correctamente</p> <a href="../menu.html">volver</a>
	</body>
</html>
