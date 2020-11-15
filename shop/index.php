<html>
<head>
	<link rel="stylesheet" href="../css/styles.css">
</head>
<body>

    <div class='main'>

        <?php
            session_start();
            include("php/basket.php");
            include("php/print_products.php");
            include("php/logged.php");
            include("php/order_validate.php");
            include("php/admin_user.php");
            include("php/modify_products.php");
            include("php/modify_users.php");
            include("php/view_orders.php");

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
            $gotit = ($_GET);
            if ($_SESSION['admin'] != ""){
                add_element_to_page_with_function("main_panel", "admin_user");
                if ($gotit['modify'] == 'user'){
                    add_element_to_page_with_function("main_panel", "modify_users");
                }
                if ($gotit['modify'] == "product"){
                    add_element_to_page_with_function("main_panel", "modify_products");
                }
                if ($gotit['modify'] == "order"){
                    add_element_to_page_with_function("main_panel", "view_orders");
                }
            }
            else if ($gotit['order'] == "OK"){
                add_element_to_page_with_function("main_panel", "order_validate");
            }
            else{
                add_element_to_page_with_function("main_panel", "print_products");
            }
        ?>
    </div>