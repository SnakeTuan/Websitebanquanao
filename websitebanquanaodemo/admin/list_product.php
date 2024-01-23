<?php
include "header.php";
include "left_slide.php";
include "class/Product_class.php";
?>

<?php
$product = new product;
$show_product = $product->show_product();
?>

<div class="admin-content-right">
    <div class="admin-right-list">
                <h1>Danh sách danh mục</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID SP</th>
                        <th>TÊN SP</th>
                        <!-- <th>DANH MỤC</th>
                        <th>LOẠI SP</th> -->
                        <th>ẢNH SP</th>
                        <th>GIÁ SP</th>
                        <th>TÙY CHỈNH</th>
                    </tr>
                    <?php
                    if($show_product){
                        $i = 1;
                        while($result = $show_product -> fetch_assoc()){
                    ?>
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $result['product_id']; ?> </td>
                                <td> <?php echo $result['product_tittle']; ?> </td>
                                <td><img style="width: 70px; height: 100px;" src="uploads/products/<?php echo $result['product_img'] ?>" alt=""></td>
                                <td> <?php echo $result['product_price'] ?> </td>
                                <td><a href="edit_product.php?product_id=<?php echo $result['product_id']; ?>">Sửa</a> | <a href="delete_product.php?product_id=<?php echo $result['product_id']; ?>">Xóa</a></td>
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