<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link href="../../css/styles.css" rel="stylesheet">
	</head>
	<body>
	<header>
	<h1 align="center">Listado de Habitaciones Disponibles</h1>
	</header>
<div class="cuerpo_center2" align="center">
<?php
	  require('conexion.php');
		$Tipo_habitacion = $_GET['Tipo_habitacion'];
		$fecha1 = $_GET['fecha1'];
		$fecha2 = $_GET['fecha2'];
		$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
		mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
		$sql = "SELECT habitacion.NumHab
		FROM habitacion
		WHERE TipoHab='$Tipo_habitacion'
		AND habitacion.NumHab NOT IN (SELECT habitacion.NumHab
                              		FROM   habitacion, reserva
                              		WHERE  reserva.NumHab=habitacion.NumHab
                              		AND (reserva.FechaReserva BETWEEN CAST('$fecha1' AS DATE) and CAST('$fecha2' AS DATE)
                                  		 OR reserva.FechaSalida BETWEEN CAST('$fecha1' AS DATE) and CAST('$fecha2' AS DATE)
																		 	 OR reserva.FechaReserva<='$fecha1' AND reserva.FechaSalida>='$fecha2'))";
		$rs = mysqli_query($conexion,$sql) or die(mysql_error());
		$numeroTuplas=mysqli_num_rows($rs);
		$numerocolumns=mysqli_num_fields($rs);

		echo "<form method=\"post\" action=\"registrar_reserva.php\">";
		for($i=0;$i<$numeroTuplas;$i++){
				$fila=mysqli_fetch_array($rs);
				echo "<input type=\"checkbox\" name=\"habit[]\" value=\"$fila[0]\" >$fila[0]<br>";
				}
		echo "<input type=\"hidden\" name=\"fecha1\" value=\"$fecha1\" >";
		echo "<input type=\"hidden\" name=\"fecha2\" value=\"$fecha2\" >";
		echo "<br>";
		echo "<input type=\"submit\" name=\"formSubmit\" value=\"Reservar\">";
		echo "</form>";
?>
</div>
