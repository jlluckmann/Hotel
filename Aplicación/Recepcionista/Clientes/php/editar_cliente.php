<?php
	require('conexion.php');
	$Rut = $_GET['Rut'];
	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
	$sql = "SELECT *
			From clienteregistrado
			Where RutCliente='$Rut'";
	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
	$numerocolumns=mysqli_num_fields($rs);
	$fila=mysqli_fetch_array($rs);
?>


<html lang="es">
	<head>
		<title>Hotel</title>
		<meta charset="UTF-8"> <!-- Codificacion correta de escritura -->
		<meta name="title" content="Título de la WEB"> <!-- Título(Para buscadores) -->
		<meta name="description" content="Descripción de la WEB">   <!-- Descripcion(Para buscadores) -->
		<link href="../../css/styles.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<header>
				<nav class="topnav">
						<a href="../menu.html"><h1  align="left"> Volver </h1> </a>
				</nav>
				<h1>Editar Cliente</h1><br>
		</header>
				<form method="get" action="update_cliente.php">
					<section id="contenedor_center">
						<div>

							<h3> Datos Personales </h3>
							<font size=4  align="center"><h>Rut</h></font>
							<br>
							<?php echo"<input type=\"text\" name=\"rut\" size=\"20px\" title=\"Ingrese su rut\" value=\"$fila[0]\" readonly>"?> <!--readonly hace que este campo no sea momdificable-->
							<br>
							<br>
							<font size=4  align="center"><h>Nombres</h></font>
							<br>
							<?php echo"<input type=\"text\" name=\"nombre\" size=\"20px\" title=\"Ingrese ambos nombres del alumno\" value=\"$fila[1]\" required>" ?> <!--requiered hace que este campo deba ser completado-->
							<br>
							<br>
							<font size=4  align="center"><h>Apellido Paterno</h></font>
							<br>
							<?php echo"<input type=\"text\" name=\"apellido_p\" size=\"20px\" title=\"Ingrese apellido paterno\" value=\"$fila[2]\" required>" ?>
							<br>
							<br>
							<font size=4  align="center"><h>Apellido materno</h></font>
							<br>
							<?php echo"<input type=\"text\" name=\"apellido_m\" size=\"20px\" title=\"Ingrese apellido materno\" value=\"$fila[3]\" required>" ?>
							<br>
						</div>
				</section>
				<br>
				<br>
				<input type="submit" value="Guardar">
				</form>
	</body>
</html>
