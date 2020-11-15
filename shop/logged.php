<?php
	function basket_data() {
		if (!file_exists("../private/basket")) {
			echo "Items: 0 <br> Sum: 0";
			return ;
		}
		$amount = 0;
		$sum = 0;
		$basket = unserialize(file_get_contents("../private/basket"));
		foreach($basket as $item) {
			$amount += $item["amount"];
			$sum += $item["price"] * $item["amount"];
		}
		echo "Items: " . $amount . "<br>Sum: " . $sum;
	}
?>

<html>
	<body>
	<div style="position: relative;">
		<?php 
		$products = unserialize(file_get_contents("../private/product"));
		foreach ($products as $item) {
			$name = $item["name"];
			echo "product: " . $item["name"] . "\tprice: " . $item["price"] . "<br><br>";
			echo "<form action=\"add_to_cart.php\" method=\"GET\"><input type=\"submit\" name=\"add_product\" value=\"$name\"/></form>";
		}
		?>
	</div>
	<div style="float: right; padding-right: 1vw;">
	<form action="login.php" name="logged.php" method="POST" style="float: right; padding-right: 1vw;">
		<strong>Hello</strong><br />
		<div>
			Random user
		</div>
		<div style="float: right; padding-right: 10vw;">
			<form action="basket.php" method="GET" style="float: right; margin-top: 10vw;">
				<p style="margin-bottom: 0px;"><strong>Basket</strong><br></p>
				<?php
					basket_data();
				?>
		</div>
	</div>

<!--MOVE THE BELOW TO ADMIN VIEW
		<div style="padding-top: 50vw; padding-left: 25vw; margin-bottom: 5vw;">
		<form action="add_product.php" method="POST" style="padding-left: 20vw;">
			<strong>Add new product to the shop's catalog</strong><br>
			<table style="margin-top: -4vw;">
			<tr><td>Procduct</td> <td><input name="product" value=""></td><br /></tr>
			<tr><td>Price</td> <td><input name="price" value=""></td><br /></tr>
			<tr><td>Categories</td> <td><input name="categories" value=""></td><br /></tr>
		</table>
		</form>
	</div>
</div>
</body></html>
-->
