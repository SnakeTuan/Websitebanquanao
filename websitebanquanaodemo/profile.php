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

if(isset($_GET['wrongpass'])){
    echo "<script type='text/javascript'>alert('2 mật khẩu không trùng nhau');</script>";   
}
?>

<section class="success">
    <div class="success-img">
        <img src="./admin/uploads/others/profile.jpg" alt="" srcset="">
    </div>
    <p>CHỈNH SỬA THÔNG TIN</p>
    <form action="index.php" method="get">
    <input type="hidden" name="change" value="1">
    <input type="hidden" name="client_id" value="<?php echo $client_id; ?>">
    <div class="success-content">
    <div class="success-left">
        <p>Họ:</p>
        <p>Tên:</p>
        <p>Email:</p>
        <p>SĐT:</p>
    </div>
    <div class="success-right">
        <p><input type="text" name="client_last_name" value="<?php echo $client_result['client_last_name']; ?>"></p>
        <p><input type="text" name="client_first_name" value="<?php echo $client_result['client_first_name']; ?>"></p>
        <p><input type="text" name="client_email" value="<?php echo $client_result['client_email']; ?>"></p>
        <p><input type="text" name="client_tel" value="<?php echo $client_result['client_tel']; ?>"></p>
    </div>
    </div>
    <div style="justify-content: center;" class="delivery-bottom row">
        <a style="margin-right: 60px;" href="index.php"><button>QUAY VỀ</button></a>
        <a><button>LƯU THAY ĐỔI</button></a>
    </div>
    </form>
    <p style="margin-top: 50px;">ĐỔI MẬT KHẨU</p>
    <form action="index.php" method="get">
    <input type="hidden" name="change" value="2">
    <input type="hidden" name="client_id" value="<?php echo $client_id; ?>">
    <div class="success-content">
    <div class="success-left">
        <p>Nhập mật khẩu mới:</p>
        <p>Nhập lại mật khẩu mới:</p>
    </div>
    <div class="success-right">
        <p><input type="password" name="password1"></p>
        <p><input type="password" name="password2"></p>
    </div>
    </div>
    <div style="justify-content: center;" class="delivery-bottom row">
        <a><button>ĐỔI MẬT KHẨU</button></a>
    </div>
    </form>
</section>

<?php
include "footer.php";
?>