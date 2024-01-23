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
$get_id = $cartegory->get_cartegory($cartegory_id);
if($get_id){
    $result = $get_id->fetch_assoc();
}
?>

<?php
// bat event POST
if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
    $cartegory_name_input = $_POST['cartegory_name_input'];
    // sửa tên danh mục 
    $update = $cartegory->update_cartegory($cartegory_name_input, $cartegory_id);
}
?>

<div class="admin-content-right">
            <div class="admin-right-add">
                <h1>Sửa danh mục</h1>
                <form action="" method="POST">
                    <input required name="cartegory_name_input" type="text" value="<?php echo $result['cartegory_name']; ?>">
                    <button type="add">Modify</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>