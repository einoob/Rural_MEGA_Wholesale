<?php
    session_start();
	if (!$_SESSION['admin']){
		header("Location: index.php");
	}
?>

<html>
<head>
	<link rel="stylesheet" href="../css/styles.css">
</head>
<body>

    <div class='main'>

        <?php

            include("php/basket.php");
            include("php/print_products.php");
            include("php/logged.php");
            include("php/order_validate.php");
            include("php/admin_user.php");

            function add_element_to_page_with_function($class_var, $passed_fun)
            {
                echo '<div class="'.$class_var.'">'.$passed_fun().'</div>';
            }

            function add_element_to_page($class_var, $file_name, $elem)
            {
                if (!$elem)
                    $file = file_get_contents("$file_name");
                else if (!$file_name)
                    $file = $elem;
                echo '<div class="'.$class_var.'">'.$file.'</div>';
            }

            echo '<div class="side_panel">';
            if (!$_SESSION['admin']){
                add_element_to_page_with_function("login", "basket_data");
            }
            echo '</div>';

            add_element_to_page("header", "html/header.html", "");
            //add_element_to_page("");
            
//            $_SESSION['logged_user'] = "";
//            $_SESSION['logged_user'] = "seppo";
            if ($_SESSION['logged_user'])
            {
                add_element_to_page("vip", "html/vip.html", "");
                echo '<div class="side_panel">';
                add_element_to_page_with_function("login", "print_login_details");
                echo '</div>';
            }
            else
            {
                add_element_to_page("loser", "html/loser.html", "");
                add_element_to_page("shop", "shop.html", "");
                echo '<div class="side_panel">';
                add_element_to_page("login", "html/login.html", "");
                add_element_to_page("create", "html/create2.html", "");
                echo '</div>';
            }
            
            add_element_to_page("main_panel", "html/main_panel.html", "");



	echo "<h2>Current users:</h2>";
	$file = unserialize(file_get_contents("../private/passwd"));
	echo "<ul>";
	foreach ($file as $account) {
		if ($account["admin"] == false) {
			echo "<li>" . $account["login"] . "</li>";
		}
	}
	echo "</ul>"
?>


		<form action="remove_user.php" method="GET">
			User to delete: <input name="user_delete" value="">
			<input type="submit" value="DELETE">
		</form>
		<a href="./index.php">index</a><br>
