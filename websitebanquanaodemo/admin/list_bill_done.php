<?php
include "header.php";
include "left_slide.php";
include "class/Pending_bill_class.php";
include "class/Bill_class.php";
?>

<?php
$pending = new pending;
$bill = new bill;
$show = $pending->show_done_bill();
?>

<div class="admin-content-right">
    <div class="admin-right-list">
                <h1>Danh sách đơn hàng đang chờ</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>TÊN KH</th>
                        <th>SĐT</th>
                        <th>ĐỊA CHỈ</th>
                        <th>TÙY CHỈNH</th>
                    </tr>
                    <?php
                    if($show){
                        $i = 1;
                        while($result = $show -> fetch_assoc()){
                            $client = $bill->get_client_2($result['client_id']);
                            $client_result = $client->fetch_assoc();
                    ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $client_result['client_first_name']; echo $client_result['client_last_name'];  ?></td>
                                <td><?php echo $client_result['client_tel']; ?></td>
                                <td><?php echo $result['client_address']; ?></td>
                                <td><a href="edit_bill_done.php?waiting_bill_id=<?php echo $result['waiting_bill_id']; ?>">Chi tiết</a></td>
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