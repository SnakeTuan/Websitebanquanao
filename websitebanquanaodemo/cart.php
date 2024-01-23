<?php
include "header.php";
?>

<?php

if (isset($_SESSION['client_id'])){
    $client_id = $_SESSION['client_id'];
    // $tmp = $_SESSION['client_username'];
    // echo $tmp;
    if( isset( $_GET['product_id'] )){  // nếu tồn tại id
        if(isset($_GET['product_size'])){
            $product_size = $_GET['product_size'];
        }
        $product_id = $_GET['product_id'];
        $bill = new bill;

        $tmp = $bill->check_bill($client_id);
        // echo $tmp;
        if($tmp == 0){
            $bill->insert_bill($client_id);
        }
        $show_bill = $bill->show_bill($client_id);
        $show_bill_result = $show_bill->fetch_assoc();
        $bill_detail_char_id = $show_bill_result['bill_detail_char_id'];

        if( isset($_GET['product_quantity'])){
            $product_quantity = $_GET['product_quantity'];

            $tmp2 = $bill->check_bill_detail($bill_detail_char_id, $product_id);
            if( $tmp2 == 0 ){
                $bill->insert_bill_detail($bill_detail_char_id, $product_id, $product_quantity, $product_size);
            }
            else{
                $bill->update_bill_detail($bill_detail_char_id, $product_id, $product_quantity);
            }
        }

        if( isset( $_GET['bill_detail_char_id'] ) ){
            $char_id = $_GET['bill_detail_char_id'];
            $bill->delete_bill_detail($product_id, $char_id);
        }
    }
    else{
        $bill = new bill;
        $show_bill = $bill->show_bill($client_id);
        if($show_bill){
            $show_bill_result = $show_bill->fetch_assoc();
            $bill_detail_char_id = $show_bill_result['bill_detail_char_id'];
        }
        else{
            $bill_detail_char_id = "";
        }
        
    }
}
else{
    header('Location:login.php?cart=1'); 
}
?>

<section class="cart">
    <div class="container">
        <div class="set-top">
            <div class="cart-top">
                <div class="cart-top-cart icon-border">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <div class="cart-top-shipping icon-border">
                    <i class="fa-solid fa-truck-fast"></i>
                </div>
                <div class="cart-top-money icon-border">
                    <i class="fa-solid fa-dollar-sign"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="cart-content row">
            <div class="cart-content-left">
                <table>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Màu</th>
                        <th>Size</th>
                        <th>SL</th>
                        <th>Giá tiền</th>
                        <th>Xóa</th>
                    </tr>
                    <?php
                    $sl = 0;
                    $tong = 0;
                    if($bill_detail_char_id != ""){
                        $show_bill_detail = $bill->show_bill_detail($bill_detail_char_id);
                    
                    if($show_bill_detail){
                    while($show_bill_detail_result = $show_bill_detail->fetch_assoc()){
                        $product = $bill->get_product($show_bill_detail_result['product_id']);
                        $product_result = $product->fetch_assoc();
                    ?>
                    <tr>
                        <td><img src="admin/uploads/products/<?php echo $product_result['product_img']; ?>" alt=""></td>
                        <td><p><?php echo $product_result['product_tittle']; ?></p></td>
                        <td><p><?php
                            $item = new item;
                            $color = $item->get_color($product_result['color_id']);
                            if($color){
                                $color_result = $color->fetch_assoc();
                                echo $color_result['color_name'];
                            }
                        ?></p></td>
                        <td><p><?php echo $show_bill_detail_result['product_size']; ?></p></td>
                        <td>
                            <a href="cart.php?product_id=<?php echo $product_result['product_id']; ?>&product_quantity=<?php $tmp = $show_bill_detail_result['product_quantity']; $tmp = $tmp + 1; echo $tmp; ?>"><button style="margin-bottom: 10px; height: 20px; width: 20px;">+</button></a>
                            <p><?php echo $show_bill_detail_result['product_quantity']; ?></p>
                            <a href="cart.php?product_id=<?php echo $product_result['product_id']; ?>&product_quantity=<?php $tmp = $show_bill_detail_result['product_quantity']; $tmp = $tmp - 1; echo $tmp; ?>"><button style="margin-top: 10px; height: 20px; width: 20px;">-</button></a>
                        </td>
                        <td><p><?php $format_num = number_format($product_result['product_price'], 0, ',', '.');
                            echo $format_num;?>
                        <sup>đ</sup></p></td>
                        <td><a href="cart.php?product_id=<?php echo $product_result['product_id']; ?>&bill_detail_char_id=<?php echo $show_bill_detail_result['bill_detail_char_id']; ?>"><i style="cursor: pointer;" class="fa-solid fa-eraser"></i></a></td>
                    </tr>
                    <?php
                    $tong += $product_result['product_price'] * $show_bill_detail_result['product_quantity'];
                    $sl += $show_bill_detail_result['product_quantity'];      
                    }
                    }
                    }
                    ?>
                </table>
            </div>
            <div class="cart-content-right">
                <table>
                    <tr>
                        <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
                    </tr>
                    <tr>
                        <td>TỔNG SẢN PHẨM</td>
                        <td><?php echo $sl; ?></td>
                    </tr>
                    <tr>
                        <td>TỔNG TIỀN</td>
                        <td><p><?php $format_num = number_format($tong, 0, ',', '.');
                            echo $format_num;?>
                            <sup>đ</sup></p></td>
                    </tr>
                    <tr>
                        <td>TẠM TÍNH</td>
                        <td><p style="font-weight: bold;"><?php $format_num = number_format($tong, 0, ',', '.');
                            echo $format_num;?><sup>đ</sup></p></td>
                    </tr>
                </table>
                <div class="cart-right-button">
                    <a href="cartegory.php?cartegory_id=7&type_id=#"><button>TIẾP TỤC MUA SẮM</button></a>
                    <a href="delivery.php?sum=<?php echo $tong; ?>&bill_detail_char_id=<?php echo $show_bill_result['bill_detail_char_id']; ?>"><button>THANH TOÁN</button></a>
                </div>                
            </div>
        </div>
    </div>

<?php
include "footer.php";
?>