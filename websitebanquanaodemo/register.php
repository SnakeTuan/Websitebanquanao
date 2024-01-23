<?php
include "./admin/class/Client_class.php";
$client = new client;
if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
    $client->insert($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <title>Đăng ký</title>
</head>
<body>
    <div class="register">
    <div class="second-container">
        <!-- <div class="step">
            <div class="line">

            </div>
            <span>Bước 1</span>
            <span>Bước 2</span>
            <span>Bước 3</span>
        </div> -->
        <form action="" method="POST">
        <div class="first-form">
            <h1>Họ tên</h1>
            <input type="text" name="client_first_name" placeholder="Tên">
            <input type="text" name="client_last_name" placeholder="Họ">
            <button type="button" id="first-next">Tiếp</button>
        </div>
        <div class="second-form">
            <h1>Thông tin liên lạc</h1>
            <input type="email" name="client_email" placeholder="Email">
            <input type="number" name="client_tel" placeholder="Số điện thoại">
            <button type="button" id="first-back">Quay lại</button>
            <button type="button" id="second-next">Tiếp tục</button>
        </div>
        <div class="third-form">
            <h1>Tạo tài khoản</h1>
            <input type="text" name="client_username" placeholder="Username">
            <input type="password" name="client_password" placeholder="Password">
            <button type="button" id="second-back">Quay lại</button>
            <button>Đăng ký</button>
        </div>
        </form>
    </div>
    </div>
<script>
    const first_next = document.querySelector('#first-next');
    const second_next = document.querySelector('#second-next');
    const first_back = document.querySelector('#first-back');
    const second_back = document.querySelector('#second-back');

    const first_form = document.querySelector('.first-form');
    const second_form = document.querySelector('.second-form');
    const third_form = document.querySelector('.third-form');

    const line = document.querySelector('.line');

    first_next.addEventListener("click", function(){
        first_form.style.left = "-600px";
        second_form.style.left = "0px";
        line.style.width = "240px";
    })
    second_next.addEventListener("click", function(){
        second_form.style.left = "-600px";
        third_form.style.left = "0px";
        line.style.width = "360px";
    })
    first_back.addEventListener("click", function(){
        first_form.style.left = "0px";
        second_form.style.left = "600px";
        line.style.width = "120px";
    })
    second_back.addEventListener("click", function(){
        second_form.style.left = "0px";
        third_form.style.left = "600px";
        line.style.width = "240px";
    })
</script>
</body>
</html> 