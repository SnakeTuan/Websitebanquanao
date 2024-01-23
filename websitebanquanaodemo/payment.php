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

if(isset($_GET['address'])){
    $client_address = $_GET['address'];
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
                <div class="payment-top-cart icon-border">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <div class="payment-top-shipping icon-border">
                    <i class="fa-solid fa-truck-fast"></i>
                </div>
                <div class="payment-top-money icon-border">
                    <i class="fa-solid fa-dollar-sign"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!---------------------- Trang thanh toán ---------------------->
<section class="payment">
    <div class="container">
        <div class="payment-content row">
            <div class="payment-content-left">
            <form action="success.php" method="get">
                <input type="hidden" name="bill_detail_char_id" value="<?php echo $bill_detail_char_id ?>">
                <input hidden name="sum" value="<?php echo $sum_price; ?>">
                <input hidden name="address" value="<?php echo $client_address; ?>">
                <div class="delivery-method">
                    <p style="font-weight: bold;">Phương thức giao hàng</p>
                    <div class="delivery-method-item">
                        <input type="radio" checked>
                        <label for="">Giao hàng chuyển phát nhanh</label>
                    </div>
                </div>
                <div class="payment-method">
                    <p style="font-weight: bold;">Phương thức thanh toán</p>
                    <div class="payment-method-item">
                        <input type="radio" name="method" checked>
                        <label for="">Thanh toán bằng thẻ tín dụng</label>
                    </div>
                    <div class="payment-method-item-img">
                        <img src="images/VISA.png" alt="">
                    </div>
                    <div class="payment-method-item">
                        <input type="radio" name="method">
                        <label for="">Thanh toán bằng thẻ ATM</label>
                    </div>
                    <div class="payment-method-item">
                        <input type="radio" name="method">
                        <label for="">Thanh toán khi giao hàng</label>
                    </div>
                </div>
                <div class="payment-bottom">
                    <button>TIẾP TỤC THANH TOÁN</button>
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