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
		<title>Modificar Contrase&ntilde;a</title>
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
		<?php include 'Plantilla/menu.php'?>				
		<br>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<br> 
					<section>
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="row justify-content-center">
										<h3>Ingrese Nueva Contrase&ntilde;a</h3>
									</div>
									<div class="row justify-content-center">
										<?php
											if (isset($_GET['error'])) {
												if ($_GET['error'] == "passwordcheck") {
													echo '<p class="error"> Las contrase&ntilde;a no coinciden</p>';
												} else if ($_GET['error'] == "timeout"){
													echo '<p class="error"> El tiempo de Sesion ha terminado</p>';
												}				
											}											
										?>
									</div>
									<?php
										$valida = $_GET['valida']; 				
										if(empty($valida)){
											echo "<p>No se pudo validar su solicitud</p>";
										} else {
											if (ctype_xdigit($valida)) {
											//Chequear posibles caracteres que representen un dígito hexadecimal
										?>	
										<form class="needs-validation" novalidate action="php/submitpwd.php" method="POST">
											<input type="hidden" name="valida" id="valida" value="<?php echo $valida ?>">
										    <div class="row justify-content-center">
									            <div class="col-md-4 mb-3">
									                <label for="validatonPass" class="text-center contactoTexto">Contraseña</label>
									            </div>
									      	</div>    
									      	<div class="row justify-content-center">
							            		<div class="col-md-4 mb-3">
							                		<input type="password" class="form-control" name="password" maxlength="10" id="password" required>
							            		</div>
											</div>
										    <div class="row justify-content-center">
									            <div class="col-md-4 mb-3">
									                <label for="validatonPass" class="text-center contactoTexto">Repetir Contraseña</label>
									            </div>
									        </div>    
									        <div class="row justify-content-center">
									            <div class="col-md-4 mb-3">
									                <input type="password" class="form-control" name="passwordRepeat" maxlength="10" id="passwordRepeat"  required>
									            </div>
											</div>																						            
										    <div class="row justify-content-center">
										        <button class="btn btn-dark" type="submit" id="modPwdButton" name="modPwdButton">Aceptar</button>
										    </div>      
										</form>
									<?php }} ?>
				        		</div>
				    		</div>	
						</div>
					</section>
				</div>
			</div>
		</div>
		<br><br><br>

		<?php include 'Plantilla/footer.php' ?>


		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="js/jquery-3.4.1.min.js"></script>
	    <script src="js/popper.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>  
		<script src="js/main.js"></script> 	
		<script src="pluggins/sweetalert2.min.js"></script> 
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