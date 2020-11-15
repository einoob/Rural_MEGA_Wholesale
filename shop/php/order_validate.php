<?php
    function order_validate()
    {
        if (!file_exists("../private")) {
            mkdir("../private");
        }

        $file = unserialize(file_get_contents("../private/order"));
        $basket = unserialize(file_get_contents("../private/basket"));
        $total = 0;
        $str = "<table>";
        foreach ($basket as $item) {
            $sum = $item["price"] * $item["amount"];
            $total += $sum;
            $str = $str . "<tr><td>" . $item["name"] . "</td><td>" . $item["amount"] . " x " . $item["price"] . " € </td><td>= </td><td>" . $sum . " €</td></tr>";
        }
        $str = $str . "</table><br><strong>Total cost " . $total . " € </strong>";
        $str = $str . "<br><br><a href=add_order.php>Order!</a> <br><br> <a href=php/clear_basket.php> Clear basket</a>" . "<br><br><br><a href=index.php>Go back to shopping</a>";
        return ($str);
    }
?>