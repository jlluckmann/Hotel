<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link href="../../css/styles.css" rel="stylesheet">
	</head>
	<body>
	<header>
		<nav class="topnav">
				<a href="cancelar_reserva.php"><h1  align="left"> Volver </h1> </a>
		</nav>
	<h1 align="center">Lista de Reservas</h1>
	<h2 align="center">Cliente
	<?php
		require('conexion.php');
			$Rut = $_GET['Rut'];
			$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
			mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
			$sql = "SELECT DISTINCT NombreCliente, ApPat, ApMat
							FROM reserva
							WHERE RutCliente='$Rut'";
			$rs = mysqli_query($conexion,$sql) or die(mysql_error());
			$numerocolumns=mysqli_num_fields($rs);
			$fila=mysqli_fetch_array($rs);
			for($j=0;$j<$numerocolumns;$j++){
					echo "$fila[$j] ";
				}
	?></h2>
	</header>
<div align="center">
<table border = '2' style = "border-collapse: collapse;" bgcolor = '#FFFFFF'>
	<tr bgcolor="#303030" style="font-weight: bold; color:white">
		<td>
			Número de Habitación
		</td>
		<td>
			Fecha Inicio
		</td>
		<td>
			Fecha Final
		</td>
		<td >

		</td>
	</tr>
<?php
	require('conexion.php');
		$Rut = $_GET['Rut'];
		$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
		mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
		$date = date("Y-m-d");
		$sql = "SELECT NumHab, FechaReserva, FechaSalida
						FROM reserva
						WHERE RutCliente='$Rut' AND FechaReserva>='$date'";
		$rs = mysqli_query($conexion,$sql) or die(mysql_error());
		$numeroTuplas=mysqli_num_rows($rs);
		$numerocolumns=mysqli_num_fields($rs);

		for($i=0;$i<$numeroTuplas;$i++){
			$fila=mysqli_fetch_array($rs);
			echo "<tr>";
			for($j=0;$j<$numerocolumns;$j++){
				echo "<td>$fila[$j]</td>";
			}
			echo "<td><form method=\"get\" action=\"confirmacion_eliminar_reserva.php\">";
			echo "<input type=\"hidden\" name=\"Rut\" value=\"$Rut\" >";
			echo "<input type=\"hidden\" name=\"Numero_habitacion\" value=\"$fila[0]\" >";
			echo "<input type=\"hidden\" name=\"fecha1\" value=\"$fila[1]\" >";
			echo "<input type=\"hidden\" name=\"fecha2\" value=\"$fila[2]\" >";
			echo "<input type=\"submit\" value=\"Cancelar reserva\">";
			echo "</form></td>";
			echo "</tr>";
        }
?>
</table>
</div>
