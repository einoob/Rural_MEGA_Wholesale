<?php
	session_start();
	echo "jojoasdasdopo\n";
	$file = unserialize(file_get_contents("../private/product"));
	echo "<ul>";
	foreach ($file as $product) {
			echo "<li>" . $product["name"] . " " . $product["price"] . " € </li>";
		}
	echo "</ul>"
?>

<html>
	<body>
		<form action="remove_product.php" method="GET">
			Product to delete <input name="product_delete" value="">
			<input type="submit" value="DELETE">
		</form>
		<a href="./index.php">index</a>
	</body>
</html>