<?php
	if (file_exists("../../private/basket")) {
		unlink("../../private/basket");
	}
	header("Location: ../index.php?order=OK")
?>