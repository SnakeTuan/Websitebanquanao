<?php
include "header.php";
include "left_slide.php";
include "class/Product_class.php"
?>

<?php
$product = new product;
if( isset( $_GET['product_id'] ) || $_GET['product_id'] != NULL ){  // nếu tồn tại id
    $product_id = $_GET['product_id'];
}
$get_product = $product->get_product($product_id);
if($get_product){
    $result = $get_product->fetch_assoc();
}
?>
<?php
if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
    $update_product = $product->update_product($_POST, $product_id);
}
?>

<div class="admin-content-right">
        <div class="product-add-content">
              
            <form action="" method="POST">

                <label for="">Tên sản phẩm<span style="color: red;">*</span></label> <br>
                <input required type="text" name="product_tittle" value="<?php echo $result['product_tittle'] ?>"> <br>

                <label for="">Mã sản phẩm<span style="color: red;">*</span></label> <br>
                <input required type="text" name="product_char_id" value="<?php echo $result['product_char_id'] ?>"> <br>    

                <label for="">Chọn danh mục<span style="color: red;">*</span></label> <br>
                <select required="required" name="cartegory_id" id="cartegory_id">
                    <?php
                    $get_cartegory = $product->get_cartegory($result['cartegory_id']);
                    $get_cartegory_result = $get_cartegory->fetch_assoc(); 
                    ?>
                    <option value="<?php echo $result['cartegory_id'] ?>"> <?php echo $get_cartegory_result['cartegory_name'] ?> </option> 
                    <?php
                    $show_cartegory = $product->show_cartegory();
                    if($show_cartegory){
                        while( $show_cartegory_result = $show_cartegory->fetch_assoc() ){
                    ?> 
                    <option value="<?php echo $show_cartegory_result['cartegory_id'] ?>"> <?php echo $show_cartegory_result['cartegory_name'] ?> </option>    
                    <?php
                        }
                    }   
                    ?>           
                </select>

                <label for="">Chọn Loại sản phẩm<span style="color: red;">*</span></label> <br>
                <select required="required" name="type_id" id="type_id">
                    <?php
                    $get_type = $product->get_type($result['type_id']);
                    $get_type_result = $get_type->fetch_assoc(); 
                    ?>
                    <option value="<?php echo $result['type_id'] ?>"> <?php echo $get_type_result['type_name'] ?> </option>
                    
                </select>

                <label for="">Chọn Màu sản phẩm<span style="color: red;">*</span></label> <br>
                <select required="required" name="color_id" id="">
                    <?php
                    $get_color = $product->get_color($result['color_id']);
                    $get_color_result = $get_color->fetch_assoc();
                    ?>
                    <option value="<?php echo $result['color_id'] ?>"> <?php echo $get_color_result['color_name'] ?> </option>            
                    <?php
                    $show_color = $product->show_color();
                    if($show_color){
                        while( $show_color_result = $show_color->fetch_assoc() ){
                    ?> 
                    <option value="<?php echo $show_color_result['color_id'] ?>"> <?php echo $show_color_result['color_name'] ?> </option>    
                    <?php
                        }
                    }   
                    ?>              
                </select>

                    <label for="">Giá sản phẩm<span style="color: red;">*</span></label> <br>
                    <input required type="text" name="product_price" value="<?php echo $result['product_price'] ?>"> <br>  

                    <label for="">Chi tiết<span style="color: red;">*</span></label> <br>
                    <textarea class="ckeditor" required name="product_detail" cols="60" rows="5"><?php echo $result['product_detail'] ?></textarea><br>  
                  
                    <label  for="">Bảo quản<span style="color: red;">*</span></label> <br>
                    <textarea class="ckeditor" required name="product_preserve" cols="60" rows="5"><?php echo $result['product_preserve'] ?></textarea><br> 
                  
                    <button class="admin-btn" name="submit" type="submit">Modify</button> <br><br><br>
                    <a style="font-weight: bold; font-size: 22px; border-bottom: 1px solid #333;" href="edit_product_size.php?product_id=<?php echo $product_id; ?>">Show and modify sizes</a> <br><br>
                    <a style="font-weight: bold; font-size: 22px; border-bottom: 1px solid #333;" href="list_product_img.php?product_id=<?php echo $product_id; ?>">Show and modify images</a>

            </form>

        </div>           
    </div>
</section>
<script src="script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#cartegory_id").change(function(){
            var x = $(this).val()
            $.get("ajax/add_product_ajax.php", {cartegory_id:x}, function(data){
                $("#type_id").html(data);
            })
        })
    })
</script>
</body>
</html>