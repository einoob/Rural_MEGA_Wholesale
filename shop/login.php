<?php
	function is_admin($user) {
		$file = unserialize(file_get_contents("../private/passwd"));
		foreach($file as $account) {
			if ($account["login"] == $user) {
				return ($account["admin"]);
			}
		}
		return false;
	}
	session_start();
	include("./auth.php");
	$login = $_POST["login"];
	$passwd = $_POST["passwd"];
	if (auth($login, $passwd)) {
		$_SESSION["logged_user"] = $login;
		if (is_admin($login)) {
		//	echo "you are adminaa\n";
		$_SESSION["admin"] = "admin";
			header("Location: index.php");
		}
		else {
		//	echo "you are boring normal person";
		$_SESSION["admin"] = "";
			header("Location: index.php");
		}
	}
	else {
		$_SESSION["logged_user"] = "";
		echo "Login error<br><br>";
		echo "<a href=index.php>Back to main page</a>";
	}
?>
