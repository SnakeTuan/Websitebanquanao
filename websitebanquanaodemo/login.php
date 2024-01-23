<?php
include "./admin/class/Client_class.php";
?>

<?php
$client = new client;
if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login = $client->login($username, $password);
    if($login == true){
        if(isset($_GET['profile'])){
            header('Location:profile.php'); 
        }
        else{
            header('Location:cart.php');
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Đăng nhập</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-form">
            <h1>Đăng nhập</h1>
            <div class="form-text">
                <input required type="text" name="username" placeholder="Username" >
            </div>
            <div class="form-text">
                <input required type="password" name="password" placeholder="Password" >
            </div>
            <button>Đăng nhập</button>
            <span>Bạn chưa có tài khoản? <a href="register.php">Đăng ký ngay</a></span>
        </form>
    </div>
</body>
</html>