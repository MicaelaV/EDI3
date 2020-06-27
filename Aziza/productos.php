<?php
	//session_start();
	session_start();
	$sMenu = 'Plantilla/headerLogin.php';
	if(isset($_SESSION['id'])){
		$idGrupo = $_SESSION['idGrupo'];
		$sMenu = 'Plantilla/headerClose.php';
	}

  if (isset($_GET['idProducto'])) {
    $idProducto = $_GET['idProducto'];
    $_SESSION['idProducto'] = $idProducto;
   }

   $con = mysqli_connect("localhost","root","","aziza");
	mysqli_set_charset($con,'utf8');

	$sql = "select p.idProducto, p.nproducto, p.img, p.idTipo, p.precio, tp.descripcion from productos p INNER JOIN tipoproductos tp on tp.idTipo = p.idTipo where p.idTipo= $idProducto and habilitado=1";
	$r = mysqli_query($con, $sql);

	mysqli_close($con);

	

?>


<!DOCTYPE html>
<html>
<head>
	<title>Productos</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
			<!-- Fuente -->
			<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
		  <!-- Required meta tags -->   
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		  <!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
						<div class="col-md-5 my-auto">
						</div>	
					</div>	   	
					 <div class="col-md-12">	

					    <div class="row">
					 		   	<?php while($row = mysqli_fetch_array ($r,MYSQLI_ASSOC)){?>
								
						   <div class="col-xs-5 col-sm-5 col-md-5 col-lg-4">
						   	<div class="text-center"><?php $img = $row['img']; echo "<img width='200' border='0' src='data:image/jpg;base64,".$img."'>";?> </div>
							<!-- <img src="Img/mochila1.jpg" alt="img-ej" class="img-fluid">  -->
							<p class="text-center" > <!--Mochila rosa con tachas "Rosemary" -->
									<?php echo $descrip=$row['nproducto']; ?> </p>
							<a> <button type="button" class="btn btn-outline-danger btn-block"> <i class="fas fa-cart-plus"></i>    Comprar art <?php echo $descrip=$row['nproducto']." $".$precio
							=$row['precio']; ?></button></a>
							 <br>
							
						   </div>
						<?php } ?>
						
					</div>	
					
				</div>
		</section> 
		

		<div class="container">
		<div id="boton-top" class="d-block d-sm-block d-md-block d-lg-none">
			<span class="boton-top" id="flotante"><i class="fas fa-chevron-up fa-2x"></i></span>
		</div>
		</div>
			<br>
			<br>
		<footer>
 		<?php include 'Plantilla/footer.php' ?>
		</footer>

	  <!-- Optional JavaScript -->
	  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
	<script src="js/main.js"></script> 
	<script>
		function show(){

    $.ajax({
        url: 'consultarProductos.php',
        type: 'POST',
    })

    .done(function(response){
        $("#result").html(response);
    })

    .fail(function(jqXHR){
        console.log(jqXHR.statusText);
    });

}</script>			
</body>
</html>