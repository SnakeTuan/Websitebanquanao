<?php
include "header.php";
include "left_slide.php";
include "class/Main_img_class.php"
?>

<?php
$img = new main_img;
$show_img = $img->show_img();
?>

<div class="admin-content-right">
    <div class="admin-right-list">
                <h1>Danh sách danh mục</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>ẢNH</th>
                        <th>TÙY CHỈNH</th>
                    </tr>
                    <?php
                    if($show_img){
                        $i = 1;
                        while($result = $show_img -> fetch_assoc()){
                    ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $result['main_img_id'] ?></td>
                                <td><img style="width: 50%; height: 50%;" src="uploads/main_imgs/<?php echo $result['main_img_name'] ?>" alt=""></td>
                                <td><a href="edit_main_img.php?main_img_id=<?php echo $result['main_img_id'] ?>">Sửa</a> | <a href="delete_main_img.php?main_img_id=<?php echo $result['main_img_id'] ?>">Xóa</a></td>
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