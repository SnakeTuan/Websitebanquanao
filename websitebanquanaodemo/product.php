<?php
include "header.php";
?>

<?php
$item = new item;
?>

<?php
if( isset( $_GET['product_id'] ) || $_GET['product_id'] != NULL ){  // nếu tồn tại id
    $product_id = $_GET['product_id'];
}
$get_product = $item->get_product($product_id);
$product_result = $get_product->fetch_assoc();

?>

<section class="product">
    <div class="product-container">
        <div class="cartegory-top row">
                <p>Trang chủ</p> <span>&#10230;</span>
                <?php
                $find_cartegory = $item->find_cartegory($product_result['cartegory_id']);
                $find_cartegory_result = $find_cartegory->fetch_assoc();
                ?>
                <p><?php echo $find_cartegory_result['cartegory_name']; ?></p> 
                <?php
                    $find_type = $item->find_type($product_result['type_id']);
                    $find_type_result = $find_type->fetch_assoc();
                ?>
                    <span>&#10230;</span> 
                    <p><?php echo $find_type_result['type_name']; ?></p>
                    <span>&#10230;</span> <p><?php echo $product_result['product_tittle']; ?></p>
        </div>
        <div class="product-content row">
            <div class="content-left row">
                <div class="big-img">
                    <img src="admin/uploads/products/<?php echo $product_result['product_img']; ?>">
                </div>
                <div class="small-img">
                    <?php 
                    $product_img = $item->get_product_img($product_result['product_id']);
                    if($product_img){
                        while( $product_img_result = $product_img->fetch_assoc() ){
                    ?>
                        <img src="admin/uploads/products/<?php echo $product_img_result['product_img_name']; ?>">
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="content-right">
                <div class="product-name">
                    <h1><?php echo $product_result['product_tittle']; ?></h1>
                    <p>Mã sản phẩm: <?php echo $product_result['product_char_id']; ?></p>
                </div>
                <div class="product-price">
                    <p><?php
                    $format_num = number_format($product_result['product_price'], 0, ',', '.');
                    echo $format_num; 
                    ?><sup>đ</sup></p>
                </div>
                <div class="product-color">
                    <?php
                    $color = $item->get_color($product_result['color_id']);
                    $color_result = $color->fetch_assoc();
                    ?>
                    <p style="font-weight: bold;">Màu sắc: <?php echo $color_result['color_name']; ?></p>
                    <img style="border-radius: 50%;" src="admin/uploads/colors/<?php echo $color_result['color_img']; ?>">
                </div>
                <br>
                <form action="cart.php" method="get">
                <div class="product-size">
                    <div class="size">
                    <?php 
                    $size = $item->get_size($product_result['product_id']);
                    if($size){
                        while( $size_result = $size->fetch_assoc() ){
                    ?>
                        <label style="margin: 0 20px 0 20px">
                        <input required type="radio" name="product_size" value="<?php echo $size_result['product_size_value']; ?>">
                        <?php echo $size_result['product_size_value']; ?>
                        </label>
                    <?php        
                        }
                    }
                    ?>
                    </div>
                </div>
                <div style="margin-top: 20px;" class="product-quantity row">
                    <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                    <p>Số lượng:</p>
                        <input type="number" name="product_quantity" value="1" min="1">
                </div>
                <div class="product-button">
                    <button><i class="fa-solid fa-cart-arrow-down"></i><p>THÊM VÀO GIỎ HÀNG</p></button>
                    <button>MUA NGAY</button>
                </div>
                </form>
                <div class="product-discription">
                    <div class="discription-top">
                        &#8744;
                    </div>
                    <div class="discription-mid">
                        <div class="mid-tittle row">
                            <div class="tittle gioithieu">
                                <p>Giới thiệu</p>
                            </div>
                            <div class="tittle chitiet">
                                <p>Chi tiết</p>
                            </div>
                            <div class="tittle baoquan">
                                <p>Bảo quản</p>
                            </div>
                        </div>
                        <div class="mid-content">
                            <div class="mid-content-gioithieu">
                                Click vào "Chi tiết" hoặc "Bảo quản" để biết thêm thông tin về sản phẩm này.
                            </div>
                            <div class="mid-content-chitiet">
                                <?php echo $product_result['product_detail']; ?>
                            </div>
                            <div class="mid-content-baoquan">
                                <?php echo $product_result['product_preserve']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="js/script.js"></script>

<?php
include "footer.php";
?>