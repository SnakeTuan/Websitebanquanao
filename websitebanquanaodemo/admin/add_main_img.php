<?php
include "header.php";
include "left_slide.php";
include "class/Main_img_class.php";
?>

<?php
$img = new main_img;
// bắt event POST
if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
    // ảnh bao gồm tên, size, dung lượng, tmp, ...
    $file_name = $_FILES['main_img']['name'];
    $file_tmp = $_FILES['main_img']['tmp_name'];
    //tách tên và đuôi ảnh ra VD anh1.png
    $divide = explode('.', $file_name);
    $file_extend = strtolower(end($divide));
    // đặt tên bất kỳ cho ảnh để ko bị trùng
    $main_img = substr(md5(time()),0 , 10).'.'.$file_extend;
    $upload_img = "uploads/main_imgs/".$main_img;
    move_uploaded_file($file_tmp, $upload_img);
    $img->insert_img($main_img);
    header('Location:list_main_img.php');
}
?>

<div class="admin-content-right">
            <div class="admin-right-add">
                <form action="" method="POST" enctype="multipart/form-data">
                    <h1>Chọn ảnh cần thêm (chọn 1 ảnh)</h1>
                    <br><br>
                    <input required name="main_img" type="file">
                    <br><br>
                    <button type="add">Add</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>