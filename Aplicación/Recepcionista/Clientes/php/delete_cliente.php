<?php
	require('conexion.php');
	$rut = $_GET['rut'];
	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
	$sql = "Delete
			From clienteregistrado
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
		<header>
			<nav class="topnav">
					<a href="../menu.html"><h1  align="left"> Volver </h1> </a>
			</nav>
			<font size=5  align="center">
				<p>El registro se ha eliminado correctamente.</p>
			</font>
		</header>
	</body>

</html>
