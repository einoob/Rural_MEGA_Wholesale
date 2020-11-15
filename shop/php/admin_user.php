<?php
    function admin_user(){
    $str = '<form action=add_product.php method=POST>
    <strong>Add new product to the shops catalog</strong><br>
    <table class=tablehomma>
    <tr><td>Procduct</td> <td><input name=product value=></td><br /></tr>
    <tr><td>Price</td> <td><input name=price value=></td><br /></tr>
    <tr><td>Categories</td> <td><input name=categories value=></td><br /></tr>
</table>
<input type=submit name=submit value=ADD />
</form>
<a href=index.php?modify=user>
    Remove users
</a><br>
<a href=index.php?modify=product>
    Remove products
</a><br>
<a href=index.php?modify=order>
    View orders
</a><br><br><a onclick="return confirm(\'Are you sure?\')" href="./install.php">Launch shop</a>';
return ($str);
    }
?>