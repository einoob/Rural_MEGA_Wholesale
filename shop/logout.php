<?php
	session_start();
	$_SESSION["logged_user"] = "";
	$_SESSION['admin'] = "";
	unlink("../private/basket");
	header("Location: index.php");
?>