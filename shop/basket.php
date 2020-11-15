<?php
	function get_basket_id($user) {
		$file = unserialize(file_get_contents("../private/basket"));
		foreach($file as $account) {
			if ($account["login"] === $user) {
				return ($account["basket_id"]);
			}
		}
		return (-1);
	}
	session_start();
	if ($_SESSION["logged_user"] != "") {
		$_SESSION["basket_id"] = get_basket_id($_SESSION["logged_user"]);
	}
	else {
		$_SESSION["basket_id"] = -1;
	}
	$basket = Array(
		"user" => $_SESSION["logged_user"],
		"id" => $_SESSION["basket_id"],
		"items" => Array(),
		"sum" => 0
	);
	if (file_exists("../private")) {
		mkdir("../private/");
	}
	$file = unserialize(file_get_contents("../private/basket"));
?>
