<?php

	//REQUEST recupera todo
	$nombre=$_REQUEST['nameR'];
    $apellido=$_REQUEST['surnameR'];
    $tel=$_REQUEST['telphoneR'];
    $email=$_REQUEST['emailR'];
    $password=$_REQUEST['passwordR'];

	$cant=0;
	$con = mysqli_connect("localhost","root","","aziza");
	$sql ="select * from usuarios where (email='$email')";
	$result=mysqli_query($con, $sql);
	$cant=mysqli_num_rows($result);


	if ($cant==0){
        mysqli_query($con, "insert into usuarios (nombre, apellido, email, password,telefono,tipoUsuario) 
                            values ('$nombre','$apellido','$email',md5('$password'),'$tel',2)");
        session_start();
        $_SESSION['id'] = $consulta['id'];
        echo '<script>
	           alert("Se registró correctamente");
	           window.location="../index.php";
              </script>';

	}else {
		echo '<script>
	           alert("Ya se encuentra registrado");
	           window.history.go(-1);
             </script>';
	}

	mysqli_close($con);


	
?>