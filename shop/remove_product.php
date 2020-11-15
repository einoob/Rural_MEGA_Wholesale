<?php
	session_start();
	$file = unserialize(file_get_contents("../private/product"));
	$todelete = $_GET["product_delete"];
	$len = count($file);
	for ($i = 0; $i <= $len; $i++) {
		if ($todelete === $file[$i]["name"])
		{
			unset($file[$i]);
			$file = array_values($file);
			file_put_contents("../private/product", serialize($file));
			header("Location: index.php?modify=product");
		}
	}
	header("Location: index.php?modify=product");
?>
