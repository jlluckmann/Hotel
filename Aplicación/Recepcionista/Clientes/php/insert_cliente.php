<html lang="es">
	<head>
		<title>Hotel</title>
		<meta charset="UTF-8"> <!-- Codificacion correta de escritura -->
		<meta name="title" content="Hotel - Registro de Clientes"> <!-- Título(Para buscadores) -->
		<meta name="description" content="Descripción de la WEB">   <!-- Descripcion(Para buscadores) -->
		<link href="../../css/styles.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<header>
			<nav class="topnav">
					<a href="../menu.html"><h1  align="left"> Volver </h1> </a>
			</nav>
		</header>
	</body>
</html>


<?php
  require('conexion.php');
  if(!empty($_GET['Rut'])&&!empty($_GET['Nombre'])&&!empty($_GET['Apellidop'])&&!empty($_GET['Apellidom']))
  {
    $Rut_cliente = $_GET['Rut'];
    $Nombre = $_GET['Nombre'];
    $Apellido_paterno = $_GET['Apellidop'];
    $Apellido_materno = $_GET['Apellidom'];
    $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
    mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
    $sql = "INSERT INTO clienteregistrado (RutCliente,NombreCliente,ApPat,ApMat)
            VALUES('$Rut_cliente','$Nombre','$Apellido_paterno','$Apellido_materno')";
    mysqli_query($conexion,$sql );
    echo "<div class='awesomeText'><p>El Cliente ".$Nombre." ".$Apellido_paterno." ".$Apellido_materno." ha sido registrado correctamente.</p></div>  ";
    }
    else
    {
        echo "<div class='awesomeText'><p>Debe completar todos campos.</p></div>";
    }
?>
