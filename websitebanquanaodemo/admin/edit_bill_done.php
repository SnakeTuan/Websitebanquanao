<?php
include "header.php";
include "left_slide.php";
include "class/Pending_bill_class.php";
include "class/Bill_class.php";
?>

<?php
if(isset($_GET['waiting_bill_id'])){
    $waiting_bill_id = $_GET['waiting_bill_id'];
    $bill = new bill;
    $pending = new pending;
    $get_bill = $pending->get_waiting_bill($waiting_bill_id);
    $get_bill_result = $get_bill->fetch_assoc();

    $get_client = $pending->get_client($get_bill_result['client_id']);
    $get_client_result = $get_client->fetch_assoc();

    $bill_detail = $bill->show_bill_detail($get_bill_result['bill_detail_char_id']);
}

?>

<div class="admin-content-right">
            <div class="admin-right-add">
                <h1>Thông tin đơn hàng</h1><br>
                <p>Mã đơn hàng: <?php echo $get_bill_result['bill_detail_char_id']; ?></p><br>
                <p>Tên KH: <?php echo $get_client_result['client_first_name']; ?> <?php echo $get_client_result['client_last_name']; ?></p><br>
                <p>SĐT KH: <?php echo $get_client_result['client_tel']; ?></p><br>
                <p>Địa chỉ KH: <?php echo $get_bill_result['client_address']; ?></p><br><br>
                <p>Danh sách sản phẩm: </p>
                <table style="width: 95%;">
                    <tr>
                        <th>TÊN SP</th>
                        <th>SỐ LƯỢNG</th>
                        <th>SIZE</th>
                        <th>THÀNH TIỀN</th>
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
                    $sl += $bill_detail_result['product_quantity'];
                    $tong += $product_result['product_price'] * $bill_detail_result['product_quantity'];
                    }
                } 
                ?>
                    <tr>
                        <td style="font-weight: bold;">Tổng</td>
                        <td style="font-weight: bold;"><?php echo $sl; ?></td>
                        <td></td>
                        <td style="font-weight: bold;"><p><?php $format_num = number_format($tong, 0, ',', '.');
                            echo $format_num;?><sup>đ</sup></p></td>
                    </tr>
                </table><br>
                <div style="display: flex;">
                <a href="list_bill_done.php"><button>Quay lại</button></a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>