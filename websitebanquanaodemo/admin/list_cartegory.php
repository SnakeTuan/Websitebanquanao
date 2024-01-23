<?php
include "header.php";
include "left_slide.php";
include "class/Cartegory_class.php"
?>

<?php
$cartegory = new cartegory;
$show = $cartegory->show_cartegory();
?>

<div class="admin-content-right">
    <div class="admin-right-list">
                <h1>Danh sách danh mục</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>DANH MỤC</th>
                        <th>TÙY CHỈNH</th>
                    </tr>
                    <?php
                    if($show){
                        $i = 1;
                        while($result = $show -> fetch_assoc()){
                    ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $result['cartegory_id'] ?></td>
                                <td><?php echo $result['cartegory_name'] ?></td>
                                <td><a href="edit_cartegory.php?cartegory_id=<?php echo $result['cartegory_id'] ?>">Sửa</a> | <a href="delete_cartegory.php?cartegory_id=<?php echo $result['cartegory_id'] ?>">Xóa</a></td>
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