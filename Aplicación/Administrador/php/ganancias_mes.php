<?php
	require('conexion.php');
	$Mes = $_GET['Mes'];
	$array = array(0 => 'Meses', 1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre',
								 10 => 'Octubre', 11 => 'Nobiembre', 12 => 'Diciembre');
  $clave = array_search($Mes, $array);
	$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
	mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
	$sql = "SELECT SUM((DATEDIFF(FechaSalida,FechaReserva)+1)*Precio)
					FROM reserva, habitacion, tipodehabitacion
					WHERE reserva.NumHab=habitacion.NumHab
					AND habitacion.TipoHab=tipodehabitacion.TipoHab
					AND MONTH(FechaReserva)='$clave'";
	$rs = mysqli_query($conexion,$sql) or die(mysql_error());
	$fila=mysqli_fetch_array($rs);
?>
<html lang="es">
	<head>
		<title>Hotel</title>
		<meta charset="UTF-8"> <!-- Codificacion correta de escritura -->
		<meta name="title" content="Hotel - Registro de Habitaciones"> <!-- Título(Para buscadores) -->
		<meta name="description" content="Descripción de la WEB">   <!-- Descripcion(Para buscadores) -->
		<link href="../css/styles.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<header>
			<nav class="topnav">
					<a href="../ganancias.html"><h1  align="left"> Volver </h1> </a>
			</nav>
			<font size=5  align="center">
				<p>Las ganancias del mes de <?php echo "$Mes" ?> son $
					<?php if(!empty($fila[0]))
					 			{
									echo "$fila[0]";
								}
								else
								{
									echo "0";
								}
								 ?>.</p>
			</font>
		</header>
	</body>
</html>
