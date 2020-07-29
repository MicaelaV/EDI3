<?php
	if (isset($_POST['recpwdbuttom'])) {
		
		$token = bin2hex(random_bytes(32));

		$url = "http://localhost/Aziza/createnewpwd.php?valida=".$token;
		$caduca = date("U") + 3600; //Caduca en una hora

		require '../php/conexion.php';

		$mailUser = $_POST['address'];
		$sql = "SELECT email FROM usuarios WHERE email = '$mailUser'";
		$r=mysqli_query($conexion, $sql);
		$row = mysqli_fetch_array ($r,MYSQLI_ASSOC);

		if ($row==0){
			header("Location: ../recuperarpwd.php?error=emailinexistente");

		}else{

			$sql = "DELETE FROM resetpwd WHERE pwdResetMail = '$mailUser'";
			mysqli_query($conexion, $sql);


			$sql ="INSERT INTO resetpwd(pwdResetMail, pwdResetToken, pwdResetExpires) VALUES ('$mailUser','$token','$caduca')";

			mysqli_query($conexion, $sql);		
			mysqli_close($conexion);//cierra conexion

			//Crear el correo electrónico de recuperación de contraseña

			date_default_timezone_set('America/Argentina/Buenos_Aires');

			require 'lib/PHPMailerAutoload.php';

			$mail = new PHPMailer;

			$mail->isSMTP();

			$mail->SMTPDebug = 0;

			$mail->Debugoutput = 'html';

			$mail->Host = 'smtp.gmail.com';

			$mail->Port = 587;

			$mail->SMTPSecure = 'tls';

			$mail->SMTPAuth = true;

			$mail->Username = "@.com";

			$mail->Password = ".";

			$mail->setFrom('@.com', utf8_decode('Aziza'));

			$mail->addAddress($mailUser);

			$mail->Subject = utf8_decode('Recuperar contraseña');

			$mail->MsgHTML(utf8_decode('<p>Hemos recibido una solicitud de restablecimiento de contrase&ntilde;a de tu cuenta. '.$url.'</p>'));

			//Replace the plain text body with one created manually
			$mail->AltBody = 'Este es un cuerpo de mensaje de texto sin formato';

			//send the message, check for errors
			$enviado=1;

			if(!$mail->send()){
				header("Location: ../recuperarpwd.php?error=notsend");
			}else{
				header("Location: ../recuperarpwd.php?send=successsend");

			}
	    }		
	}
	else {
		//Si el usuario accedio sin hacer click en el buttom nuevaCuenta
		header("Location: ../recuperarpwd.php?error=notsend1");
		exit();
	}	
?>