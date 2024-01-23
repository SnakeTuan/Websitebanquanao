<?php
include "./admin/class/Item_class.php";
include "./admin/class/Bill_class.php";
?>

<?php
$item = new item;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/795786f108.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!---------------------- Thanh trên cùng ---------------------->

<?php
$show_cartegory = $item->show_cartegory();
?>

<header>
    <div class="logo">
        <img src="images/logo.png">
    </div>
    <div class="menu">
        <?php
        if($show_cartegory){
            while($result_show_cartegory = $show_cartegory->fetch_assoc()){
        ?>
        <li><a href="cartegory.php?cartegory_id=<?php echo $result_show_cartegory['cartegory_id']; ?>&type_id="> <?php echo $result_show_cartegory['cartegory_name']; ?> </a>
            <ul class="mini_menu">
                <?php
                $show_type = $item->show_type($result_show_cartegory['cartegory_id']);
                if($show_type){
                    while($result_show_type = $show_type->fetch_assoc()){
                ?>
                <li><a href="cartegory.php?cartegory_id=<?php echo $result_show_cartegory['cartegory_id']; ?>&type_id=<?php echo $result_show_type['type_id']; ?>"> <?php echo $result_show_type['type_name']; ?> </a></li>
                <?php
                    }
                }
                ?>
                <!-- <li><a href="">Áo</a></li>
                <li><a href="">Quần</a></li>
                <li><a href="">Khác</a></li> -->
            </ul>
        </li>
        <?php
            }
        }
        ?>
        <!-- <li><a href="">SẢN PHẨM</a>
            <ul class="mini_menu">
                <li><a href="">Áo</a></li>
                <li><a href="">Quần</a></li>
                <li><a href="">Khác</a></li>
            </ul>
        </li>
        <li><a href="">SALE</a></li>
        <li><a href="">BỘ SƯU TẬP</a></li>
        <li><a href="">THÔNG TIN</a></li> -->
    </div>
    <form action="cartegory.php" method="get" class="other">
        <input placeholder="Tìm kiếm" type="text" name="search">
        <button><i href="" class="fa-solid fa-magnifying-glass"></i></button>
        <li><a href="
        <?php
        session_start();
        if (isset($_SESSION['client_id'])){
            echo "profile.php";
        } 
        else{
            echo "login.php?profile=1";
        }
        ?>" class="fa-solid fa-user">profile</a></li>
        <li><a href="cart.php" class="fa-solid fa-cart-shopping">cart</a></li>
    </form>
    <!-- <div class="other">
        <li><input placeholder="Tìm kiếm" type="text"> <i href="" class="fa-solid fa-magnifying-glass"></i></li>
        <li><a href="login.php" class="fa-solid fa-user"></a></li>
        <li><a href="cart.php" class="fa-solid fa-cart-shopping"></a></li>
    </div> -->
</header>