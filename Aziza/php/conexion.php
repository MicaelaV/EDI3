 <?php

$hostname = 'localhost';
$database = 'aziza';
$usernameDb = 'root';
$passwordDb = '';

$conexion = new mysqli($hostname,$usernameDb,$passwordDb,$database); 
mysqli_set_charset($conexion,'utf8');

if ($conexion->connect_errno){
 echo "Lo sentimos hay un problema";
 die("Fallo Conexion: ".mysqli_connect_error());
}
?>