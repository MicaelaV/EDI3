<div class="col-md-6"> 
    <h3>Ingresar</h3> 
    <form class="needs-validation" novalidate action="php/login.php" method="POST">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <label for="validationMail" ><p class="text-center">E-Mail:</p></label>
            </div>
            <div class="col-sm-6">
                <input type="email" class="form-control" name="email" id="email"  required>
            <div class="invalid-feedback">
                Correo invalido
            </div>
                <br>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <label for="validatonPass"><p class="text-center">Contraseña</p></label>
            </div>
            <div class="col-sm-6">
                <input type="password" class="form-control" name="password" maxlength="10" id="password"  required>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <input type="submit" name="boton" value="Ingresar" class="float-right" id="boton"> 
            </div>
        </div>							
    </form>	
</div>

