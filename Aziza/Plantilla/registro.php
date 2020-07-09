<div class="col-md-6">
	<h3>Registrarse</h3> 

		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
					  <form class="needs-validation" novalidate action="php/registrar.php" method="POST">
					     <div class="row justify-content-center">
						    <div class="col-sm-6">
						      <label for="validationCustom01"> <p class="text-center contactoTexto">Nombre</p></label>
						    </div>  
						    <div class="col-sm-6">
						      <input type="text" class="form-control" name="nameR" id="nameR" minlength="3" maxlength="10" required>
						      	<div class="invalid-feedback">
						        Debe tener más de 2 caracteres
						      </div>
						       <br>
						     </div> 

					       </div>



					    <div class="row justify-content-center">
						      <div class="col-sm-6">
							      <label for="validationTel">Apellido</label>
							   </div>
							   <div class="col-sm-6">   
							      <input type="text" class="form-control" name="surnameR" id="surnameR" minlength="2" maxlength="10" required>
								  <div class="invalid-feedback">
							         Debe tener más de 2 caracteres
							      </div>
						      		<br>
							    </div>
					
						   </div>
					     

					    <div class="row justify-content-center">
					      <div class="col-sm-6">
						      <label for="validationTel">Telefono</label>
						  </div>
						   <div class="col-sm-6">   
						      <input type="number" class="form-control" id="telphoneR" name="telphoneR" minlength="888" required>
						         <div class="invalid-feedback">
						         Telefono invalido
				                </div>
				                	<br>
						   </div>  
						</div>
					  
					     <div class="row justify-content-center">
						    <div class="col-sm-6">
						      <label for="validationEmail">E-Mail</label>
						    </div>
						    <div class="col-sm-6">
						        <input type="email" class="form-control" name="emailR" id="emailR"  aria-describedby="inputGroupPrepend" required>
						   		<div class="invalid-feedback">
						          Correo invalido
						        </div>
						        <br>
						    </div>    

						 </div>
				
					     
					      <div class="row justify-content-center">
					       <div class="col-sm-6">
					        	<label for="validationConsulta">Ingrese contraseña</label>
					        </div>	
					        <div class="col-sm-6">	
					        	<input type="password" class="form-control" name="passwordR" id="passwordR" minlength="3" maxlength="10" onkeyup="password()" required>
					            <div class="invalid-feedback">
						         Debes ingresar una contraseña
				                </div>
				                <br>
					        </div>	      
					       </div>
			
					      <div class="row justify-content-center">
					        <div class="col-sm-6">
					        	<label for="validationConsulta">Confirme contraseña</label>
					        </div>
					        <div class="col-sm-6">	
					        	<input type="password" class="form-control" name="passwordRConfirm" id="passwordRConfirm" minlength="3" maxlength="10" onkeyup="password()" required>
					        		<br>
					        	<div id="passok"> </div>
							 </div>     
							     
					        </div>
					     <br>
					      <div class="row ">
								<div class="col-sm-12">
					              <input type="submit" name="botonR" value="Aceptar" class="float-right" id="botonR" > 
					            </div> 
			                </div> 
			

			             </form>
	                </div>
	            </div>	

            </div>
       </section>

</div>
