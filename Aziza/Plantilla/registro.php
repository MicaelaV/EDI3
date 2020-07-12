<div class="col-md-6">
		<div class="row justify-content-center">
			<?php if (isset($_GET['error'])) {
		            if ($_GET['error'] == "userexiste") {
		                echo '<p class="error"> Error. Usuario ya registrado</p>';
		            }
		     } ?>
     </div>         
	<h3>Registrarse</h3> 
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<form class="needs-validation" novalidate action="php/registrar.php" method="POST">
							<div class="row justify-content-center">
								<div class="col-sm-6">
								<label for="validationCustom01" class="text-center contactoTexto">Nombre</label>
								</div>  
								<div class="col-sm-6">
								<input type="text" class="form-control" name="nameR" id="nameR" minlength="3" maxlength="10" required>
									<div class="invalid-feedback">Debe tener más de 2 caracteres</div>
								<br>
								</div> 
							</div>

							<div class="row justify-content-center">
								<div class="col-sm-6">
									<label for="validationTel" class="text-center contactoTexto">Apellido</label>
								</div>
								<div class="col-sm-6">   
									<input type="text" class="form-control" name="surnameR" id="surnameR" minlength="4" maxlength="10" required>
									<div class="invalid-feedback">Debe tener más de 4 caracteres</div>
										<br>
									</div>
							</div>
							

							<div class="row justify-content-center">
								<div class="col-sm-6">
									<label for="validationTel" class="text-center contactoTexto">Telefono</label>
								</div>
								<div class="col-sm-6">   
										<input type="number" class="form-control" id="telphoneR" name="telphoneR" minlength="888" required>
										<div class="invalid-feedback">Telefono invalido</div>
										<br>
								</div>  
							</div>
						
							<div class="row justify-content-center">
								<div class="col-sm-6">
								<label for="validationEmail" class="text-center contactoTexto">E-Mail</label>
								</div>
								<div class="col-sm-6">
									<input type="email" class="form-control" name="emailR" id="emailR"  aria-describedby="inputGroupPrepend" required>
									<div class="invalid-feedback">Correo invalido</div>
									<br>
								</div>    
							</div>
					
							
							<div class="row justify-content-center">
								<div class="col-sm-6">
									<label for="validationConsulta" class="text-center contactoTexto">Ingrese contraseña</label>
								</div>	
								<div class="col-sm-6">	
									<input type="password" class="form-control" name="passwordR" id="passwordR" minlength="3" maxlength="10" onkeyup="password()" required>
									<div class="invalid-feedback">La contraseña debe tener 3 o mas caracteres</div>
									<br>
								</div>	      
							</div>
				
							<div class="row justify-content-center">
								<div class="col-sm-6">
									<label for="validationConsulta" class="text-center contactoTexto">Repetir contraseña</label>
								</div>
								<div class="col-sm-6">	
									<input type="password" class="form-control" name="passwordRConfirm" id="passwordRConfirm" minlength="3" maxlength="10" onkeyup="password()" required>
									<br>
									<div id="passok"> </div>
								</div>     
							</div>

							<br>
							
							<div class="row">
								<div class="col-sm-12">
									<input type="submit" name="botonR" value="Aceptar" class="float-right btn btn-dark" id="botonR" > 
								</div> 
							</div> 
				

						</form>
	                </div>
	            </div>	

            </div>
       </section>

</div>
