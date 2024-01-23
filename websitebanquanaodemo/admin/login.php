<?php
include "class/Manager_class.php";
?>

<?php
$manager = new manager;
if( $_SERVER['REQUEST_METHOD'] === 'POST' ){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $manager->login($username, $password);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login form</title>
</head>
<body>
    <section class="admin_login">
        <form class="login_form" action="" method="POST">
            <h1>Đăng nhập</h1><br><br>
            <input required type="text" name="username" placeholder="Username"><br><br>
            <input required type="password" name="password" placeholder="Password"><br><br>
            <button>Đăng nhập</button>
        </form>
    </section>
</body>
</html>