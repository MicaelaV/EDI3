<?php
	session_start();
	$sMenu = 'Plantilla/headerLogin.php';
	if(isset($_SESSION['id'])){
	$idGrupo = $_SESSION['idGrupo'];
	header('location: home.php');
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

<body onload="valida(); validaR()" class="bodystyle">

<?php include $sMenu ?>

<?php include 'Plantilla/menu.php'?>
		
<br>

	<section>
		<div class="container">
			<div class="row">
				<?php include 'Plantilla/registro.php'?>

				<?php include 'Plantilla/login.php'?>

			</div>	
		</div>
	</section>

<br>

		<footer>
			<?php include 'Plantilla/footer.php' ?>
		</footer>


	<script>
	function valida(){	
			
	 var email=document.getElementById('email').value;		
	 var password=document.getElementById('password').value;

		if ((email.length>4) && (password.length>2)){
			//password();
			document.getElementById('boton').disabled =false;
			
		}else{
			document.getElementById('boton').disabled =true;
		}

	}

	function validaR(){	
	 var nombre=document.getElementById('nameR').value;
	 var apellido=document.getElementById('surnameR').value;
	 var telefono=document.getElementById('telphoneR').value;
	 var email=document.getElementById('emailR').value;		
	 var password=document.getElementById('passwordR').value;
	 var passwordC=document.getElementById('passwordRConfirm').value;


	 if ((nombre.length>2) && (apellido.length>2) && (apellido.length>2) && (telefono.length>2) 
	 						&& (email.length>2) && (password.length>2) && (passwordC.length>2)){
			document.getElementById('botonR').disabled =false;
			//password();
		}else{
				document.getElementById('botonR').disabled =true;
		}	 
	}

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
		
</body>
</html>