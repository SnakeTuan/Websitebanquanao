<?php
include "header.php";
include "left_slide.php";
include "class/Cartegory_type_class.php";
?>

<?php
$type = new cartegory_type;
// bắt event POST
if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
    $cartegory_id = $_POST['cartegory_id'];
    $type_name = $_POST['cartegory_type_name'];
    // them ten danh muc vao 
    $insert = $type->insert_type($cartegory_id, $type_name);
}
?>

<div class="admin-content-right">
            <div class="admin-right-add">
                <form action="" method="POST">
                    <h1>Chọn danh mục cần thêm</h1>
                    <select name="cartegory_id" id="">
                        <option value="">Chọn danh mục</option>
                        <?php
                        $show = $type->show_cartegory();
                        if($show){
                            while( $result = $show->fetch_assoc() ){
                        ?>
                        <option value="<?php echo $result['cartegory_id'] ?>"> <?php echo $result['cartegory_name'] ?> </option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <br><br><br><br>
                    <h1>Thêm loại sản phẩm</h1>
                    <input required name="cartegory_type_name" type="text" placeholder="Nhập tên loại sản phẩm">
                    <br><br>
                    <button type="add">Add</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>