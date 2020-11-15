<?php
    function print_products(){
		$products = unserialize(file_get_contents("../private/product"));
		$sort = preg_replace('/_/', ' ', $_GET["sort"]);
        $_SESSION["sort"] = $sort;
        
        $ret_str = "<div><strong>View by categories</strong>
		<input type=button value=\"Raw materials\" onClick=\"window.location.href='?sort=raw_materials'\">
		<input type=\"button\" value=\"Tools\" onClick=\"window.location.href='?sort=tools'\">
		<input type=\"button\" value=\"All\" onClick=\"window.location.href='?sort='\">
        </div>";
        
		if ($sort != "") {
			foreach ($products as $item) {
				if (in_array($sort, $item["categories"]))
				{
					$name = $item["name"];
					$ret_str = $ret_str . "Add <strong><span style=\"font-size: 24px;\">" . $item["name"] . "</strong></span> (" . $item["price"] . " €) <br>to your basket by clicking button below ";
					$ret_str = $ret_str .  "<form action=\"add_to_cart.php\" method=\"GET\"><input type=\"submit\" name=\"add_product\" value=\"$name\"/></form>";
				}
			}
		}
		else {
			foreach ($products as $item) {
				$name = $item["name"];
				$ret_str = $ret_str .  "Add <strong><span style=\"font-size: 24px;\">" . $item["name"] . "</strong></span> (" . $item["price"] . " €) <br>to your basket by clicking button below ";
				$ret_str = $ret_str .  "<form action=\"add_to_cart.php\" method=\"GET\"><input type=\"submit\" name=\"add_product\" value=\"$name\"/></form>";
			}
        }
        return ($ret_str);
    }
?>