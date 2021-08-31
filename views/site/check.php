<?php
 header('Content-type: text/html; charset= utf-8');
if (isset($_POST['sku'])) {
print("there");
$product= new Products;
$result= $product->check_sku($_POST['sku']);
return true;
?>
