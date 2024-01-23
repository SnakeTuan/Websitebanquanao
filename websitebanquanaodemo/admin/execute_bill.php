<?php
include "header.php";
include "left_slide.php";
include "class/Pending_bill_class.php";
include "class/Bill_class.php";
?>

<?php
if(isset($_GET['delete'])){
    $bill = new bill;
    $pending = new pending;
    if(isset($_GET['waiting_bill_id'])){
        $waiting_bill_id = $_GET['waiting_bill_id'];
    }
    if($_GET['delete'] == '1'){
        $delete_bill = $pending->delete_waiting_bill($waiting_bill_id);
        header('Location:list_bill.php');
    }
    $update_bill = $pending->update_waiting_bill($waiting_bill_id);
    header('Location:list_bill.php');
}
?>