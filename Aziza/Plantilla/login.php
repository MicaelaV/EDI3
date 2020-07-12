<div class="col-md-6">
    <div class="row justify-content-center">
        <?php if (isset($_GET['error'])) {
                if ($_GET['error'] == "noexistuser") {
                    echo '<p class="error"> Usuario o contraseña incorrecta. Reintentelo</p>';
                }
         } ?>      
    </div>          
    <h3>Ingresar</h3> 
    <form class="needs-validation" novalidate action="php/login.php" method="POST">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <label for="validationMail" class="text-center contactoTexto">E-Mail</label>
            </div>
            <div class="col-sm-6">
                <input type="email" class="form-control" name="email" id="email"  required>
                <div class="invalid-feedback">Correo invalido</div>
                <br>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <label for="validatonPass" class="text-center contactoTexto">Contraseña</label>
            </div>
            <div class="col-sm-6">
                <input type="password" class="form-control" name="password" maxlength="10" id="password"  required>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                <input type="submit" name="boton" value="Ingresar" class="float-right btn btn-dark" id="boton"> 
            </div>
        </div>							
    </form>
    <row class="row justify-content-center">
     <a href="recuperarpwd.php">¿Olvidaste tu contrase&ntilde;a?</a>
    </row>      	
</div>

