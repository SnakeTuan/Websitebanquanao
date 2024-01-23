<?php
include "header.php";
?>

<?php
$show_img = $item->show_img();
?>
<?php

if(isset($_GET['change'])){
    $change = $_GET['change'];
    $client_id = $_GET['client_id'];
    if($change == '1'){
        $change_info = $item->change_client_info($_GET, $client_id);
        echo "<script type='text/javascript'>alert('Thay đổi thông tin thành công');</script>";
    }
    else if($change == '2'){
        $pass1 = $_GET['password1'];
        $pass2 = $_GET['password2'];
        if($pass1 == $pass2){
            $change_pass = $item->change_client_pass($pass1, $client_id);
            echo "<script type='text/javascript'>alert('Đổi mật khẩu thành công');</script>";
        }
        else{
            header('Location:profile.php?wrongpass=1');
        } 
    }
}
?>
<!---------------------- Slide ảnh ở giữa ---------------------->
<section id="slider">
<div class="aspect-ratio-169">
    <?php
    if($show_img){
        while($result_show_img = $show_img->fetch_assoc()){
    ?>
    <img src="admin/uploads/main_imgs/<?php echo $result_show_img['main_img_name']; ?>">
    <?php
        }
    }
    ?>
</div>
<div class="dots">
    <div class="dot activate"></div>
    <div class="dot"></div>
    <div class="dot"></div>
</div>
</section>

<?php
include "footer.php";
?>