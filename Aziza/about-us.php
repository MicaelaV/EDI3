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
		<title>About us</title>
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
					<div class="col-md-7 col-lg-8">
						<div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

								<div class="card">

									<div class="card-header" role="tab" id="headingOne1">
										<a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
										aria-controls="collapseOne1">
										<h5 class="mb-0" id="QuienesTitulos"> Quienes Somos </h5>
										</a>
									</div>						    
									<div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
										data-parent="#accordionEx">
										<div class="card-body">
											<p>Somos un grupo de amigas emprendedoras, que un 12 de Agosto de 2015, decidimos comenzar con seriedad nuestro (hasta ese momento), pequeño negocio. Hoy agradecemos a todas esas clientas que nos siguen eligiendo, y gracias a las ganas que nos dan de seguir adelante, y sus recomendaciones, pudimos abrir nuestro negocio. Esperamos que sigan disfrutando de nuestros productos mucho tiempo m&aacute;s.</p>      
										</div>
									</div>						    
								</div>

								<div class="card">
								
									<div class="card-header" role="tab" id="headingTwo2">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
										aria-expanded="false" aria-controls="collapseTwo2">
										<h5 class="mb-0" id="QuienesTitulos">Nuestra Historia</h5>
										</a>
									</div>						    
									<div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
										data-parent="#accordionEx">
										<div class="card-body">
											<p>Todo empezó, como suele ser, de boca en boca, nos recomendaban por tener precios accesibles, buena atenci&oacute;n y productos cancheros, que es por lo que seguimos manteniendo y respetando esa l&iacute;nea que nos diferencia del resto. No fue (y no es) f&aacute;cil, tuvimos muchos obst&aacute;culos hasta poder llegar a ser reconocidas como lo somos hoy por hoy. Luego se sortearlos, un 2 de Febrero de 2017 pudimos abrir nuestro actual negocio, para poder brindar una personalizada y mejor atenci&oacute;n.</p>          
										</div>
									</div>    
								</div>

								<div class="card">							
									<div class="card-header" role="tab" id="headingThree2">
										<a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"
										aria-expanded="false" aria-controls="collapseThree3">
											<h5 class="mb-0" id="QuienesTitulos">Nuestros Productos</h5>
										</a>
									</div>						    
									<div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
										data-parent="#accordionEx">
										<div class="card-body">
											<p>Contamos con una gran variedad de productos, entre ellos: Mochilas, pa&ntilde;uelos, todo tipo de bijou, entre otros. Lo m&aacute;s importante, es que todos son de calidad y precios accesibles. Aclaramos que en el caso de no tener un producto que requieran, en stock, nos pueden contactar, y de esa manera traerlo por encargue. Sin m&aacute;s que decir, las invitamos a que disfruten de los mismos. </p>          
										</div>
									</div>    
								</div>		      
							
						</div>						
					</div>
					<div class="col-md-5 col-lg-4">
						<img src="img/quienesSomos.jpeg" alt="collar-dos" class="d-none d-sm-none d-md-block img-fluid">
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