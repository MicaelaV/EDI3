<link rel="stylesheet" href="pluggins/sweetalert2.min.css"> 
<div class="container">
    <form method="POST" action="" onSubmit="return validarForm(this)">
        <div class="row">
            <div class="col-8"><input type="text" class="form-control float-left" id="palabra" name="palabra"></div>
            <div class="col-4"><input type="submit" value="Buscar" name="buscar" class="float-left btn btn-dark"></div>
        </div>
    </form> 
</div>
<br>


<div class="container">
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <th class="text-center">Descripcion</th>
                <th class="text-center">Tipo Producto</th>
                <th class="text-center">Vista Previa</th> 
                <th class="text-center">Precio</th> 
                <th class="text-center">Modificar</th>
                <th class="text-center">Deshabilitar</th>
            </thead>
            <tbody>
            <?php
                //error_reporting(0);//Oculta Errores 
                include "php/conexion.php";
                            
                if(isset($_POST['buscar'])) 
                {   

                //obtenemos la información introducida anteriormente desde el buscador PHP
                $buscar = $_POST["palabra"];

                $sql = "SELECT * FROM productos p inner join tipoproductos tp on p.idTipo = tp.idTipo WHERE p.nproducto like '%$buscar%' or tp.descripcion like '%$buscar%'";
                $r = mysqli_query($conexion, $sql);
                mysqli_close($conexion);

            } else {
                $sql = "SELECT * FROM productos p inner join tipoproductos tp on p.idTipo = tp.idTipo";
                $r = mysqli_query($conexion, $sql);
                mysqli_close($conexion);            
            }// fin if 

                while($row = mysqli_fetch_array ($r,MYSQLI_ASSOC)){
                    $idProducto = $row['idProducto'];
                    ?>
                    <tr>
                        <td class="text-center text-capitalize"><?php echo $row['nproducto'];?></td> 
                        <td class="text-center text-capitalize"><?php echo $row['descripcion'];?></td>
                        <td><div class="text-center"><?php $img = $row['img']; echo "<img width='50' border='0' src='data:image/jpg;base64,".$img."'>";?> </div></td>
                        <td class="text-center">$ <?php echo $row['precio'];?></td>
                        <td class="text-center"><a href="cargaProducto.php?producto=<?php echo $row['idProducto'];?>"><i class="fas fa-pen-square 3x"></i></a></td>
                        <td class="text-center"> 
                            <!--Eliminar-->
                            <?php if ($row['habilitado']==1){?>
                            <a href="#" onClick="preguntar(<?php echo $row['idProducto'];?>)"><i class="fas fa-trash 2x"></i></a>
                            <?php } ?>                            
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>    
    </div>
</div>

<script>
    function validarForm(formulario) 
    {
        if(formulario.palabra.value.length==0) 
        { //¿Tiene 0 caracteres?
            formulario.palabra.focus();  // Damos el foco al control
            alert('Debes rellenar este campo'); //Mostramos el mensaje
            return false; 
         } //devolvemos el foco  
         return true; //Si ha llegado hasta aquí, es que todo es correcto 
     }   

    function preguntar(id){
        // if(confirm('¿Estas Seguro de que deseas Eliminar?')){
        //     window.location.href = "php/eliminar.php?del="+id;
        // }
                Swal.fire({
                        title: "¿Estas Seguro de que deseas Eliminar?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: "Confirmar",
                        cancelButtonText: "Cancelar",
                    })
                    .then(resultado => {
                        if (resultado.value) {
                            // Hicieron click en "Sí"
                            window.location.href = "php/eliminar.php?del="+id;
                        } 
                    });
   }
    
</script>
  <script src="pluggins/sweetalert2.min.js"></script>