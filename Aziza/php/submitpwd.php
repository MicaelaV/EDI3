<?php
	if (isset($_POST['modPwdButton'])) {
		$valida = $_POST['valida'];
		$pwd = $_POST['password'];
		$pwdRepeat = $_POST['passwordRepeat'];
		$dateNow = date("U");
		// $tokenBin = hex2bin($valida);
		if ($pwd != $pwdRepeat) {
			header("Location: ../createnewpwd.php?error=passwordcheck&valida=".$valida);
			exit();
		}


		require 'conexion.php';

		$sql = "SELECT * FROM resetpwd WHERE pwdResetToken = '$valida' AND pwdResetExpires >= '$dateNow';";

		$resultado = $conexion -> query($sql);
		$row = mysqli_fetch_array($resultado);

		if (is_null($row)) {
			header("Location: ../createnewpwd.php?error=timeout&valida=".$valida);
			exit();
		} 
		else {
			$tokenEmail = $row["pwdResetMail"];
			$newPassword = md5($pwd);

			$sqlU ="UPDATE usuarios SET password = '$newPassword' WHERE email = '$tokenEmail';";
			mysqli_query($conexion, $sqlU);

			$sqlD ="DELETE FROM resetpwd WHERE pwdResetMail = '$tokenEmail';";
			mysqli_query($conexion, $sqlD);
			header("Location: ../recuperarpwd.php?send=successmod");
			exit();				
		} 															
		
	mysqli_close($conexion);		
	}
	else{
		header("Location: ../index.php?error");
		exit();		
	}
?>