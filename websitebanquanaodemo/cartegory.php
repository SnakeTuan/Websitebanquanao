<?php
include "header.php";
?>

<?php
$item = new item;
?>

<?php
$show_cartegory = $item->show_cartegory();
?>

<?php
$cartegory_id = "";
if( isset( $_GET['cartegory_id'] )){  // nếu tồn tại id
    $cartegory_id = $_GET['cartegory_id'];
}
$type_id = "";
if( isset( $_GET['type_id'] )){  // nếu tồn tại id
    $type_id = $_GET['type_id'];
}
?>

<?php
if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}
?>

<?php
if(isset($_GET['search'])){
    $search = $_GET['search'];
?>
<section class="cartegory">
    <div class="cart-container">
            <div class="cartegory-top row">
                <p>Trang chủ</p> <span>&#10230;</span> <p>Tìm kiếm</p> <span>&#10230;</span> <p><?php echo $search; ?></p>
            </div>
    </div>
    <div class="cart-container">
        <div class="row">
            <div class="cartegory-left"> 
                <!-- <ul>
                    <li class="left-list block"> <a href="#">Sản Phẩm</a>
                        <ul>
                            <li><a href="">Áo</a></li>
                            <li><a href="">Quần</a></li>
                            <li><a href="">Khác</a></li>
                        </ul>
                    </li>
                    <li class="left-list"><a href="#">Sale</a></li>
                    <li class="left-list"><a href="#">Bộ sưu tập</a></li>
                </ul> -->
            </div>
            <div class="cartegory-right">
                <div class="row">
                <div class="right-list">
                    <p> Kết quả tìm kiếm cho "<?php echo $search; ?>"</p>
                </div>
                <div class="right-list">
                    <?php
                    if(isset($_GET['sort'])){
                    if($_GET['sort'] == 'lowprice'){
                    ?>  
                    <p>Sắp xếp theo giá giảm dần</p>  
                    <?php    
                    }
                    else if($_GET['sort'] == 'highprice'){
                    ?>    
                    <p>Sắp xếp theo giá tăng dần</p>
                    <?php
                    }
                    else{
                    ?>    
                    <p>Sắp xếp từ A - Z</p>
                    <?php
                    }
                    }
                    ?>
                </div>
                <div class="right-list">
                    <select onchange="window.location=this.value">
                        <option>Sắp xếp</option>
                        <option value="cartegory.php?sort=lowprice&search=<?php echo $search; ?>">Giá cao đến thấp</option>
                        <option value="cartegory.php?sort=highprice&search=<?php echo $search; ?>">Giá thấp đến cao</option>
                        <option value="cartegory.php?sort=name&search=<?php echo $search; ?>">A - Z</option>
                    </select>
                    
                </div>
                </div>                   
                <div class="cartegory-content row">
                    <?php
                    $i = 0;
                        if(isset($_GET['sort'])){
                            if($_GET['sort'] == 'lowprice'){
                                $product_cart = $item->find_product_by_search_lowprice($search);
                            }
                            else if($_GET['sort'] == 'highprice'){
                                $product_cart = $item->find_product_by_search_highprice($search);
                            }
                            else{
                                $product_cart = $item->find_product_by_search_name($search);
                            }
                        }
                        else{
                            $product_cart = $item->find_product_by_search($search);
                        }
                        if($product_cart){
                            while($product_cart_result = $product_cart->fetch_assoc()){
                            $i++;
                    ?>
                            <div class="content-item">
                            <a href="product.php?product_id=<?php echo $product_cart_result['product_id']; ?>">
                            <img src="admin/uploads/products/<?php echo $product_cart_result['product_img']; ?>">
                            <h1><?php echo $product_cart_result['product_tittle']; ?></h1>
                            <p><?php 
                            $format_num = number_format($product_cart_result['product_price'], 0, ',', '.');
                            echo $format_num; 
                            ?><sup>đ</sup></p>
                            </a>    
                            </div>                    
                    <?php
                            }
                        }
                    ?>
                    <!-- <div class="content-item">
                        <img src="images/anh_3.jpg">
                        <h1>Áo hoodie trắng</h1>
                        <p>100.000<sup>đ</sup></p>
                    </div> -->
                </div> 
                <div class="content-bottom row">
                    <div class="content-bottom-item">
                        <p>Đang hiển thị <span>|</span> <?php echo $i; ?> Sản phẩm</p>
                    </div>
                    <div class="content-bottom-item">
                        <p> <span>&#171;</span>1  2  3  4  5<span>&#187;</span>Trang cuối</p>
                    </div>
                </div>        
            </div>
        </div>
    </div>
</section>
<?php
}
else{
?>
<section class="cartegory">
    <div class="cart-container">
            <div class="cartegory-top row">
                <p>Trang chủ</p> <span>&#10230;</span>
                <?php
                $find_cartegory = $item->find_cartegory($cartegory_id);
                $find_cartegory_result = $find_cartegory->fetch_assoc();
                ?>
                <p><?php echo $find_cartegory_result['cartegory_name']; ?></p> 
                <?php
                if($type_id != ""){
                    $find_type = $item->find_type($type_id);
                    $find_type_result = $find_type->fetch_assoc();
                ?>
                    <span>&#10230;</span> 
                    <p><?php echo $find_type_result['type_name']; ?></p>
                <?php
                }
                ?>
            </div>
    </div>
    <div class="cart-container">
        <div class="row">
            <div class="cartegory-left"> 
                <ul>
                <?php
                if($show_cartegory){
                    while($result_show_cartegory = $show_cartegory->fetch_assoc()){
                ?>
                    <li class="left-list"> <a href="#"> 
                    <?php echo $result_show_cartegory['cartegory_name']; ?> </a>
                        <ul>
                    <?php
                    $show_type = $item->show_type($result_show_cartegory['cartegory_id']);
                    if($show_type){
                        while($result_show_type = $show_type->fetch_assoc()){
                    ?>
                        <li><a href="cartegory.php?cartegory_id=<?php echo $result_show_cartegory['cartegory_id']; ?>&type_id=<?php echo $result_show_type['type_id']; ?>"> 
                        <?php echo $result_show_type['type_name']; ?> </a></li>
                    <?php
                        }
                    }
                    ?>
                        </ul>
                    </li> 
                <?php
                    }
                }
                ?>
                </ul>
                <!-- <ul>
                    <li class="left-list block"> <a href="#">Sản Phẩm</a>
                        <ul>
                            <li><a href="">Áo</a></li>
                            <li><a href="">Quần</a></li>
                            <li><a href="">Khác</a></li>
                        </ul>
                    </li>
                    <li class="left-list"><a href="#">Sale</a></li>
                    <li class="left-list"><a href="#">Bộ sưu tập</a></li>
                </ul> -->
            </div>
            <div class="cartegory-right">
                <div class="row">
                <div class="right-list">
                    <p><?php echo $find_cartegory_result['cartegory_name']; ?></p>
                </div>
                <div class="right-list">
                    <?php
                    if(isset($_GET['sort'])){
                    if($_GET['sort'] == 'lowprice'){
                    ?>  
                    <p>Sắp xếp theo giá giảm dần</p>  
                    <?php    
                    }
                    else if($_GET['sort'] == 'highprice'){
                    ?>    
                    <p>Sắp xếp theo giá tăng dần</p>
                    <?php
                    }
                    else{
                    ?>    
                    <p>Sắp xếp từ A - Z</p>
                    <?php
                    }
                    }
                    ?>
                </div>
                <div class="right-list">
                    <select onchange="window.location=this.value">
                        <option>Sắp xếp</option>
                        <option value="cartegory.php?sort=lowprice&cartegory_id=<?php echo $cartegory_id; ?>&type_id=<?php echo $type_id; ?>">Giá cao đến thấp</option>
                        <option value="cartegory.php?sort=highprice&cartegory_id=<?php echo $cartegory_id; ?>&type_id=<?php echo $type_id; ?>">Giá thấp đến cao</option>
                        <option value="cartegory.php?sort=name&cartegory_id=<?php echo $cartegory_id; ?>&type_id=<?php echo $type_id; ?>">A - Z</option>
                    </select>
                    
                </div>
                </div>                   
                <div class="cartegory-content row">
                    <?php
                    $i = 0;
                    if($type_id == ""){
                        if(isset($_GET['sort'])){
                            if($_GET['sort'] == 'lowprice'){
                                $product_cart = $item->find_product_by_cartegory_lowprice($find_cartegory_result['cartegory_id']);
                            }
                            else if($_GET['sort'] == 'highprice'){
                                $product_cart = $item->find_product_by_cartegory_highprice($find_cartegory_result['cartegory_id']);
                            }
                            else{
                                $product_cart = $item->find_product_by_cartegory_name($find_cartegory_result['cartegory_id']);
                            }
                        }
                        else{
                            $product_cart = $item->find_product_by_cartegory($find_cartegory_result['cartegory_id']);
                        }
                        if($product_cart){
                            while($product_cart_result = $product_cart->fetch_assoc()){
                            $i++;
                    ?>
                            <div class="content-item">
                            <a href="product.php?product_id=<?php echo $product_cart_result['product_id']; ?>">
                            <img src="admin/uploads/products/<?php echo $product_cart_result['product_img']; ?>">
                            <h1><?php echo $product_cart_result['product_tittle']; ?></h1>
                            <p><?php 
                            $format_num = number_format($product_cart_result['product_price'], 0, ',', '.');
                            echo $format_num; 
                            ?><sup>đ</sup></p>
                            </a>    
                            </div>                    
                    <?php
                            }
                        }
                    }
                    else{
                        if(isset($_GET['sort'])){
                            if($_GET['sort'] == 'lowprice'){
                                $product_type = $item->find_product_by_type_lowprice($find_type_result['type_id']);
                            }
                            else if($_GET['sort'] == 'highprice'){
                                $product_type = $item->find_product_by_type_highprice($find_type_result['type_id']);
                            }
                            else{
                                $product_type = $item->find_product_by_type_name($find_type_result['type_id']);
                            }
                        }
                        else{
                            $product_type = $item->find_product_by_type($find_type_result['type_id']);
                        }
                        if($product_type){
                            while($product_type_result = $product_type->fetch_assoc()){
                            $i++;
                    ?>
                            <div class="content-item">
                            <a href="product.php?product_id=<?php echo $product_type_result['product_id']; ?>">
                            <img src="admin/uploads/products/<?php echo $product_type_result['product_img']; ?>">
                            <h1><?php echo $product_type_result['product_tittle']; ?></h1>
                            <p><?php
                            $format_num = number_format($product_type_result['product_price'], 0, ',', '.');
                            echo $format_num;
                            ?><sup>đ</sup></p>
                            </a>
                            </div>                    
                    <?php
                            }
                        }
                    }
                    ?>
                    <!-- <div class="content-item">
                        <img src="images/anh_3.jpg">
                        <h1>Áo hoodie trắng</h1>
                        <p>100.000<sup>đ</sup></p>
                    </div> -->
                </div> 
                <div class="content-bottom row">
                    <div class="content-bottom-item">
                        <p>Đang hiển thị <span>|</span> <?php echo $i; ?> Sản phẩm</p>
                    </div>
                    <div class="content-bottom-item">
                        <p> <span>&#171;</span>1  2  3  4  5<span>&#187;</span>Trang cuối</p>
                    </div>
                </div>        
            </div>
        </div>
    </div>
</section>
<?php
}
?>
<script src="js/script.js"></script>
<?php
include "footer.php";
?>