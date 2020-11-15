<?php
	session_start();
	function add_new($new_item) {
		$catalog = unserialize(file_get_contents("../private/product"));
		foreach ($catalog as $product) {
			if ($new_item === $product["name"]) {
				$arr = $product;
				$arr["amount"] = 1;
				return ($arr);
			}
		}
	}
	$file = unserialize(file_get_contents("../private/basket"));
	$new_product = $_GET["add_product"];

	if ($_SESSION['sort']){
		if ($_SESSION[sort] == "raw materials"){
			$location = "index.php?sort=raw_materials";
		}
		else{
			$location = "index.php?sort=" . $_SESSION['sort'];
		}
	}
	else{
		$location = "index.php";
	}
	foreach($file as &$item) {
		if ($item["name"] === $new_product) {
			$item["amount"] += 1;
			file_put_contents("../private/basket", serialize($file));
			header("Location: $location");
			return ;
		}
	}
	$arr = add_new($new_product);
	$file[] = $arr;
	file_put_contents("../private/basket", serialize($file));
	header("Location: $location");
?>