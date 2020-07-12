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
                            <div class="row justify-content-center">
                        <?php if (isset($_GET['errorProducto'])) {
                                if ($_GET['errorProducto'] == "productoexiste") {
                                    echo '<p class="error"> Error. Ya hay un producto registrado con ese nombre</p>';
                                }
                         } ?>      
                    </div>  
        <form action="php/cargarProducto.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="mProducto" id="mProducto" value="<?php echo $mProducto; ?>">   
            <div class="row justify-content-center">
                <div class="col-sm-3">
                    <label><p class="text-center">Tipos de Productos</p></label>
                </div>
                <div class="col-6 col-sm-3">
                    <select name="tipoProducto" id="tipoProducto" onchange="cargarP()" class="form-control">
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
            <div class="row justify-content-center">
                <div class="col-sm-3">
                    <label><p class="text-center">Descripcion</p></label>
                </div>
                <div class="col-sm-3">
                    <input type="text" name="descripcion" maxlength="20" id="descripcion" class="form-control" onkeyup="cargarP()"  value ="<?php echo $rowDatosProd['nproducto']; ?>">
                </div>
            </div>      
            <div class="row justify-content-center">
                <div class="col-sm-3">
                    <label><p class="text-center">Precio</p></label>
                </div>
                <div class="col-sm-3">
                    <input type="number" name="precio" maxlength="5" id="precio" onkeyup="cargarP()" class="form-control" value ="<?php echo $rowDatosProd['precio'];?>">
                </div>
            </div>

            <div class="row justify-content-center">
                <?php if($rowDatosProd['habilitado']==="0"){ ?>
                    <div class="col-sm-3">
                        <label><p class="text-center">Estado producto</p></label>
                    </div>
                    <div class="col-sm-3">        
                        <input type="checkbox" name="estadoProducto" id="estadoProducto" value="1"> <label>Habilitado</label>                       
                    </div>                        
                <?php } else { ?>
                    <div class="col-sm-3" style="display: none;">
                        <input type="checkbox" name="estadoProducto" id="estadoProducto" value="1" checked> <label>Habilitado</label>
                    </div>
                <?php } ?>
            </div>
                <!-- <div class="col-sm-3">   
                    <?php// if($rowDatosProd['habilitado']==0){ ?>
                     <select  name="estadoProducto" id="estadoProducto" class="form-control" onchange="cargarP()">
                        <option value=1>Habilitado</opction>
                        <option value=0>Deshabilitado</option>
                     </select>   
                    <?php// } else { ?>
                        <select  name="estadoProducto" id="estadoProducto" class="form-control" onchange="cargarP()">
                            <option value=1>Habilitado</opction>
                        </select>
                         <input type="text" disabled="true" name="descripcion" maxlength="20" id="estadoProducto" value ="Habilitado">
                    <?php //} ?>
                </div>-->
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
             <br><br>
                <div class="row justify-content-center">
                    <p class="title center">Seleccione para editar la imagen</p>
                </div>
                <div class="row justify-content-center">
                 <a class="btn-floating mt-0 float-left" >
                 <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
                 <input type="file" name="fileToUpload" id="fileToUpload" value ="<?php echo $rowDatosProd['img'];?>">
                </a>

            <?php }else {?>

                <br><br>
                <div class="row justify-content-center">
                    <p class="title center">Seleccione una imagen</p>
                </div>
                <div class="row justify-content-center">
                    <a class="btn-floating mt-0 float-left" >
                     <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
                     <input type="file" required name="fileToUpload" id="fileToUpload" value ="<?php echo $rowDatosProd['img'];?>">
                    </a>
             <?php } ?>    
                </div>                                 
            <div class="row">
                <div class="col-sm-10">
                    <input type="submit" name="botonProductos" value="Aceptar"  class="float-right btn btn-dark" id="botonProductos"> 
                </div>
            </div>	

   
        </form>	
        </div>
    </div>
<br><br>   
