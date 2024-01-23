<?php
include "header.php";
include "left_slide.php";
include "class/Cartegory_class.php"
?>

<?php
$cartegory = new cartegory;
// bat event POST
if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
    $cartegory_name_input = $_POST['cartegory_name_input'];
    // them ten danh muc vao 
    $insert = $cartegory->insert_cartegory($cartegory_name_input);
}
?>

<div class="admin-content-right">
            <div class="admin-right-add">
                <h1>Thêm danh mục</h1>
                <form action="" method="POST">
                    <input required name="cartegory_name_input" type="text" placeholder="Nhập tên danh mục">
                    <button type="add">Add</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>