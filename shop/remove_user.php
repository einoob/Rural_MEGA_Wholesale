<?php
	session_start();
	$file = unserialize(file_get_contents("../private/passwd"));
	$todelete = $_GET["user_delete"];
	$len = count($file);
	for ($i = 0; $i <= $len; $i++) {
		if ($todelete === $file[$i]["login"])
		{
			unset($file[$i]);
			$file = array_values($file);
			file_put_contents("../private/passwd", serialize($file));
			header("Location: index.php");
		}
	}
	header("Location: index.php?modify=user");
?>