<?php
include "header.php";
include "left_slide.php";
include "class/Cartegory_type_class.php";
?>

<!-- lấy cartegory_id -->
<?php
$type = new cartegory_type;
if( isset( $_GET['type_id'] ) || $_GET['type_id'] != NULL ){  // nếu tồn tại id
    $type_id = $_GET['type_id'];
}
$get_id = $type->get_type($type_id);
if($get_id){
    $result = $get_id->fetch_assoc();
}
?>

<?php
// bat event POST
if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
    $type_name_input = $_POST['type_name_input'];
    $cartegory_id = $_POST['cartegory_id'];
    // sửa tên danh mục 
    $update = $type->update_type($type_name_input, $type_id, $cartegory_id);
}
?>

<div class="admin-content-right">
            <div class="admin-right-add">
                <form action="" method="POST">
                    <h1>Danh mục hiện tại</h1>
                    <select name="cartegory_id" id="">
                        <option value="">Chọn danh mục</option>
                        <?php
                        $show = $type->show_cartegory();
                        if($show){
                            while( $ans = $show->fetch_assoc() ){
                        ?>
                        <option <?php if($ans['cartegory_id'] == $result['cartegory_id']){ echo "selected"; } ?> value="<?php echo $ans['cartegory_id'] ?>"> 
                        <?php echo $ans['cartegory_name'] ?> </option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <br><br><br><br>
                    <h1>Tên loại sản phẩm mới</h1>
                    <input required name="type_name_input" type="text" value="<?php echo $result['type_name'] ?>">
                    <br><br>
                    <button type="add">Modify</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>