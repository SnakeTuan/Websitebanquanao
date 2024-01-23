<?php
include "header.php";
?>

<?php

if (isset($_SESSION['client_id'])){
    $client_id = $_SESSION['client_id'];
    $item = new item;
    $client = $item->get_client($client_id);
    $client_result = $client->fetch_assoc();
}

if(isset($_GET['bill_detail_char_id'])){
    $bill_detail_char_id = $_GET['bill_detail_char_id'];
    $bill = new bill;
    $bill_detail = $bill->show_bill_detail($bill_detail_char_id);
}

if(isset($_GET['sum'])){
    $sum_price = $_GET['sum'];
}
?>

<!---------------------- Trang giỏ hàng ---------------------->
<section class="cart">
    <div class="container">
        <div class="set-top">
            <div class="cart-top">
                <div class="delivery-top-cart icon-border">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <div class="delivery-top-shipping icon-border">
                    <i class="fa-solid fa-truck-fast"></i>
                </div>
                <div class="delivery-top-money icon-border">
                    <i class="fa-solid fa-dollar-sign"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!---------------------- Trang giao hang ---------------------->
<section class="delivery">
    <div class="container">
        <div class="delivery-content"> 
            <div class="delivery-left">

            <form action="payment.php" method="get">
                <p style="font-weight: bold;">THÔNG TIN ĐƠN HÀNG:</p><br>
                <input hidden name="sum" value="<?php echo $sum_price; ?>">
                <input type="hidden" name="bill_detail_char_id" value="<?php echo $bill_detail_char_id ?>">
                <div class="delivery-input row">
                    <div class="delivery-input-item">
                        <label for="">Họ <span style="color: red;">*</span> </label>
                        <input type="text" value="<?php echo $client_result['client_last_name']; ?>">
                    </div>
                    <div class="delivery-input-item">
                        <label for="">Tên <span style="color: red;">*</span> </label>
                        <input type="text" value="<?php echo $client_result['client_first_name']; ?>">
                    </div>
                    <div class="delivery-input-item">
                        <label for="">SĐT <span style="color: red;">*</span> </label>
                        <input type="text" value="<?php echo $client_result['client_tel']; ?>">
                    </div>
                    <div class="delivery-input-item">
                        <label for="">Email <span style="color: red;">*</span> </label>
                        <input type="text" value="<?php echo $client_result['client_email']; ?>">
                    </div>
                </div>
                <div class="delivery-long-input">
                    <label for="">Địa chỉ <span style="color: red;">*</span> </label>
                    <input required type="text" name="address">
                </div>
                <div class="delivery-bottom row">
                    <a href="">Quay lại giỏ hàng</a>
                    <button>THANH TOÁN VÀ GIAO HÀNG</button>
                </div>
            </form>

            </div>
            
            <div class="delivery-right">
                <table>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Size</th>
                        <th>Thành tiền</th>
                    </tr>
                <?php
                $sl = 0;
                $tong = 0;
                if($bill_detail){
                    while($bill_detail_result = $bill_detail->fetch_assoc()){
                        $product = $bill->get_product($bill_detail_result['product_id']);
                        $product_result = $product->fetch_assoc();
                ?>
                    <tr>
                        <td><?php echo $product_result['product_tittle']; ?></td>
                        <td><?php echo $bill_detail_result['product_quantity']; ?></td>
                        <td><?php echo $bill_detail_result['product_size']; ?></td>
                        <td><p><?php $format_num = number_format($product_result['product_price'], 0, ',', '.');
                            echo $format_num;?><sup>đ</sup></p></td>
                    </tr>
                <?php
                    $sl += 1;
                    $tong += $product_result['product_price'] * $bill_detail_result['product_quantity'];
                    }
                } 
                ?>
                    <tr>
                        <td colspan="3" style="font-weight: bold;">Tổng tiền hàng</td>
                        <td style="font-weight: bold;"><p><?php $format_num = number_format($tong, 0, ',', '.');
                            echo $format_num;?><sup>đ</sup></p></td>
                    </tr>
            
                </table>
            </div>
        </div>
    </div>
</section>

<?php
include "footer.php";
?>