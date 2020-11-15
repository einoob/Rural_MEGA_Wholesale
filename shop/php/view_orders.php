<?php
    function view_orders(){
        if (!file_exists("../private/order")) {
            $str = "<h2>Currently no orders</h2>";
            return $str;
        }
        $str = "<h2>Current orders:<br></h2>";
        $file = unserialize(file_get_contents("../private/order"));
        foreach ($file as $action) {
            $total = 0;
            $str = $str . "customer: " . $action["customer"] . "<br> time: " . $action["date"] . "<br><br>";
            foreach ($action["order"] as $items) {
                $sum = $items["price"] * $items["amount"];
                $total += $sum;
                $str = $str . $items["name"] . " x " . $items["amount"] . " = " . $sum . "<br>"; 
            }
            $str = $str . "<strong>Total: " . $total . "</strong><hr>";
        }
        return ($str);
    }

?>
