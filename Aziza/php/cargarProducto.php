<?php
if (isset($_REQUEST['mProducto'])) {
    $mProducto = $_REQUEST['mProducto']; 
    echo "idProducto".$mProducto;
}

    //echo 'Valor MODIF: '.$mProducto;
  //REQUEST recupera todo
    $tipoProducto=$_REQUEST['tipoProducto'];
    $descripcion=$_REQUEST['descripcion'];
    $precio=$_REQUEST['precio'];
    $estadoProducto=$_REQUEST['estadoProducto'];
    //var_dump($$); exit();
    
// subo el archivo al temporal del server #
$target_file = basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);


//codifico el archivo a 64 bits #
$contenidoImagen = file_get_contents($target_file);
$imagen_final = base64_encode($contenidoImagen);


$con = mysqli_connect("localhost","root","","aziza");

if (isset($mProducto)&& (is_numeric($mProducto))) {
    // echo "UPDATE";      
    mysqli_query($con, "UPDATE productos set nproducto='$descripcion', idTipo = '$tipoProducto', precio = '$precio', habilitado ='$estadoProducto' WHERE idProducto='$mProducto' LIMIT 1"); //WHERE idProducto='$mProducto'"  
}else{
    // echo "INSERT";

    mysqli_query($con, "INSERT INTO productos (idTipo,nproducto,precio,habilitado,img)VALUES('$tipoProducto','$descripcion','$precio', '$estadoProducto', '$imagen_final');");
}
mysqli_close($con);


// elimino archivo del tmp #
unlink($target_file);
header('location: ../eliminarProducto.php');
?>
