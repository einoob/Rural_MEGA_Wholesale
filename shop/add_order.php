<?php
	session_start();
	$file = unserialize(file_get_contents("../private/order"));
	date_default_timezone_set('Europe/Helsinki');
	$new_order = Array(
		"customer" => $_SESSION["logged_user"],
		"date" => date("d.m.Y [H:i:s]"));
	$new_order["order"] = unserialize(file_get_contents("../private/basket"));
	$file[] = $new_order;
	file_put_contents("../private/order", serialize($file));
	unlink("../private/basket");
	echo "Thank you for your order, ";
	echo $_SESSION["logged_user"] . "!";
	echo "<br><br><a href=\"index.php\">index</a>";
	echo "<br><br><a href=\"logout.php\">Log out</a>"
?>