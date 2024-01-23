<?php
include "header.php";
include "left_slide.php";
include "class/Cartegory_type_class.php"
?>

<!-- lấy cartegory_id -->
<?php
$type = new cartegory_type;
if( isset( $_GET['type_id'] ) || $_GET['type_id'] != NULL ){  // nếu tồn tại id
    $type_id = $_GET['type_id'];
}
$delete_type = $type->delete_type($type_id);
header('Location:list_type.php');
?>