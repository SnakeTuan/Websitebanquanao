<?php
$username = $_SESSION['username'];
?>
<section class="admin-content">
        <div class="admin-content-left">
            <ul>
                <li><a href="#">Xin chào: <span><?php echo $username; ?></span></a></li>
                <li><a href="#">Danh mục</a>
                    <ul>
                        <li><a href="add_cartegory.php">Thêm danh mục</a></li>
                        <li><a href="list_cartegory.php">Danh sách danh mục</a></li>        
                    </ul>
                </li>
                <li><a href="#">Loại sản phẩm</a>
                    <ul>
                        <li><a href="add_type.php">Thêm loại sản phẩm</a></li>
                        <li><a href="list_type.php">Danh sách loại sản phẩm</a></li>
                    </ul>
                </li>
                <li><a href="#">Sản phẩm</a>
                    <ul>
                        <li><a href="add_product.php">Thêm sản phẩm</a></li>
                        <li><a href="list_product.php">Danh sách sản phẩm</a></li>
                    </ul>
                </li>
                <li><a href="#">Màu sản phẩm</a>
                    <ul>
                        <li><a href="add_color.php">Thêm màu sản phẩm</a></li>
                        <li><a href="list_color.php">Danh sách màu</a></li>
                    </ul>
                </li>
                <li><a href="#">Ảnh trang đại diện</a>
                    <ul>
                        <li><a href="add_main_img.php">Thêm ảnh mới</a></li>
                        <li><a href="list_main_img.php">Danh sách ảnh</a></li>
                    </ul>
                </li>
                <li><a href="#">Đơn hàng</a>
                    <ul>
                        <li><a href="list_bill.php">Đơn đang chờ</a></li>
                        <li><a href="list_bill_done.php">Đơn đã chấp nhận</a></li>
                    </ul>
                </li>
                <li><a href="logout.php">Đăng xuất</a></li>
            </ul>
        </div>