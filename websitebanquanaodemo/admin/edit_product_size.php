<?php
include "header.php";
include "left_slide.php";
include "class/Product_class.php"
?>

<?php
if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
}
?>

<?php
$product = new product;
if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
    $delete_size = $product->delete_product_size($product_id);
    $update_size = $product->update_product_size($_POST);
}
?>

<div class="admin-content-right">
        <div class="product-add-content">
              
            <form action="" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

                <h1>Chọn các loại size của sản phẩm</h1><br><br>

                    <div class="sanpham-size row">
                        <p>S</p><input type="checkbox" name="product_size[]" value="S"> 
                        <p>M</p><input type="checkbox" name="product_size[]" value="M"> 
                        <p>L</p><input type="checkbox" name="product_size[]" value="L">
                        <p>XL</p><input type="checkbox" name="product_size[]" value="XL">  
                        <p>XXL</p><input type="checkbox" name="product_size[]" value="XXL">  
                    </div> 
                  
                <button class="admin-btn" name="submit" type="submit">Modify</button>  

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