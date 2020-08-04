<?php
	error_reporting(0);
	session_start();
	$sMenu = 'plantilla/headerLogin.php';
	require 'php/conexion.php';
	if(isset($_SESSION['id'])){
		$idGrupo = $_SESSION['idGrupo'];
		$id = $_SESSION['id'];
		$sMenu = 'plantilla/headerClose.php';
		if (isset($idGrupo)) {
			$sql = "select email, nombre, apellido, telefono from usuarios where id = '$id'";
			$result = mysqli_query($conexion, $sql);
			$rowUser = mysqli_fetch_array($result,MYSQLI_ASSOC);
		}
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
		<link rel="stylesheet" href="pluggins/sweetalert2.min.css"> 
	</head>

	<body class="bodystyle">

		<?php include $sMenu ?>

		<?php include 'plantilla/menu.php'?>				

		<br>

		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="row justify-content-center">
							<?php
								if (isset($_GET['error'])) {
									if ($_GET['error'] == "notsend") {
										echo '<p class="error"> A sucedido un error, intente nuevamente</p>';
									}				
								}
								if (isset($_GET['send'])) {
									if ($_GET['send'] == "successsend") {
										echo '<p class="success"> Consulta enviada!</p>';
									}			
								}											
							?>
						</div>
						<form class="needs-validation" novalidate action="email/send.php" method="POST">
						    <div class="row justify-content-center">
							    <div class="col-md-4 mb-3">
							      	<label for="validationCustom01" class="text-center contactoTexto">Nombre</label>
									<input name="nombre" type="text" class="form-control" id="nombreContacto"  minlength="4" value="<?php if ($idGrupo == 2){ echo $rowUser['nombre'];} ?>" required>

							      	<div class="invalid-feedback">Debe tener más de 4 caracteres</div>
						       </div>
						    </div>
						    <div class="row justify-content-center">
						      <div class="col-md-4 mb-3">
							      <label for="validationTel" class="text-center contactoTexto">Tel&eacute;fono</label>
							      <input type="number" name="telefono" class="form-control" id="telefono" max="99999999999" min="10000000" value="<?php if ($idGrupo == 2){ echo $rowUser['telefono'];} ?>" required>
							      <div class="invalid-feedback">Tel&eacute;fono invalido</div>
							   </div>
						    </div>
						    <div class="row justify-content-center">
							    <div class="col-md-4 mb-3">
							      <label for="validationEmail" class="text-center contactoTexto">E-Mail</label>
							      <!-- <div class="input-group"> -->
							        <input name="address" type="email" class="form-control" id="mailContacto" aria-describedby="inputGroupPrepend" value="<?php if ($idGrupo == 2){ echo $rowUser['email'];} ?>" required>
							        <div class="invalid-feedback">Correo invalido</div>
							    </div>
						    </div>
						     <!-- </div> --> 
						    <div class="row justify-content-center">
						        <div class="col-md-4 mb-3">
						        	<label for="validationConsulta" class="text-center contactoTexto">Consulta</label>
						        	<textarea id="message" class="form-control" name="message" cols="20" rows="5" class="form-control full-width border-box m-none" maxlength="255" class="validate" required></textarea>
								      <div class="invalid-feedback">Ingrese una consulta</div>
						        </div>
						    </div> 
						    <div class="row justify-content-center">
						        <button class="btn btn-dark" type="submit" id="enviarEmail">Enviar</button>
						   	</div> 
						</form>
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

		<script>
			// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function() {
			  'use strict';
			  window.addEventListener('load', function() {
			    // Fetch all the forms we want to apply custom Bootstrap validation styles to
			    var forms = document.getElementsByClassName('needs-validation');
			    // Loop over them and prevent submission
			    var validation = Array.prototype.filter.call(forms, function(form) {
			      form.addEventListener('submit', function(event) {
			        if (form.checkValidity() === false) {
			          event.preventDefault();
			          event.stopPropagation();
			        }
			        form.classList.add('was-validated');
			      }, false);
			    });
			  }, false);
			})();
		</script>
	</body>
</html>