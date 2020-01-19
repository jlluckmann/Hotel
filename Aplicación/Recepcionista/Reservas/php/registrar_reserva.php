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
		<?php
		  require('conexion.php');
		  if(!empty($_POST['habit']))
		  {
		    $Numero_habitacion = $_POST['habit'];
		    $fecha1 = $_POST['fecha1'];
				$fecha2 = $_POST['fecha2'];
				$N = count($Numero_habitacion);
				echo "<form method=\"post\" action=\"insert_reserva.php\">";
				for($i=0; $i < $N; $i++){
		      echo "<input type=\"hidden\" name=\"habit[]\" value=\"$Numero_habitacion[$i]\" >";
		      }
				echo "<input type=\"hidden\" name=\"fecha1\" value=\"$fecha1\" >";
				echo "<input type=\"hidden\" name=\"fecha2\" value=\"$fecha2\" >";
				echo "<h1 align=\"center\">Ingresar:</h1>";
        echo "<h2> Datos del Cliente </h2>";
        echo "<input type=\"text\"  name=\"Nombre\" placeholder=\"Nombre\" />&nbsp";
        echo "<input type=\"text\" name=\"Apellidop\" placeholder=\"Apellido Paterno\" />&nbsp";
        echo "<input type=\"text\" name=\"Apellidom\" placeholder=\"Apellido Materno\" />";
 			 	echo "<br><br>";
        echo "<input type=\"text\" name=\"Rut\" placeholder=\"Rut\" />&nbsp";
 			  echo "<input type=\"text\" name=\"Telefono\" placeholder=\"Telefono\" />&nbsp";
 			  echo "<input type=\"text\" name=\"Correo\" placeholder=\"Correo\" />";
        echo "<br><br>";
        echo "<input type=\"submit\" value= \"Enviar\"/>";
				echo "</form>";
		  }
		  else
		  {
		    echo "No se seleccionó ninguna habitación.";
		  }
		?>
  </body>
</html>
