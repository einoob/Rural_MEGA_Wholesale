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
	$len = count($file);
	for($i = 0; $i <= $len; $i++) {
		if ($new_product["name"] === $file[$i]["name"]) {
			unset($file[$i]);
			$file = array_values($file);
		}
	}
	if ($_POST["product"] != "" && $_POST["price"] != "" && $_POST["submit"] == "ADD / MODIFY"
	&& is_numeric($new_product["price"])) {
		$file[] = $new_product;
		file_put_contents("../private/product", serialize($file));
	}
	header("Location: index.php?modify=product");
?>
