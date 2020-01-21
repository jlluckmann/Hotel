<?php
	session_start();
	if(isset($_SESSION['usuario'])){
		$rut=$_SESSION['usuario'];
		$nom=$_SESSION['nomb'];
		$apellidop=$_SESSION['apellidop'];
    $apellidom=$_SESSION['apellidom'];
		//header('Location: iniciar.php');
	}
	else{
		header('Location: iniciar_sesion.php');
	}
?>

<!doctype html>
<html>

  <head>
     <meta charset="utf-8"/>
     <meta name="description" content="Ejemplo">
     <title>Info-registro: Hotel</title>
     <link rel="stylesheet" href="css/styles.css" type="text/css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="js/jquery-3.4.1.min.js"></script>
 		 <script src="js/index.js"></script>
  </head>

  <body>
    <header>
      <nav class="topnav">
				<div class="salir" ><a href="php/logout.php"><h1>Cerrar Sesión</h1></a></div>
      </nav>
			<h1 align="center">Sistema de Info-registro</h1>
			<h2 align="center">Reservas</h2>
      <h3 align="center"><?php echo" $nom $apellidop $apellidom";?></h3>
		</header>
    <main>
      <div class="cuerpo_center2" align="center">
          <label>Búsqueda habitaciones</label>
          <br>
          <br>
          <div>
            <form action="php/select_reservas.php">
            <?php echo "<input type=\"hidden\" name=\"rut\" value=\"$rut\" >";
            echo "<input type=\"hidden\" name=\"nom\" value=\"$nom\" >";
            echo "<input type=\"hidden\" name=\"apellidop\" value=\"$apellidop\" >";
            echo "<input type=\"hidden\" name=\"apellidom\" value=\"$apellidom\" >";?>
            Fecha inicio:<br>
            <input type="date" name="fecha1">
            <br><br>
            Fecha final:<br>
            <input type="date" name="fecha2">
            <br><br>
            <input type="submit" value="Buscar">
            </form>
      </div>
    </main>
  </body>

</html>
