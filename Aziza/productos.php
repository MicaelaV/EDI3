<?php
	error_reporting(0);
	session_start();
	$sMenu = 'plantilla/headerLogin.php';

	require 'php/conexion.php';

	if(isset($_SESSION['id'])){
		$id = $_SESSION['id'];
		$idGrupo = $_SESSION['idGrupo'];
		$sMenu = 'plantilla/headerClose.php';
		if ($idGrupo == 2) {
			$sqlU = "select email from usuarios where id = '$id'";
			$resultU = mysqli_query($conexion, $sqlU);
			$rowUser = mysqli_fetch_array($resultU,MYSQLI_ASSOC);
		}
	}

	if (isset($_GET['idTipo'])) {
		$idTipo = $_GET['idTipo'];
		
		

		$sql = "SELECT p.idProducto, p.nproducto, p.img, p.idTipo, p.precio, tp.descripcion FROM productos p INNER JOIN tipoproductos tp on tp.idTipo = p.idTipo WHERE p.idTipo= $idTipo AND habilitado=1";
		
		$result = mysqli_query($conexion, $sql);

		if (isset($_POST["add"])) {
			if (isset($_SESSION["cart"])) {
				$item_array_id = array_column($_SESSION["cart"], "product_id");
				if (!in_array($_GET["id"], $item_array_id)) {
					$count = count($_SESSION["cart"]);
					$item_array = array(
												'product_id' => $_GET["id"],
												'item_name' => $_POST["hidden_nombre"],
												'product_price' => $_POST["hidden_price"],
												'item_quantity' => $_POST["quantity"],
					);
					$_SESSION["cart"][$count] = $item_array;
					echo '<script>window.location="productos.php?idTipo='.$idTipo.'"</script>';
				}
				else {
					echo '<script>alert("Producto ya esta agregado al carrito")</script>';
					echo '<script>window.location="productos.php?idTipo='.$idTipo.'"</script>';
				}
			}
			else {
					$item_array = array(
												'product_id' => $_GET["id"],
												'item_name' => $_POST["hidden_nombre"],
												'product_price' => $_POST["hidden_price"],
												'item_quantity' => $_POST["quantity"],
					);
				$_SESSION["cart"][0] = $item_array;
			}
		}
		if (isset($_GET["action"])) {
			if ($_GET["action"] == "delete") {
				foreach ($_SESSION["cart"] as $keys => $value) {
					if ($value["product_id"] == $_GET["id"]) {
						unset($_SESSION["cart"][$keys]);
							echo '<script>window.location="productos.php?idTipo='.$idTipo.'"</script>';					
					}
				}
			}
		}
		mysqli_close($conexion);
	} else {
		header("Location: index.php");
	}	
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
		<link rel="stylesheet" href="css/bootstrap.min.css">	
		<!--Libreria icons-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> 
		<link rel="stylesheet" href="pluggins/sweetalert2.min.css"> 	
	</head>

	<body class="bodystyle" >

		<?php include $sMenu ?>

		<?php include 'plantilla/menu.php'?>				

		<br>
		<section>

			<div class="container">
				<div class="d-flex flex-row-reverse">
					<div class="col-md-3">
						<a href="#Carrito" class="btn btn-outline-danger btn-block" data-toggle="modal"><i class="fas fa-cart-plus"></i> Carrito de Compra</a>						
					</div>
				</div>
			</div>
		<br>
			<div class="container">
				<div class="row">
					<?php
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_array($result)) {
					?>
						<div class="col-md-3">
							<form method="POST" action="productos.php?action=add&id=<?php echo $row['idProducto']?>&idTipo=<?php echo $idTipo ?>">
								<div class="producto">
									<div class="text-center"><?php $img = $row['img']; echo "<img width='200' border='0' src='data:image/jpg;base64,".$img."'>";?></div>
									<h6 class="text-info text-center text-capitalize font-weight-bold"><?php echo $row['nproducto']; ?></h6>
									<h6 class="text-danger text-center font-weight-bold">$ <?php echo $row['precio']; ?></h6>
									<input type="number" min="1" max="5" name="quantity" class="form-control" value="1">
									<input type="hidden" name="hidden_nombre" value="<?php echo $row['nproducto']; ?>">
									<input type="hidden" name="hidden_price" value="<?php echo $row['precio']; ?>">
									<input type="submit" name="add" style="margin-top: 5px;" class="btn btn-outline-danger btn-block" value="Agregar al Carro">
								</div>							
							</form>
						</div>
					<?php }} ?>					
				</div>	
			</div>

			<div class="modal fade" id="Carrito">
				<div class="modal-dialog modal-lg">
					<div class="modal-content ventanaE">
						<div class="modal-header">
							<h3>Productos Seleccionados</h3>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>							
						</div>
						<div class="modal-body">
							<div class="container">
								<div class="row justify-content-center">
									<div class="col-md-12">
										<br>
										<table class="table table-striped">
											<thead class="thead-dark">
												<tr>
													<th>Producto</th>
													<th>Cantidad</th>
													<th>Precio Unidad</th>
													<th>Precio Total</th>
													<th></th>
												</tr>						
											</thead>
											<tbody>	
												<?php
													if (!empty($_SESSION["cart"])) {
														$total = 0;
														foreach ($_SESSION["cart"] as $key => $value) {
												?>
													<tr>
														<td><?php echo $value["item_name"];?></td>
														<td><?php echo $value["item_quantity"];?></td>
														<td>$ <?php echo $value["product_price"];?></td>
														<td>$ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
														<td><a href="productos.php?action=delete&id=<?php echo $value['product_id'];?>&idTipo=<?php echo $idTipo ?>"><span class="text-danger">Quitar</span></a></td>
													</tr>
													<?php
														$total = $total + ($value["item_quantity"] * $value["product_price"]);
														}
													?>
													<tr>
														<td colspan="3" align="right">Total</td>
															<th align="right">$ <?php echo number_format($total,2); ?></th>
														<td></td>
													</tr>
												<?php						
												}
												?>
											</tbody>
										</table>
									</div>
								</div>				
							</div>
						</div>
						<div class="modal-footer">
							<?php
								if (!empty($_SESSION["cart"])) {
									?>

										<div class="col-12">
											<form name="tuformulario" method="POST" class="needs-validation"novalidate action="php/sendCompra.php" target="_blank">
									            <div class="col-sm-6">
									                <label for="validationMail" class="text-center contactoTexto">E-Mail</label>
									            </div> <!-- que se inserte el mail si ya se logueo -->
									            <div class="col-sm-6" >
									            	<p class="text-success textoMail">"Te enviaremos los detalles de la compra al mail asentado"</p>
									            	<?php if ($idGrupo == 2){ ?>
									                	<input name="emailCompra" type="email" class="form-control"  id="emailCompra"  placeholder="Ingrese Email" value="<?php echo $rowUser['email'];?>">
									                	<br>
									                	</div>
									                	<input type="button" name="sendTotal" id="sendTotal" value="Comprar" class="float-right btn btn-dark" class="btn btn-outline-secondary" onclick="pregunta()"  data-dismiss="modal"> 
									                <?php }else { ?>
									              
									                <input name="emailCompra" type="email" class="form-control"  id="emailCompra"  placeholder="Ingrese Email" value="" onkeyup="validarEmail()" required>
									                <br>
									                <div id="confirmEmail"  ></div>
									                <br>
									            </div>
												<br>
												<input type="button" name="sendTotal" id="sendTotal" value="Comprar" class="float-right btn btn-dark" class="btn btn-outline-secondary" onclick="pregunta()" disabled="true" data-dismiss="modal"> 
									                <?php } ?>
									           </form>											
										</div>

									<?php
									//var_dump($_SESSION["cart"]);//como usar un array dentro de un session
								}
							 ?>							
						</div>						
					</div>					
				</div>
			</div>							
		</section>

		<div class="container">
			<div id="boton-top" class="d-block d-sm-block d-md-block d-lg-none">
				<span class="boton-top" id="flotante"><i class="fas fa-chevron-up fa-2x"></i></span>
			</div>
		</div>
		<br><br>

	 	<?php include 'plantilla/footer.php' ?>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="js/jquery-3.4.1.min.js"></script>
	    <script src="js/popper.min.js"></script>
	    <script src="js/bootstrap.min.js"></script> 	
		<script src="js/main.js"></script> 
		<script src="pluggins/sweetalert2.min.js"></script>
		<script>
			// function show(){

		 //    $.ajax({
		 //        url: 'consultarProductos.php',
		 //        type: 'POST',
		 //    })

		 //    .done(function(response){
		 //        $("#result").html(response);
		 //    })

		 //    .fail(function(jqXHR){
		 //        console.log(jqXHR.statusText);
		 //    });

			// }

			function pregunta(){
	   //        if (confirm("¿Estas seguro de quiere realizar esta compra?")){
				// 	document.tuformulario.submit()
				// }else{
				// 	alert("Su compra ha sido cancelada");
				// }
				Swal.fire({
				        title: "¿Deseas confirmar la compra?",
				        icon: 'warning',
				        showCancelButton: true,
				        confirmButtonText: "Confirmar",
				        cancelButtonText: "Cancelar",
				    })
				    .then(resultado => {
				        if (resultado.value) {
				            // Hicieron click en "Sí"
				            document.tuformulario.submit()
				        } 
				    });
				}

			function validarEmail(){
				 var emailCompra=document.getElementById('emailCompra').value;
				 var sendTotal=document.getElementById('sendTotal').value;
				 expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
               if ( !expr.test(emailCompra) ){
               	        document.getElementById('sendTotal').disabled = true;
					     document.getElementById('confirmEmail').innerHTML= " Verifique el correo ingresado";
					     confirmEmail.style.color="red";
					 }else{
					 document.getElementById('confirmEmail').innerHTML= " Email valido";
					 document.getElementById('sendTotal').disabled = false;
					 confirmEmail.style.color="green";
				   }	
				}
			
		  
		
		</script>	
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