<?php
    function print_login_details()
    {
        $str = '<form action="login.php" name="logged.php" method="POST"></form>';
        $str = $str . '<strong>Hello</strong> ';
        $str = $str . $_SESSION['logged_user'].'<br>';
        $str = $str . '<a href="./logout.php">Log out</a>';
        return ($str);
    }
?>