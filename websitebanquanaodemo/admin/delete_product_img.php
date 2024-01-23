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
if( isset( $_GET['product_img_id'] ) || $_GET['product_img_id'] != NULL ){  // nếu tồn tại id
    $img_id = $_GET['product_img_id'];
}
$delete_img = $product->delete_product_img($img_id);
header("Location:list_product_img.php?product_id=$product_id");
?>