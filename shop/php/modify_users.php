<?php
    function modify_users()
    {
        $str = "<h2>Current users:</h2>";
        $file = unserialize(file_get_contents("../private/passwd"));
        $str = $str . "<ul>";
        foreach ($file as $account) {
            if ($account["admin"] == false) {
                $str = $str . "<li>" . $account["login"] . "</li>";
            }
        }
        $str = $str . "</ul>";
        $str = $str . '<form action="remove_user.php" method="GET">
        User to modify: <input name="user_delete" value="">
        <input type="submit" value="DELETE">
        </form>';
        return ($str);
    }
?>