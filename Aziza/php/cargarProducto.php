<?php
if (isset($_REQUEST['mProducto'])) {
    $mProducto = $_REQUEST['mProducto']; 
}

  //REQUEST recupera todo
    $tipoProducto=$_REQUEST['tipoProducto'];
    $descripcion=$_REQUEST['descripcion'];
    $precio=$_REQUEST['precio'];
    $estadoProducto=$_REQUEST['estadoProducto'];
    $validarimg=$_REQUEST['validarimg'];
    
// subo el archivo al temporal del server #
$target_file = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);


//codifico el archivo a 64 bits #
$contenidoImagen = file_get_contents($target_file);
$imagen_final = base64_encode($contenidoImagen);


include "conexion.php";

if (isset($mProducto)&& (is_numeric($mProducto))) {
    // ver si tiene img cargada
        if ($imagen_final==''){
         mysqli_query($conexion, "UPDATE productos set nproducto='$descripcion', idTipo = '$tipoProducto', precio = '$precio', habilitado ='$estadoProducto' WHERE idProducto='$mProducto'  LIMIT 1"); 
        }else{
            mysqli_query($conexion, "UPDATE productos set nproducto='$descripcion', idTipo = '$tipoProducto', precio = '$precio', habilitado ='$estadoProducto', img = '$imagen_final' WHERE idProducto='$mProducto'  LIMIT 1"); 
       }
        
     header('location: ../eliminarProducto.php');
}else{
    $q = mysqli_query($conexion,"SELECT nproducto FROM productos WHERE nproducto = '$descripcion';");
 //verificamos si el user exite con un condicional
   if( mysqli_num_rows($q) == 0){
    mysqli_query($conexion, "INSERT INTO productos (idTipo,nproducto,precio,habilitado,img)VALUES('$tipoProducto','$descripcion','$precio', '$estadoProducto', '$imagen_final');");
    header('location: ../eliminarProducto.php');
   } else{
    header("Location: ../cargaProducto.php?errorProducto=productoexiste");
   }
}
mysqli_close($conexion);

// elimino archivo del tmp #
unlink($target_file);

?>