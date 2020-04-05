<?php
	session_start();
	$sMenu = 'Plantilla/headerLogin.php';
	if(isset($_SESSION['id'])){
		$idGrupo = $_SESSION['idGrupo'];
		$sMenu = 'Plantilla/headerClose.php';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Iniciar sesión</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="Style/style.css">
	<!-- Fuente -->
	<link href="https://fonts.googleapis.com/css?family=Patrick+Hand|Patrick+Hand+SC&display=swap" rel="stylesheet">
	<!-- Required meta tags -->   
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
	<!--Libreria icons-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 	

</head>

<body class="bodystyle">

	<?php include $sMenu ?>

		<?php include 'Plantilla/menu.php'?>				

<br>

		<section>
			<div class="container">
				<div class="row">

					<div class="col-md-6">  
						<form action="email/send.php" method="POST">
							<div class="row">
								<div class="col-sm-6">
									<label><p class="text-center">Nombre</p></label>
								</div>
								<div class="col-sm-6">
									<input type="text" id="nombre" name="nombre" maxlength="10" class="validate">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<label><p class="text-center">Telefono</p></label>
								</div>
								<div class="col-sm-6">
									<input type="number" name="phone" class="validate">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<label><p class="text-center">E-mail</p></label>
								</div>
								<div class="col-sm-6">
									<input type="email" name="address" id="address" class="validate">
								</div>
							</div>							
							<div class="row">
								<div class="col-sm-6">
									<label><p class="text-center">Consulta</p></label>
								</div>
								<div class="col-sm-6">
									<textarea id="message" name="message" cols="20" rows="5" class="full-width border-box m-none" maxlength="255" class="validate"></textarea>
								</div>
							</div>							
							<div class="row">
								<div class="col-sm-10">
									<input type="submit" name="action" value="Enviar" class="float-right"> 
								</div>
							</div>							
						</form>	
					</div>
				</div>	
			</div>
		</section>

<br>

		<footer>
		<?php include 'Plantilla/footer.php' ?>
		</footer>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>  
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	 -->
	<script src="JavaScript/main.js"></script> 			
</body>
</html>