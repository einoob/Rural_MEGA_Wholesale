<?php
    function admin_user(){
    $str = '<form action=add_product.php method=POST>
    <table class=tablehomma>
    <tr><td colspan="2"><strong>Add new product to the shops catalog</strong></td></tr>
    <tr><td>Procduct</td> <td><input name=product value=></td><br /></tr>
    <tr><td>Price</td> <td><input name=price value=></td><br /></tr>
    <tr><td>Categories</td> <td><input name=categories value=></td><br /></tr>
</table>
<input type=submit name=submit value="ADD / MODIFY" />
</form>
<a href=index.php?modify=user>
    List users
</a><br>
<a href=index.php?modify=product>
    List products
</a><br>
<a href=index.php?modify=order>
    List orders
</a><br><br><a onclick="return confirm(\'Are you sure? All data will be overwritten\')" href="./install.php">Launch shop</a>';
return ($str);
    }
?>