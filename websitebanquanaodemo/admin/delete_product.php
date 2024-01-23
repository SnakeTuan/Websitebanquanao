<?php
include "header.php";
include "left_slide.php";
include "class/Product_class.php";
?>

<!-- lấy cartegory_id -->
<?php
$product = new product;
if( isset( $_GET['product_id'] ) || $_GET['product_id'] != NULL ){  // nếu tồn tại id
    $product_id = $_GET['product_id'];
}
$delete_product = $product->delete_product($product_id);
header('Location:list_product.php');
?>