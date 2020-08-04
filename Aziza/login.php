<?php
	session_start();
	$sMenu = 'plantilla/headerLogin.php';
	if(isset($_SESSION['id'])){
		$idGrupo = $_SESSION['idGrupo'];
	header('location: index.php');
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

	<body onload="valida()" class="bodystyle">

		<?php include $sMenu ?>

		<?php include 'plantilla/menu.php'?>
			
		<br>

		<section>
			<div class="container">
				<div class="row">
					<?php include 'plantilla/registro.php'?>

					<?php include 'plantilla/login.php'?>

				</div>	
			</div>
		</section>

		<br>


		<?php include 'plantilla/footer.php' ?>



		<script>
			function password(){
				 var password=document.getElementById('passwordR').value;
				 var passwordC=document.getElementById('passwordRConfirm').value;
				
				 if (password == passwordC){
					     document.getElementById('passok').innerHTML= "Contraseña coincide";
					     
					 }else{
					 document.getElementById('passok').innerHTML= "Contraseña no coincide";
				   }	
				}
		</script>

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