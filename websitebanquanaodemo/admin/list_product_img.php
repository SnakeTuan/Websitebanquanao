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
$get_product = $product->get_product($product_id);
$get_product_result = $get_product->fetch_assoc();
$get_img = $product->get_product_img($product_id);

?>

<div class="admin-content-right">
    <div class="admin-right-list">
                <h1>Danh sách ảnh sản phẩm</h1>
                <table>

                    <tr>
                        <th>LOẠI ẢNH</th>
                        <th>ẢNH</th>
                        <th>SỬA ẢNH</th>
                        <th>XÓA ẢNH</th>
                    </tr>
                    
                        <tr>
                            <td> Ảnh đại diện </td>
                            <td><img style="width: 140px; height: 200px;" src="uploads/products/<?php echo $get_product_result['product_img'] ?>" alt=""></td>
                            <td><a href="">Sửa</a></td>
                            <td><a href="#">Chỉ được sửa ảnh này</a></td>
                        </tr>
                        <tr><th><a style="font-size: 20px;" href="add_product_img.php?product_id=<?php echo $product_id ?>">Thêm ảnh phụ</a></th></tr>
                    
                    <?php
                    if($get_img){
                        while($get_img_result = $get_img->fetch_assoc()){
                    ?>
                            <tr>
                                <td> Ảnh phụ </td>
                                <td><img style="width: 140px; height: 200px;" src="uploads/products/<?php echo $get_img_result['product_img_name'] ?>" alt=""></td>
                                <td><a href="edit_product_img.php?product_img_id=<?php echo $get_img_result['product_img_id']; ?>&product_id=<?php echo $product_id ?>">Sửa</a></td>
                                <td><a href="delete_product_img.php?product_img_id=<?php echo $get_img_result['product_img_id']; ?>&product_id=<?php echo $product_id ?>">Xóa</a></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
                
            </div>
        </div>
    </section>
</body>
</html>