<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link href="../css/styles.css" rel="stylesheet">
	</head>

	<body>
	<header>
		<nav class="topnav">
				<a href="../iniciar_sesion.php"><h1  align="left"> Volver </h1> </a>
		</nav>
	  <h1 align="center">Habitaciones Disponibles</h1>
	</header>

<div align="center">
<table border = '2' style = "border-collapse: collapse;" bgcolor = '#FFFFFF'>
	<tr bgcolor="#303030" style="font-weight: bold; color:white">
		<td>
			Tipo de Habitación
		</td>
		<td>
			Precio por día
		</td>
		<td>
			N° Habitaciones disponibles
		</td>
	</tr>
<?php
	require('conexion.php');
		$fecha1 = $_GET['fecha1'];
		$fecha2 = $_GET['fecha2'];
		$rut = $_GET['rut'];
		$nom = $_GET['nom'];
		$apellidop = $_GET['apellidop'];
		$apellidom = $_GET['apellidom'];
		$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
		mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
		$sql = "SELECT habitacion.TipoHab, Precio, COUNT(DISTINCT habitacion.NumHab)
		FROM habitacion, tipodehabitacion
		WHERE habitacion.TipoHab=tipodehabitacion.TipoHab
		AND habitacion.NumHab NOT IN (SELECT habitacion.NumHab
                              		FROM   habitacion, reserva
                              		WHERE  reserva.NumHab=habitacion.NumHab
                              		AND (reserva.FechaReserva BETWEEN CAST('$fecha1' AS DATE) and CAST('$fecha2' AS DATE)
                                  		 OR reserva.FechaSalida BETWEEN CAST('$fecha1' AS DATE) and CAST('$fecha2' AS DATE)
																		   OR reserva.FechaReserva<='$fecha1' AND reserva.FechaSalida>='$fecha2'))
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

        }
?>
</table>
</div>



