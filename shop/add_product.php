<html>
<?php
	session_start();
	if (!file_exists("../private")) {
		mkdir("../private");
	}
	$file = unserialize(file_get_contents("../private/product"));
	$new_product = Array(
		"name" => $_POST["product"],
		"price" => floatval($_POST["price"]),
		"categories" => explode(",", $_POST["categories"])
	);
	if ($_POST["product"] != "" && $_POST["price"] != "" && $_POST["submit"] == "ADD"
	&& is_numeric($new_product["price"])) {
		$file[] = $new_product;
		file_put_contents("../private/product", serialize($file));
		echo "Product " . $new_product[name] . " added";
		echo "<br><a href=\"./index.php\">index</a>";
	}
	else {
		header("Location: http://localhost:8080/rush00/shop/admin_user.html");
	}
?>
