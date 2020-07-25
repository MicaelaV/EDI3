<?php
  if (isset($_GET['del'])) {
    $IdProducto = $_GET['del'];
   }
include "conexion.php";


$sql = "UPDATE productos SET habilitado=0 WHERE idProducto = $IdProducto";
$r = mysqli_query($conexion, $sql);
mysqli_close($conexion);

header('location: ../eliminarProducto.php');
?>