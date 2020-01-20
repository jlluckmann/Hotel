<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link href="../css/styles.css" rel="stylesheet">
	</head>
	<body>
	<header>
		<nav class="topnav">
				<a href="../inicio.html"><h1  align="left"> Volver </h1> </a>
		</nav>
	  <h1 align="center">Precios Habitaciones</h1>
	</header>
<div class="cuerpo_center2" align="center">
<table border = '1' style = "border-collapse: collapse;" bgcolor = '#33334d'>
	<tr bgcolor="#000033" style="font-weight: bold; color:white">
		<td>
			Tipo de Habitación
		</td>
		<td>
			Precio Habitación
		</td>
	</tr>
<?php
	require('conexion.php');
		$conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
		mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
		$sql = "SELECT *
						FROM tipodehabitacion";
		$rs = mysqli_query($conexion,$sql) or die(mysql_error());
		$numeroTuplas=mysqli_num_rows($rs);
		$numerocolumns=mysqli_num_fields($rs);

		for($i=0;$i<$numeroTuplas;$i++){
			$fila=mysqli_fetch_array($rs);
			echo "<tr>";
			#for($j=0;$j<$numerocolumns;$j++){
				echo "<td>$fila[0]</td>";
			#}
			echo "<td><form method=\"POST\" action=\"update_tipodehabitacion.php\">";
			echo "<input type=\"hidden\" name=\"Tipo_habitacion[]\" value=\"$fila[0]\" >";
			echo"<input type=\"text\" name=\"Precio[]\" size=\"15px\" title=\"Ingrese el precio\" value=\"$fila[1]\" required></td>";
			#echo "<td><input type=\"submit\" value=\"Cambiar precio\">";
			#echo "</form></td>";
			echo "</td>";
			echo "</tr>";
        }
?>
</table>
<br>
<input type="submit" value="Cambiar precios">
</form>
</div>
