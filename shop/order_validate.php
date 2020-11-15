<?php
	if (!file_exists("../private")) {
		mkdir("../private");
	}

	$file = unserialize(file_get_contents("../private/order"));
	$basket = unserialize(file_get_contents("../private/basket"));
	$total = 0;
	foreach ($basket as $item) {
		$sum = $item["price"] * $item["amount"];
		$total += $sum;
		echo $item["name"] . " " . $item["amount"] . " x " . $item["price"] . " = " . $sum . "<br>";
	}
	echo "<br><strong>Total cost " . $total . "</strong>";
	echo "<br><br><a href=\"add_order.php\">Order!</a>";
?>