<?php

if(isset($_GET['producto'])){
    $mProducto = $_GET['producto'];
    //echo "idP".$mProducto;
}
$con = mysqli_connect("localhost","root","","aziza");

mysqli_set_charset($con,'utf8');

$sqlI = "SELECT * FROM tipoproductos";
$rTipoProducto = mysqli_query($con, $sqlI);


$result= "SELECT * FROM productos WHERE idProducto='$mProducto'";
$DatosProd = mysqli_query($con, $result);
$rowDatosProd = mysqli_fetch_array($DatosProd,MYSQLI_ASSOC);

mysqli_close($con);
?>

<div class="container">
        <div class="col-md-12 text-center"> 
        <h3>Producto</h3> 
        <form action="php/cargarProducto.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="mProducto" id="mProducto" value="<?php echo $mProducto; ?>">   
            <div class="row">
                <div class="col-sm-6">
                    <label><p class="text-center">Tipos de Productos</p></label>
                </div>
                <div class="col-sm-6">
                    <select name="tipoProducto" id="tipoProducto" onchange="cargarP()">
                        <option>Seleccione</option>
                        <?php
                        While($rowTipoProducto = mysqli_fetch_array($rTipoProducto,MYSQLI_ASSOC)){?>
                            <option value="<?php echo $rowTipoProducto['idTipo']; ?>"<?php 
                             if($rowDatosProd['idTipo']==$rowTipoProducto['idTipo']){ echo 'selected'; } ?>>
                                <?php
                             echo $rowTipoProducto['descripcion'];?>                  
                            </option>
                        <?php } ?>
               
                 </select>
            </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label><p class="text-center">Descripcion</p></label>
                </div>
                <div class="col-sm-6">
                    <input type="text" name="descripcion" maxlength="20" id="descripcion" onkeyup="cargarP()"  value ="<?php echo $rowDatosProd['nproducto']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label><p class="text-center">Precio</p></label>
                </div>
                <div class="col-sm-6">
                    <input type="number" name="precio" maxlength="5" id="precio" onkeyup="cargarP()" value ="<?php echo $rowDatosProd['precio'];?>">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label><p class="text-center">Estado producto</p></label>
                </div>
                <div class="col-sm-6">   
                    <?php if($rowDatosProd['habilitado']==0){ ?>
                     <select  name="estadoProducto" id="estadoProducto" onchange="cargarP()">
                        <option value=1  <?php if($rowDatosProd['habilitado']==1){ echo "selected"; }?>>Habilitado</opction>
                        <option value=0 disabled="disabled" <?php if($rowDatosProd['habilitado']==0){ echo "selected"; }?>>Deshabilitado</option>
                     </select>   
                    <?php } else { ?>
                        <input type="text" disabled="true" name="descripcion" maxlength="20" id="estadoProducto" value ="Habilitado">
                    <?php } ?>
             </div>
            </div>

            <?php if(isset($_GET['producto'])){ ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p>Imagen de referencia:</p>
                    </div>
                </div>                                        
                <div class="row">
                    <div class="col-sm-12 text-center">
                    <?php $img = $rowDatosProd['img']; echo "<img width='200' border='0' src='data:image/jpg;base64,".$img."'>";?>
                    </div>
                </div>
            </div>
            <?php }?>
            <br><br>
            <div class="row">
                <div class="col s6 offset-s3 borde">
                        <p class=" title center">Seleccione una imagen</p>

                        <input type="file" name="fileToUpload" id="fileToUpload" onchange="cargarP()" value ="<?php echo $rowDatosProd['img'];?>">

                </div>
            </div>                                  
            <div class="row">
                <div class="col-sm-10">
                    <input type="submit" name="botonProductos" value="Agregar"  class="float-right" id="botonProductos"> 
                </div>
            </div>							
        </form>	
        </div>
    </div>
<br><br>   
