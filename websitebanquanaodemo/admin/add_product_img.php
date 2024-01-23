<?php
include "header.php";
include "left_slide.php";
include "class/Product_class.php";
?>

<?php
$product = new product;
if( isset( $_GET['product_id'] ) || $_GET['product_id'] != NULL ){  // nếu tồn tại id
    $product_id = $_GET['product_id'];
}
?>
<?php
// bắt event POST
if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
    $file_name = $_FILES['product_small_img']['name'];
    $file_tmp = $_FILES['product_small_img']['tmp_name'];
    $divide = explode('.', $file_name);
    $file_extend = strtolower(end($divide));
    $product_img = substr(md5(time()),0 , 10).'.'.$file_extend;
    $upload_img = "uploads/products/".$product_img;
    move_uploaded_file($file_tmp, $upload_img);
    $product->insert_product_img($product_img, $product_id);
    header("Location:list_product_img.php?product_id=$product_id");
}
?>

<div class="admin-content-right">
            <div class="admin-right-add">
                <form action="" method="POST" enctype="multipart/form-data">
                    <h1>Thêm mới ảnh phụ</h1><br>
                    <input  name="product_small_img" type="file">
                    <br><br>
                    <button type="Modify">Add</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>