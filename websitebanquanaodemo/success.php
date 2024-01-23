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

$bill = new bill;
if(isset($_GET['bill_detail_char_id'])){
    $bill_detail_char_id = $_GET['bill_detail_char_id'];
    $bill_detail = $bill->show_bill_detail($bill_detail_char_id);
}

if(isset($_GET['address'])){
    $client_address = $_GET['address'];
}

if(isset($_GET['sum'])){
    $sum_price = $_GET['sum'];
}

$waiting_bill = $bill->insert_waiting_bill($bill_detail_char_id, $client_id, $client_address);
$delete_cart = $bill->delete_bill($client_id);
?>

<section class="success">
    <div class="success-img">
        <img src="./admin/uploads/others/tich_xanh.png" alt="" srcset="">
    </div>
    <p>ĐẶT HÀNG THÀNH CÔNG</p>
    <div class="success-content">
    <div class="success-left">
        <p>Họ:</p>
        <p>Tên:</p>
        <p>Email:</p>
        <p>SĐT:</p>
        <p>Địa chỉ:</p>
        <p>Số tiền:</p>
    </div>
    <div class="success-right">
        <p><?php echo $client_result['client_last_name']; ?></p>
        <p><?php echo $client_result['client_first_name']; ?></p>
        <p><?php echo $client_result['client_email']; ?></p>
        <p><?php echo $client_result['client_tel']; ?></p>
        <p><?php echo $client_address; ?></p>
        <p><?php $format_num = number_format($sum_price, 0, ',', '.');
                            echo $format_num;?><sup>đ</sup></p>
    </div>
    </div>
    <div style="justify-content: center;" class="delivery-bottom row">
        <a href="index.php"><button>QUAY VỀ TRANG CHỦ</button></a>
    </div>
</section>

<?php
include "footer.php";
?>