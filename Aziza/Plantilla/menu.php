<div class="container">
	<nav class="navbar navbar-expand-md bg-dark">
		<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="navbar-nav">
			<li class="nav-item">
			<a class="nav-link" href="home.php">Home</a>
			</li>
			<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
				Productos
			</a>
				<ul class="dropdown-menu bg-dark">
					<li>
						<a class="trigger right-caret" href="#">Bijou</a>
						<ul class="dropdown-menu sub-menu bg-dark">
							<li><a href="productos.php?idProducto=1">Anillos</a></li>
							<li><a href="productos.php?idProducto=2">Aros</a></li>
							<li><a href="productos.php?idProducto=3">Collares</a></li>
							<li><a href="productos.php?idProducto=4">Pulseras</a></li>
						</ul>
					</li>
					<li><a href="productos.php?idProducto=5">Pa&ntilde;uelos</a></li>
					<li><a href="productos.php?idProducto=6">Mochilas</a></li>
				</ul>				        
			</li>             
			<li class="nav-item">
			<a class="nav-link" href="about-us.php">Quienes Somos</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="where.php">Donde encontrarnos</a>
			</li>			        
			<li class="nav-item">
			<a class="nav-link" href="contact.php">Contacto</a>
			</li>
<?php if(isset($_SESSION['id'])){if($idGrupo == 1){?>
	<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
				Administrador
			</a>
				<ul class="dropdown-menu bg-dark">
					<li><a href="cargaProducto.php">Cargar Producto</a></li>
					<li><a href="eliminarProducto.php">Editar Producto</a></li>
				</ul>			        
			</li>	
<?php }}?>  			       
		</ul>
		</div>  
	</nav>
</div> 		