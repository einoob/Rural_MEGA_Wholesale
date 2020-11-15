<?php
    function basket_data() {
		session_start();
		$header = '<b>BASKET:</b><br>';
		$tail = "";

		if (!file_exists("../private/basket")){
			if (!$_SESSION['logged_user']){
				$tail = "<br>Log in to submit your order";
			}
			else{
				$tail = "<br><br> Add something to your order";
			}
			return ($header . "Items: 0 <br> Sum: 0 €" . $tail);
		}

		$amount = 0;
		$sum = 0;
		$basket = unserialize(file_get_contents("../private/basket"));
		foreach($basket as $item) {
			$amount += $item["amount"];
			$sum += $item["price"] * $item["amount"];
		}
		if ($_SESSION['logged_user']){
			$tail = '<br> <a href=index.php?order=OK>View your order</a>';
		}
		else{
			$tail = "<br>Log in to submit your order";
		}
		return ($header . "Items: " . $amount . "<br>Sum: " . $sum . " €" . $tail);
    }
?>