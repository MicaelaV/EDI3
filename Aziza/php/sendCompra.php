<?php
session_start();
	if (isset($_POST['sendTotal'])) {
		echo "Hola";
		var_dump($_SESSION["cart"]);
		unset($_SESSION["cart"]);
		
	}
?>