<?php
	function logout_shop()
	{
		session_start();
		$_SESSION["logged_user"] = "";
		unlink("../private/basket");
		echo "You have been logged out!\n";
		echo "<br><a href=\"./index.php\">index</a>";
	}
?>