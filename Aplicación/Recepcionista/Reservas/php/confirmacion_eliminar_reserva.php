<?php
	require('conexion.php');
	$rut = $_GET['Rut'];
	$Numero_habitacion = $_GET['Numero_habitacion'];
	$fecha1 = $_GET['fecha1'];
	$fecha2 = $_GET['fecha2'];
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
		<p>Estás seguro que deseas cancelar la reserva del cliente de rut: <?php echo"$rut"?> ?</p>
		<br>
		<?php 	echo"<form method=\"get\" action=\"delete_reserva.php\">";
				echo"<input type=\"hidden\" name=\"rut\" value=\"$rut\" >";
				echo "<input type=\"hidden\" name=\"Numero_habitacion\" value=\"$Numero_habitacion\" >";
				echo "<input type=\"hidden\" name=\"fecha1\" value=\"$fecha1\" >";
				echo "<input type=\"hidden\" name=\"fecha2\" value=\"$fecha2\" >";
				echo"<td><input type=\"submit\" value=\"Sí, Eliminar\"></td>";
				echo"</form> ";
				echo"<form method=\"get\" action=\"../menu.html\">";
				echo"<td><input type=\"submit\" value=\"NO\"></td>";
				echo"</form> ";
		?>
	</body>
</html>
