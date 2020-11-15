<?php
	if (file_exists("../private/basket")) {
		unlink("../private/basket");
	}
	if (file_exists("../private/product")) {
		unlink("../private/product");
	}
	if (file_exists("../private/order")) {
		unlink("../private/order");
	}
	$init_products[] = Array(
		"name" => "broad bean",
		"price" => 250,
		"categories" => ["raw materials", "foods", "fodder"]
	);
	$init_products[] = Array(
		"name" => "combine harvester",
		"price" => 90000,
		"categories" => ["vehicles", "tools"]
	);
	$init_products[] = Array(
		"name" => "silo",
		"price" => 20000,
		"categories" => ["buildings", "tools"]
	);
	$init_products[] = Array(
		"name" => "pine",
		"price" => 60,
		"categories" => ["raw materials", "woods"]
	);
	$init_products[] = Array(
		"name" => "spruce",
		"price" => 55,
		"categories" => ["raw materials", "woods"]
	);
	$file = $init_products;
	file_put_contents("../private/product", serialize($file));
	echo "<strong>Shop initialization done!</strong>";
	echo "<br><br><a href=\"./index.php\">index</a>";
	echo "<br><br><a href=\"./logout.php\">Log out</a>";
?>