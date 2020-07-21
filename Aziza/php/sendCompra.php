<?php
session_start();
	if (isset($_POST['sendTotal'])) {
		echo "Hola";
		if (isset($_SESSION["cart"])) {
			var_dump($_SESSION["cart"]);

	foreach ($_SESSION["cart"] as $key => $value) {
	?>
	<tr>
		<td><?php echo $value["item_name"];?></td>
		<td><?php echo $value["item_quantity"];?></td>
		<td>$ <?php echo $value["product_price"];?></td>
		<td>$ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>

	</tr>
	<?php
		}
		
		}		

	}
?>