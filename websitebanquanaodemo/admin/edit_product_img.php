<?php
include "header.php";
include "left_slide.php";
include "class/Product_class.php";
?>

<?php
$product = new product;
if( isset( $_GET['product_img_id'] ) || $_GET['product_img_id'] != NULL ){  // nếu tồn tại id
    $product_img_id = $_GET['product_img_id'];
}
if( isset( $_GET['product_id'] ) || $_GET['product_id'] != NULL ){  // nếu tồn tại id
    $product_id = $_GET['product_id'];
}
$get_img = $product->get_product_small_img($product_img_id);
if($get_img){
    $result = $get_img->fetch_assoc();
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
    $product->update_product_img($product_img, $product_img_id);
    header("Location:list_product_img.php?product_id=$product_id");
}
?>

<div class="admin-content-right">
            <div class="admin-right-add">
                <form action="" method="POST" enctype="multipart/form-data">
                    <h1>Ảnh phụ hiện tại</h1><br>
                    <img style="height: 40%; width: 40%;" src="uploads/products/<?php echo $result['product_img_name'] ?>" alt=""><br>
                    <br><h1>Sửa ảnh mới</h1><br>
                    <input  name="product_small_img" type="file">
                    <br><br>
                    <button type="Modify">Modify</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>