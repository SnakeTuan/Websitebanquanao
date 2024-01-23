<?php
include "header.php";
include "left_slide.php";
include "class/Product_class.php"
?>

<?php
$product = new product;
if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
    $insert_product = $product->insert_product($_POST, $_FILES);
}
?>

<div class="admin-content-right">
        <div class="product-add-content">
              
            <form action="" method="POST" enctype="multipart/form-data">

                <label for="">Tên sản phẩm<span style="color: red;">*</span></label> <br>
                <input required type="text" name="product_tittle"> <br>

                <label for="">Mã sản phẩm<span style="color: red;">*</span></label> <br>
                <input required type="text" name="product_char_id"> <br>    

                <label for="">Chọn danh mục<span style="color: red;">*</span></label> <br>
                <select required="required" name="cartegory_id" id="cartegory_id">
                    <option value="">Chọn danh mục</option> 
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
                    <option value="">Chọn loại sản phẩm</option>
                    
                </select>

                <label for="">Chọn Màu sản phẩm<span style="color: red;">*</span></label> <br>
                <select required="required" name="color_id" id="">
                    <option value="">Chọn màu</option>            
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

                <label for="">Chọn Size sản phẩm<span style="color: red;">*</span></label> <br>
                    <div class="sanpham-size row">
                        <p>S</p><input type="checkbox" name="product_size[]" value="S"> 
                        <p>M</p><input type="checkbox" name="product_size[]" value="M"> 
                        <p>L</p><input type="checkbox" name="product_size[]" value="L">
                        <p>XL</p><input type="checkbox" name="product_size[]" value="XL">  
                        <p>XXL</p><input type="checkbox" name="product_size[]" value="XXL">  
                    </div>

                    <label for="">Giá sản phẩm<span style="color: red;">*</span></label> <br>
                    <input required type="text" name="product_price"> <br>  

                    <label for="">Chi tiết<span style="color: red;">*</span></label> <br>
                    <textarea class="ckeditor"  required name="product_detail" cols="60" rows="5"></textarea><br>  
                  
                    <label  for="">Bảo quản<span style="color: red;">*</span></label> <br>
                    <textarea class="ckeditor" required name="product_preserve" cols="60" rows="5"></textarea><br> 
                  
                    <label for="">Ảnh đại diện<span style="color: red;">*</span></label> <br>
                    <input required type="file" name="product_img"> <br>   
                  
                    <label for="">Ảnh Sản phẩm<span style="color: red;">*</span></label> <br>
                     <input required type="file" multiple  name="product_imgs[]"> <br>   
                  
                     <button class="admin-btn" name="submit" type="submit">Add</button>  

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