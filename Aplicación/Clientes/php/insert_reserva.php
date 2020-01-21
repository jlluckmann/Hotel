<html>
<head>
  <title>Info-registro: Licanray</title>
  <meta charset="UTF-8">
  <meta name="title" content="Título de la WEB">
  <meta name="description" content="Descripción de la WEB">
  <link href="../css/styles.css" rel="stylesheet">
</head>

<body>
  <header>
    <nav class="topnav">
        <a href="../iniciar_sesion.php"><h1  align="left"> Volver </h1> </a>
    </nav>
  </header>
<?php
  require('conexion.php');
  if(!empty($_POST['rut'])&&!empty($_POST['nom'])&&!empty($_POST['apellidop'])&&!empty($_POST['apellidom'])&&!empty($_POST['Telefono'])&&!empty($_POST['Correo']))
  {
    $Numero_habitacion = $_POST['habit'];
    $fecha1 = $_POST['fecha1'];
		$fecha2 = $_POST['fecha2'];
    $rut = $_POST['rut'];
    $nom = $_POST['nom'];
    $apellidop = $_POST['apellidop'];
    $apellidom = $_POST['apellidom'];
    $Telefono = $_POST['Telefono'];
    $Correo = $_POST['Correo'];
    $N = count($Numero_habitacion);
    $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
    mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
    echo "<div class='awesomeText'><p> El Cliente ".$nom." ".$apellidop." ".$apellidom."  ha reservado las habitaciones ";
    for($i=0; $i < $N; $i++){
      $sql = "INSERT INTO reserva(RutCliente,NumHab,NombreCliente,ApPat,ApMat,Telefono,Correo,FechaReserva,FechaSalida)
              VALUES('$rut','$Numero_habitacion[$i]','$nom','$apellidop','$apellidom','$Telefono','$Correo','$fecha1','$fecha2')";
      mysqli_query($conexion,$sql );
      echo($Numero_habitacion[$i] . " ");
      }
      echo " </p></div>";
  }
    else
    {
        echo "<div class='awesomeText'><p>Debe completar todos campos.</p></div>";
    }
?>

</body
</html>
