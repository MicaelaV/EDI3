<?php
  if (isset($_GET['del'])) {
    $IdProducto = $_GET['del'];
   }
$con = mysqli_connect("localhost","root","","aziza");

mysqli_set_charset($con,'utf8');
//echo "id".$IdProducto;
//exit();
$sql = "DELETE FROM productos WHERE idProducto = $IdProducto";
$r = mysqli_query($con, $sql);
mysqli_close($con);

header('location: ../eliminarProducto.php');
?>