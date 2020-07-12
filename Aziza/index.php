<?php
	session_start();
	$sMenu = 'plantilla/headerLogin.php';
	if(isset($_SESSION['id'])){
		$idGrupo = $_SESSION['idGrupo'];
		$sMenu = 'plantilla/headerClose.php';
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
		<!-- Fuente -->
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
		<!-- Required meta tags -->   
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
		<!--Libreria icons-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 
	
		<link rel="stylesheet" href="pluggins/sweetalert2.min.css"> 
	
 
	</head>

<body class="bodystyle">
	<?php
	//if(isset($_SESSION['id'])){
	//echo "tipoUsu:  ".$idGrupo;
	//}?>
	<?php include $sMenu ?>
		
	<!-- https://www.w3schools.com/bootstrap4/bootstrap_navbar.asp -->
	<?php include 'plantilla/menu.php'?>

<br>

	<section>
		<div class="container">
			 <div class="row justify-content-center">
        <?php if (isset($_GET['registro'])) {
                if ($_GET['registro'] == "exito") {
                    echo '<p class="success"> ¡BIENVENIDO! Se registró correctamente.</p>';
                }
         } ?>      
    </div>        
			<div class="row">
				<div class="col-md-7" id="main-wrap">
					<div id="demo" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ul class="carousel-indicators">
							<li data-target="#demo" data-slide-to="0" class="active"></li>
							<li data-target="#demo" data-slide-to="1"></li>
							<li data-target="#demo" data-slide-to="2"></li>
							<li data-target="#demo" data-slide-to="3"></li>
							<li data-target="#demo" data-slide-to="4"></li>							
						</ul>
						<!-- Contenido de Slides -->
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="img/necklace.jpeg" alt="img-ej" class="rounded img-fluid" >
							</div>
							<div class="carousel-item">
								<img src="img/flowers.jpg" alt="flowers" class="rounded img-fluid" >
							</div>
							<div class="carousel-item">
								<img src="img/wedding.jpg" alt="img-ej" class="rounded img-fluid" >
							</div>
							<div class="carousel-item">
								<img src="img/table.jpg" alt="table" class="rounded img-fluid" >
							</div>
							<div class="carousel-item">
								<img src="img/black.jpg" alt="black" class="rounded img-fluid" >
							</div>																							
						</div>
					</div>				
				</div>
				 <!-- textoPresentacion -->
					<div class="col-md-5 my-auto p-3 presentacion">
						<p>Venta mironista. Accesorios, aros, collares, mochilas, pañuelos, y una enorme variedad de productos, encontralos en Aziza. Calidad y precio. Envíos a todo Gran Buenos Aires.</p>
					</div>							
			</div>	
		</div>
	</section>

<br>

<div id="boton-tel">
	<a href="https://api.whatsapp.com/send?phone=5199999999" target="_blank"> <img src="http://s2.accesoperu.com/logos/btn_whatsapp.png" alt=""> </a>
</div>
<br>
<br>
		<footer>
		<?php include 'plantilla/footer.php' ?>
		</footer>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>  
	<script src="js/main.js"></script> 	
	<script src="pluggins/sweetalert2.min.js"></script> 

</body>
</html>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">