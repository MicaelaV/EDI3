<?php
	include 'php/conexion.php';

	$idProducto= $_SESSION['idProducto'];
 	$con = mysqli_connect("localhost","root","","aziza");
	$sql = "select * from productos p INNER JOIN tipoproductos tp on tp.idTipo = p.idTipo where tp.idTipo='$idProducto'";


$r = mysqli_query($con, $sql);

mysqli_close($con);

$row = mysqli_fetch_array ($r,MYSQLI_ASSOC);
$nombreP=$row['descripcion'];
$precio=$row['precio'];
$img = $row['img'];

echo "<img width='450' border='0' src='data:image/jpg;base64,".$img."'>";

echo $nombreP.$precio;


?> 