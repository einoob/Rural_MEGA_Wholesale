<?php
	function auth($login, $passwd) {
		$file = unserialize(file_get_contents("../private/passwd"));
		foreach($file as $acco) {
			if ($login === $acco["login"] && hash('sha512', $passwd) === $acco["passwd"])
				return true;
		}
		return false;
	}
?>
