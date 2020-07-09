<?php

include 'conexion.php';
$email= $_REQUEST['email'];
$password= $_REQUEST['password'];

$consulta = "select * from usuarios where email = '$email' and password = md5('$password')";
$resultado = $conexion -> query($consulta);



$row=mysqli_fetch_array($resultado);
 if(is_null($row)){	
    header("Location: ../login.php?error=noexistuser");
    exit();	
  
   }else{ 
    session_start();
    $_SESSION['id'] = $row['id'];
    $_SESSION['idGrupo'] = $row['tipoUsuario'];
   	header('location: ../index.php');
    exit();	
   }

$resultado -> close();
?> 