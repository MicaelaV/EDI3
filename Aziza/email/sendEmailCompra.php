<?php
//Habilitar en gmail el "Acceso de aplicaciones poco seguras"
//	https://myaccount.google.com/lesssecureapps

// seteo el timezone correcto


date_default_timezone_set('America/Argentina/Buenos_Aires');

//incluyo la libreria
require 'lib/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "azizabijouterie@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "atrefuiio.15547";

//Set who the message is to be sent from
$mail->setFrom('azizabijouterie@gmail.com', utf8_decode('Aziza'));

//Set an alternative reply-to address
#$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress($_POST['emailCompra']);

//Set the subject line
$mail->Subject = utf8_decode('Gracias por compra en Aziza bijouterie');

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->MsgHTML(utf8_decode("Estás recibiendo este mail porque comenzaste una compra en Aziza Bijouterie.
	 <br>Te enviaremos tu pedido, una vez que recibamos la confirmación del pago, para ello te dejamos nuestros datos bancarios:
	   <br><br>CBU: XXXXXXXXX
	   <br>Nombre Titular: Micaela Ibarra
	   <br>Alias: ALIAS.COMPRA.AZIZA
	   <br><br>Respondé este mail, una vez hecho el deposito.
	   <br>Te dejamos el detalle de la compra para que puedas descargarlo"));

//Replace the plain text body with one created manually
$mail->AltBody = 'Este es un cuerpo de mensaje de texto sin formato';
$mail->AddStringAttachment($archivoPdf,'detalleOrdenAziza.pdf','base64');
//Attach an image file 
#$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors

if(!$mail->send()){
	echo"no";
}else{
	echo "enviado";
} 

?>