<main>
			<?php
				echo "<form method=\"post\" action=\"registrar_reserva.php\">"
			?>

			<div id=contenedor_center>
				<div class="contorno_pantalla_blanca" align="center">
					<br>
						<h1 align="center">Doble</h1>
						<?php
							  require('conexion.php');
								$Tipo_habitacion = 'doble';
								$fecha1 = $_GET['fecha1'];
								$fecha2 = $_GET['fecha2'];
								$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
								mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
								$sql1 = "SELECT habitacion.NumHab
								FROM habitacion
								WHERE TipoHab='$Tipo_habitacion'
								AND habitacion.NumHab NOT IN (SELECT habitacion.NumHab
						                              		FROM   habitacion, reserva
						                              		WHERE  reserva.NumHab=habitacion.NumHab
						                              		AND (reserva.FechaReserva BETWEEN CAST('$fecha1' AS DATE) and CAST('$fecha2' AS DATE)
						                                  		 OR reserva.FechaSalida BETWEEN CAST('$fecha1' AS DATE) and CAST('$fecha2' AS DATE)
																								 	 OR reserva.FechaReserva<='$fecha1' AND reserva.FechaSalida>='$fecha2'))";
								$rs1 = mysqli_query($conexion,$sql1) or die(mysql_error());
								$numeroTuplas=mysqli_num_rows($rs1);
								$numerocolumns=mysqli_num_fields($rs1);

								echo "<form method=\"post\" action=\"registrar_reserva.php\">";
								for($i=0;$i<$numeroTuplas;$i++){
										$fila=mysqli_fetch_array($rs1);
										echo "<input type=\"checkbox\" name=\"habit[]\" value=\"$fila[0]\" >$fila[0]<br>";
										}
										echo "<br>";
						?>
						</div>
					</br>


					<div class="contorno_pantalla_blanca" align="center">
						<br>
							<h1 align="center">Matrimonial</h1>
							<?php
								  require('conexion.php');
									$Tipo_habitacion = 'matrimonial';
									$fecha1 = $_GET['fecha1'];
									$fecha2 = $_GET['fecha2'];
									$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
									mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
									$sql2 = "SELECT habitacion.NumHab
									FROM habitacion
									WHERE TipoHab='$Tipo_habitacion'
									AND habitacion.NumHab NOT IN (SELECT habitacion.NumHab
							                              		FROM   habitacion, reserva
							                              		WHERE  reserva.NumHab=habitacion.NumHab
							                              		AND (reserva.FechaReserva BETWEEN CAST('$fecha1' AS DATE) and CAST('$fecha2' AS DATE)
							                                  		 OR reserva.FechaSalida BETWEEN CAST('$fecha1' AS DATE) and CAST('$fecha2' AS DATE)
																									 	 OR reserva.FechaReserva<='$fecha1' AND reserva.FechaSalida>='$fecha2'))";
									$rs2 = mysqli_query($conexion,$sql2) or die(mysql_error());
									$numeroTuplas=mysqli_num_rows($rs2);
									$numerocolumns=mysqli_num_fields($rs2);

									echo "<form method=\"post\" action=\"registrar_reserva.php\">";
									for($i=0;$i<$numeroTuplas;$i++){
											$fila=mysqli_fetch_array($rs2);
											echo "<input type=\"checkbox\" name=\"habit[]\" value=\"$fila[0]\" >$fila[0]<br>";
											}
											echo "<br>";
							?>
							</div>
						</br>

						<div class="contorno_pantalla_blanca" align="center">
							<br>
								<h1 align="center">Simple</h1>
								<?php
									  require('conexion.php');
										$Tipo_habitacion = 'simple';
										$fecha1 = $_GET['fecha1'];
										$fecha2 = $_GET['fecha2'];
										$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
										mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
										$sql3 = "SELECT habitacion.NumHab
										FROM habitacion
										WHERE TipoHab='$Tipo_habitacion'
										AND habitacion.NumHab NOT IN (SELECT habitacion.NumHab
								                              		FROM   habitacion, reserva
								                              		WHERE  reserva.NumHab=habitacion.NumHab
								                              		AND (reserva.FechaReserva BETWEEN CAST('$fecha1' AS DATE) and CAST('$fecha2' AS DATE)
								                                  		 OR reserva.FechaSalida BETWEEN CAST('$fecha1' AS DATE) and CAST('$fecha2' AS DATE)
																										 	 OR reserva.FechaReserva<='$fecha1' AND reserva.FechaSalida>='$fecha2'))";
										$rs3 = mysqli_query($conexion,$sql3) or die(mysql_error());
										$numeroTuplas=mysqli_num_rows($rs3);
										$numerocolumns=mysqli_num_fields($rs3);

										echo "<form method=\"post\" action=\"registrar_reserva.php\">";
										for($i=0;$i<$numeroTuplas;$i++){
												$fila=mysqli_fetch_array($rs3);
												echo "<input type=\"checkbox\" name=\"habit[]\" value=\"$fila[0]\" >$fila[0]<br>";
												}
												echo "<br>";
								?>
								</div>
							</br>
						</div>

						<div align="center">
							<?php
							echo "<input type=\"hidden\" name=\"fecha1\" value=\"$fecha1\" >";
							echo "<input type=\"hidden\" name=\"fecha2\" value=\"$fecha2\" >";
							echo "<input type=\"hidden\" name=\"rut\" value=\"$rut\" >";
	            echo "<input type=\"hidden\" name=\"nom\" value=\"$nom\" >";
	            echo "<input type=\"hidden\" name=\"apellidop\" value=\"$apellidop\" >";
							echo "<input type=\"hidden\" name=\"apellidom\" value=\"$apellidom\" >";
							echo "<br>";
							echo "<input type=\"submit\" name=\"formSubmit\" value=\"Reservar\">";
							echo "</form>";
							?>
						</div>

		</main>
	</body>

</html>
