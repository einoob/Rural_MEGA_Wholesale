<?php
	function check_duplicate_login($file, $login) {
		foreach($file as $acco) {
			if ($acco["login"] === $login)
			{
				return false;
			}
		}
		return true;
	}
	if ($_POST["submit"] != "OK") {
		echo "ERROR\n";
	}
	else {
		if (!file_exists("../private")) {
			mkdir("../private");
		}
		$file = Array();
		$file = unserialize(file_get_contents("../private/passwd"));
		if (strlen($_POST["passwd"]) == 0 || strlen($_POST["login"]) == 0
		|| !check_duplicate_login($file, $_POST["login"])) {
			echo "Username/password is empty or username already exists.\n ERROR\n";
		}
		else {
			$admin = $_POST["admin"] === "yes" ? true: false;
			$arr = Array(
				"login" => $_POST["login"],
				"passwd" => hash('sha512', $_POST["passwd"]),
				"admin" => $admin
			);
			$file[] = $arr;
			file_put_contents("../private/passwd", serialize($file));
			echo "OK\n";
			header("Location: index.php"); // add /shop/logged_user or smth
		}
	}
?>
