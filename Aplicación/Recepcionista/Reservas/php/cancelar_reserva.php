<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Info-registro: Licanray</title>
		<meta charset="UTF-8">
		<meta name="title" content="Título de la WEB">
		<meta name="description" content="Descripción de la WEB">
		<link href="../../css/styles.css" rel="stylesheet">
	</head>
  <body>

		<header>
			<nav class="topnav">
					<a href="../menu.html"><h1  align="left"> Volver </h1> </a>
			</nav>
		</header>
  <form action="lista_reservas_cancelar.php" method="get">
       <h1 align="center">Buscador:</h1>
       <h2> Reservas </h2>

	 <div style="color: white">Rut cliente <select name="Rut">
	 <option><?php
		 require('conexion.php');

			 $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
			 mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");

			 $date = date("Y-m-d");

			 $sql = "SELECT DISTINCT RutCliente
			 				 FROM reserva
							 WHERE FechaReserva>='$date'
							 ORDER BY RutCliente";

			 $rs = mysqli_query($conexion,$sql) or die(mysql_error());

			 $numeroTuplas2=mysqli_num_rows($rs);
			 $numerocolumns2=mysqli_num_fields($rs);

			 for($i=0;$i<$numeroTuplas2;$i++)
			 {
					$fila=mysqli_fetch_array($rs);
					echo "<option value=\"$fila[0]\">$fila[0]</option>";
							 }

	 ?></option>
 		</select>
    <input type="submit" value= "Enviar"/>
    </form></div>
  </body>
</html>
