<?php
    function modify_products(){
	$str = "<h2>Current products:</h2>";
	$file = unserialize(file_get_contents("../private/product"));
	$str = $str . "<ul>";
	foreach ($file as $product) {
			$str = $str . "<li>" . $product["name"] . " " . $product["price"] . " € </li>";
		}
    $str = $str . "</ul>";
    $str = $str . '<form action=remove_product.php method="GET">
    Product to delete <input name="product_delete" value="">
    <input type="submit" value="DELETE">
</form>';
    return ($str);
}
