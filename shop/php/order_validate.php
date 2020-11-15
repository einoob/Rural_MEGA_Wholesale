<?php
    function order_validate()
    {
        if (!file_exists("../private")) {
            mkdir("../private");
        }

        $file = unserialize(file_get_contents("../private/order"));
        $basket = unserialize(file_get_contents("../private/basket"));
        $total = 0;
        $str = "";
        foreach ($basket as $item) {
            $sum = $item["price"] * $item["amount"];
            $total += $sum;
            $str = $str . $item["name"] . " " . $item["amount"] . " x " . $item["price"] . " = " . $sum . "<br>";
        }
        $str = $str . "<br><strong>Total cost " . $total . "</strong>";
        $str = $str . "<br><br><a href=add_order.php>Order!</a>" . "<br><br><a href=index.php>got back to shopping</a>";
        return ($str);
    }
?>