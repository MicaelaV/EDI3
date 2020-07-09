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
	<link rel="stylesheet" href="css/style.css">
	<!-- Fuente -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<!-- Required meta tags -->   
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
	<!--Libreria icons-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 	
	<link rel="stylesheet" href="pluggins/sweetalert2.min.css"> 
</head>

<body class="bodystyle">

	<?php include $sMenu ?>

		<?php include 'Plantilla/menu.php'?>				

<br>

		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
					 <form class="needs-validation" novalidate action="email/send.php" method="POST">
					    <div class="row justify-content-center">
						    <div class="col-md-4 mb-3">
						      <label for="validationCustom01" class="text-center contactoTexto">Nombre</label>
						      <input type="text" class="form-control" id="nombreContacto"  minlength="4" required>
						      <div class="invalid-feedback">
						        Debe tener más de 4 caracteres
						      </div>
					       </div>
					    </div>
					    <div class="row justify-content-center">
					      <div class="col-md-4 mb-3">
						      <label for="validationTel" class="text-center contactoTexto">Telefono</label>
						      <input type="number" class="form-control" id="telefono" minlength="888" required>
						      <div class="invalid-feedback">
						        Telefono invalido
						      </div>
						   </div>
					     </div>
					     <div class="row justify-content-center">
						    <div class="col-md-4 mb-3">
						      <label for="validationEmail" class="text-center contactoTexto">E-Mail</label>
						      <!-- <div class="input-group"> -->
						        <input type="email" class="form-control" id="mailContacto" aria-describedby="inputGroupPrepend" required>
						        <div class="invalid-feedback">
						          Correo invalido
						        </div>
						    </div>
					    </div>
					     <!-- </div> --> 
					      <div class="row justify-content-center">
					        <div class="col-md-4 mb-3">
					        	<label for="validationConsulta" class="text-center contactoTexto">Consulta</label>
					        	<textarea id="message" class="form-control" name="message" cols="20" rows="5" class="form-control full-width border-box m-none" maxlength="255" class="validate" required></textarea>
							      <div class="invalid-feedback">
							        Ingrese una consulta
							      </div>
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