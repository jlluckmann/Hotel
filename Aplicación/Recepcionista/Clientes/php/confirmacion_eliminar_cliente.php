<?php
	require('conexion.php');
	$rut = $_GET['Rut'];
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
		<font size=5  align="left">
			<p>Estás seguro que deseas eliminar el registro del alumno de rut: <?php echo"$rut"?> ?</p>
		</font>
		<br>
		<?php 	echo"<form method=\"get\" action=\"delete_cliente.php\">";
				echo"<input type=\"hidden\" name=\"rut\" value=\"$rut\" >";
				echo"<td><input type=\"submit\" value=\"Sí, Eliminar\"></td>";
				echo"</form> ";
				echo"<form method=\"get\" action=\"../menu.html\">";
				echo"<td><input type=\"submit\" value=\"NO\"></td>";
				echo"</form> ";
		?>
	</body>
</html>
