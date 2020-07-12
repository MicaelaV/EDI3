<?php
    session_start();
    $idGrupo = $_SESSION['idGrupo'];
	if(isset($_SESSION['id'])&&($idGrupo == 1)){
		//$idGrupo = $_SESSION['idGrupo'];
		$sMenu = 'plantilla/headerClose.php';
	}else{
        header('location: home.php');
    }

    $con = mysqli_connect("localhost","root","","aziza");

    mysqli_set_charset($con,'utf8');

    $sqlI = "SELECT * FROM tipoproductos";
    $rTipoProducto = mysqli_query($con, $sqlI);


    $result= "SELECT * FROM productos";
    $DatosPreven = mysqli_query($con, $result);
    $rowDatosPreven = mysqli_fetch_array($DatosPreven,MYSQLI_ASSOC);

    mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Modificar</title>
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

<body class="bodystyle">

	<?php include $sMenu ?>

	<?php include 'plantilla/menu.php'?>
<br>
    <?php include 'plantilla/tablaProducto.php'?>
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
</body>
</html>