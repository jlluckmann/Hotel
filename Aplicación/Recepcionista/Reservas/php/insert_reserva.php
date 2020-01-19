<?php
  require('conexion.php');
  if(!empty($_POST['Rut'])&&!empty($_POST['Nombre'])&&!empty($_POST['Apellidop'])&&!empty($_POST['Apellidom'])&&!empty($_POST['Telefono'])&&!empty($_POST['Correo']))
  {
    $Numero_habitacion = $_POST['habit'];
    $fecha1 = $_POST['fecha1'];
		$fecha2 = $_POST['fecha2'];
    $Nombre = $_POST['Nombre'];
    $Apellido_paterno = $_POST['Apellidop'];
    $Apellido_materno = $_POST['Apellidom'];
    $Rut_cliente = $_POST['Rut'];
    $Telefono = $_POST['Telefono'];
    $Correo = $_POST['Correo'];
    $N = count($Numero_habitacion);
    $conexion=mysqli_connect($host,$user,$pw)or die("Error al conectar con el servidor");
    mysqli_select_db($conexion,$db)or die("Error al conectar con la base de datos");
    echo "El Cliente ".$Nombre." ".$Apellido_paterno." ".$Apellido_materno." ha reservado las habitaciones ";
    for($i=0; $i < $N; $i++){
      $sql = "INSERT INTO reserva(RutCliente,NumHab,NombreCliente,ApPat,ApMat,Telefono,Correo,FechaReserva,FechaSalida)
              VALUES('$Rut_cliente','$Numero_habitacion[$i]','$Nombre','$Apellido_paterno','$Apellido_materno','$Telefono','$Correo','$fecha1','$fecha2')";
      mysqli_query($conexion,$sql );
      echo($Numero_habitacion[$i] . " ");
      }
  }
    else
    {
        echo "Debe completar todos campos.";
    }
?>
<br>
<a href="../menu.html">volver</a>
