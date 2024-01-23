<?php
include "header.php";
include "left_slide.php";
include "class/Cartegory_class.php"
?>

<!-- lấy cartegory_id -->
<?php
$cartegory = new cartegory;
if( isset( $_GET['cartegory_id'] ) || $_GET['cartegory_id'] != NULL ){  // nếu tồn tại id
    $cartegory_id = $_GET['cartegory_id'];
}
$delete_cartegory = $cartegory->delete_cartegory($cartegory_id);
header('Location:list_cartegory.php');
?>