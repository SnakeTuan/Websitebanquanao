<?php
include "header.php";
include "left_slide.php";
include "class/Color_class.php"
?>

<!-- lấy cartegory_id -->
<?php
$color = new color;
if( isset( $_GET['color_id'] ) || $_GET['color_id'] != NULL ){  // nếu tồn tại id
    $color_id = $_GET['color_id'];
}
$delete_color = $color->delete_color($color_id);
header('Location:list_color.php');
?>