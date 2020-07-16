<?php
	session_start();
	$sMenu = 'plantilla/headerLogin.php';
	if(isset($_SESSION['id'])){
		$idGrupo = $_SESSION['idGrupo'];
		$sMenu = 'plantilla/headerClose.php';
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Iniciar sesión</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
		<!-- Fuente -->
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
		<!-- Required meta tags -->   
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!--Libreria icons-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 	

	</head>

	<body class="bodystyle">

		<?php include $sMenu ?>

		<?php include 'plantilla/menu.php'?>
		<br>

		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-7">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3281.3921847278402!2d-58.36509968452513!3d-34.67005008044243!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a333493cfe99d1%3A0x34462e140becf4b3!2sInstituto+Tecnol%C3%B3gico+Beltr%C3%A1n!5e0!3m2!1ses!2sar!4v1562197539610!5m2!1ses!2sar" width="600" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>						
					</div>

					<div class="col-md-5 my-auto direccion">
						<p>Belgrano 1191 - Avellaneda</p>
						<p><i class="far fa-clock fa-1x"></i>  9am a 6pm</p>
					</div>

				</div>	
			</div>
		</section>

		<br>

		<?php include 'plantilla/footer.php' ?>


		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>  

		<script src="js/main.js"></script> 			
	</body>
</html>
<!-- https://getbootstrap.com/docs/4.0/utilities/display/#hiding-elements -->