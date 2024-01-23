<?php
include "header.php";
include "left_slide.php";
include "class/Main_img_class.php";
?>

<!-- lấy cartegory_id -->
<?php
$img = new main_img;
if( isset( $_GET['main_img_id'] ) || $_GET['main_img_id'] != NULL ){  // nếu tồn tại id
    $main_img_id = $_GET['main_img_id'];
}
$img->delete_img($main_img_id);
header('Location:list_main_img.php');
?>