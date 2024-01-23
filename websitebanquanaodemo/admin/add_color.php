<?php
include "header.php";
include "left_slide.php";
include "class/Color_class.php";
?>

<?php
$color = new color;
// bắt event POST
if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
    $color_name = $_POST['color_name'];
    // ảnh bao gồm tên, size, dung lượng, tmp, ...
    $file_name = $_FILES['color_img']['name'];
    $file_tmp = $_FILES['color_img']['tmp_name'];
    //tách tên và đuôi ảnh ra VD anh1.png
    $divide = explode('.', $file_name);
    $file_extend = strtolower(end($divide));
    // đặt tên bất kỳ cho ảnh để ko bị trùng
    $color_img = substr(md5(time()),0 , 10).'.'.$file_extend;
    $upload_img = "uploads/colors/".$color_img;
    move_uploaded_file($file_tmp, $upload_img);
    $color->insert_color($color_name, $color_img);
    header('Location:list_color.php');
}
?>

<div class="admin-content-right">
            <div class="admin-right-add">
                <form action="" method="POST" enctype="multipart/form-data">
                    <h1>Chọn danh mục cần thêm</h1>
                    <h1>Thêm tên màu</h1>
                    <input required name="color_name" type="text" placeholder="Nhập tên màu">
                    <br><br><br><br>
                    <h1>Thêm ảnh của màu</h1>
                    <input required name="color_img" type="file">
                    <br><br>
                    <button type="add">Add</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>