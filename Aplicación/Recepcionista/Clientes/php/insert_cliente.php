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
    echo "El Cliente ".$Nombre." ".$Apellido_paterno." ".$Apellido_materno." ha sido registrado correctamente.";
    }
    else
    {
        echo "Debe completar todos campos.";
    }
?>
<br>
<a href="../menu.html">volver</a>
