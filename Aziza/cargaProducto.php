<?php
	error_reporting(0);//Oculta Errores
    session_start();
    $idGrupo = $_SESSION['idGrupo'];
	if(isset($_SESSION['id'])&&($idGrupo == 1)){
		//$idGrupo = $_SESSION['idGrupo'];
		$sMenu = 'Plantilla/headerClose.php';
	}else{
        header('location: home.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Carga</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css">
		<!-- Fuente -->
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
		<!-- Required meta tags -->   
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!--Libreria icons-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 
	</head>

<body onload="cargarP()" class="bodystyle">

	<?php include $sMenu ?>

	<?php include 'Plantilla/menu.php'?>
<br>
<section>
<?php include 'Plantilla/formProducto.php'?>
</section>    
<br>
<br>
	<footer>
		<?php include 'Plantilla/footer.php' ?>
	</footer>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>  
	<script src="js/main.js"></script>
	 		
    <script>
		function cargarP(){	
		var tipoProducto=document.getElementById('tipoProducto').value;
		var descripcion=document.getElementById('descripcion').value;
		var precio=document.getElementById('precio').value;
		var estadoProducto=document.getElementById('estadoProducto').value;		
		var fileToUpload=document.getElementById('fileToUpload').value;

		if ((tipoProducto>0) &&(descripcion.length>2) && (precio>0) && (estadoProducto==1) && (fileToUpload.length>0) ){
				document.getElementById('botonProductos').disabled = false;
				//password();
			}else{
				document.getElementById('botonProductos').disabled = true;
			}	 
		}
	</script>
</body>
</html>