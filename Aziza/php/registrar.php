<?php

	//REQUEST recupera todo
	$nombre=$_REQUEST['nameR'];
    $apellido=$_REQUEST['surnameR'];
    $tel=$_REQUEST['telphoneR'];
    $email=$_REQUEST['emailR'];
    $password=$_REQUEST['passwordR'];

	$cant=0;
	include "conexion.php";
	$sql ="select * from usuarios where (email='$email')";
	$result=mysqli_query($conexion, $sql);
	$cant=mysqli_num_rows($result);


	if ($cant==0){
        mysqli_query($conexion, "insert into usuarios (nombre, apellido, email, password,telefono,tipoUsuario) 
                            values ('$nombre','$apellido','$email',md5('$password'),'$tel',2)");
        

        $sqlUser ="select * from usuarios where (email='$email')";
        $DatosUser = mysqli_query($conexion, $sqlUser);
		$row = mysqli_fetch_array($DatosUser,MYSQLI_ASSOC);
        session_start();

	    $_SESSION['id'] = $row['id'];
	    $_SESSION['idGrupo'] = $row['tipoUsuario'];


	   	header("location: ../index.php?registro=exito");
	    exit();	

	}else {
		header("Location: ../login.php?error=userexiste");
	}

	mysqli_close($conexion);

?>
