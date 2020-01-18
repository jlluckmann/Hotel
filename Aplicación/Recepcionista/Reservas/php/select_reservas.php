<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link href="../../css/styles.css" rel="stylesheet">
	</head>
	<body>
	<header>
	<h1 align="center">Habitaciones Disponibles</h1>
	</header>
<div class="cuerpo_center2" align="center">
<table border = '1' style = "border-collapse: collapse;" bgcolor = '#33334d'>
	<tr bgcolor="#000033" style="font-weight: bold; color:white">
		<td>
			Tipo de Habitación
		</td>
		<td>
			Precio
		</td>
		<td>
			Cantidad
		</td>
	</tr>
<?php
	require('conexion.php');
		$fecha1 = $_GET['fecha1'];
		$fecha2 = $_GET['fecha2'];
		$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
		mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
		$sql = "SELECT habitacion.TipoHab, Precio,
		COUNT(DISTINCT habitacion.NumHab)
		FROM habitacion, tipodehabitacion
		WHERE habitacion.TipoHab=tipodehabitacion.TipoHab
		AND habitacion.NumHab NOT IN (SELECT habitacion.NumHab
                              		FROM   habitacion, reserva
                              		WHERE  reserva.NumHab=habitacion.NumHab
                              		AND (reserva.FechaReserva BETWEEN CAST('$fecha1' AS DATE) and CAST('$fecha2' AS DATE)
                                  		 OR reserva.FechaSalida BETWEEN CAST('$fecha1' AS DATE) and CAST('$fecha2' AS DATE)))
		GROUP BY habitacion.TipoHab";
		$rs = mysqli_query($conexion,$sql) or die(mysql_error());
		$numeroTuplas=mysqli_num_rows($rs);
		$numerocolumns=mysqli_num_fields($rs);

		for($i=0;$i<$numeroTuplas;$i++){
			$fila=mysqli_fetch_array($rs);
			echo "<tr>";
			for($j=0;$j<$numerocolumns;$j++){
				echo "<td>$fila[$j]</td>";
			}
			echo "<td><form method=\"get\" action=\"select_habitacion.php\">";
			echo "<input type=\"hidden\" name=\"Tipo_habitacion\" value=\"$fila[0]\" >";
			echo "<input type=\"hidden\" name=\"fecha1\" value=\"$fecha1\" >";
			echo "<input type=\"hidden\" name=\"fecha2\" value=\"$fecha2\" >";
			echo "<input type=\"submit\" value=\"Ver habitaciones\">";
			echo "</form></td>";
			echo "</tr>";
        }
?>
</table>
</div>
