<?php
include "header.php";
include "left_slide.php";
include "class/Color_class.php"
?>

<?php
$color = new color;
$show_color = $color->show_color();
?>

<div class="admin-content-right">
    <div class="admin-right-list">
                <h1>Danh sách danh mục</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>DANH MỤC</th>
                        <th>ẢNH</th>
                        <th>TÙY CHỈNH</th>
                    </tr>
                    <?php
                    if($show_color){
                        $i = 1;
                        while($result = $show_color -> fetch_assoc()){
                    ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $result['color_id'] ?></td>
                                <td><?php echo $result['color_name'] ?></td>
                                <td><img src="uploads/colors/<?php echo $result['color_img'] ?>" alt=""></td>
                                <td><a href="edit_color.php?color_id=<?php echo $result['color_id'] ?>">Sửa</a> | <a href="delete_color.php?color_id=<?php echo $result['color_id'] ?>">Xóa</a></td>
                            </tr>
                    <?php
                            $i++;  
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>
</body>
</html>