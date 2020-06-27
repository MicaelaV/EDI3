<div class="container">
    <form method="POST" action="" onSubmit="return validarForm(this)">
    <div class="row">
        <div class="col-sm-5"><input type="submit" value="Buscar" name="buscar" class="float-right"></div>
        <div class="col-sm-7"><input type="text" class="form-control  float-left" id="palabra" name="palabra"></div>
 
    </div>
    </form> 
</div>
<br>


<div class="container">
    <table class="table table-striped">
        <thead class="thead-dark">
            <th class="text-center">Descripcion</th>
            <th class="text-center">Tipo Producto</th>
            <th class="text-center">Vista Previa</th> 
            <th class="text-center">Precio</th> 
            <th class="text-center">Modificar</th>
            <th class="text-center">Eliminar</th>
        </thead>
        <tbody>
        <?php
            error_reporting(0);//Oculta Errores 
            $con = mysqli_connect("localhost","root","","aziza");
            mysqli_set_charset($con,'utf8'); 
                        
            if(isset($_POST['buscar'])) 
            {   

        //obtenemos la información introducida anteriormente desde nuestro buscador PHP
            $buscar = $_POST["palabra"];

            $sql = "SELECT * FROM productos p inner join tipoproductos tp on p.idTipo = tp.idTipo WHERE p.nproducto like '%$buscar%' or tp.descripcion like '%$buscar%'";
            $r = mysqli_query($con, $sql);
            mysqli_close($con);

        } else {
            $sql = "SELECT * FROM productos p inner join tipoproductos tp on p.idTipo = tp.idTipo";
            $r = mysqli_query($con, $sql);
            mysqli_close($con);            
        }// fin if 

            while($row = mysqli_fetch_array ($r,MYSQLI_ASSOC)){
                $idProducto = $row['idProducto'];
                ?>
                <tr>
                    <td class="text-center"><?php echo $row['nproducto'];?></td> 
                    <td class="text-center"><?php echo $row['descripcion'];?></td>
                    <td><div class="text-center"><?php $img = $row['img']; echo "<img width='50' border='0' src='data:image/jpg;base64,".$img."'>";?> </div></td>
                    <td class="text-center">$ <?php echo $row['precio'];?></td>
                    <td class="text-center"><a href="cargaProducto.php?producto=<?php echo $row['idProducto'];?>"><i class="fas fa-pen-square 3x"></i></a></td>
                    <!--Eliminar--><td class="text-center"> 
                        <?php if ($row['habilitado']==1){?>
                          <a href="#" onClick="preguntar(<?php echo $row['idProducto'];?>)"><i class="fas fa-trash 2x"></i></a>
                        <?php } ?>
                        
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>
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
        if(confirm('¿Estas Seguro de que deseas Eliminar?')){
            window.location.href = "php/eliminar.php?del="+id;
        }
    }


</script>