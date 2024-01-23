<?php
include "../class/Product_class.php";
include "../lib/database.php";
?>

<?php
$product = new product;
$cartegory_id = $_GET['cartegory_id'];
?>

<?php
$show_type_ajax = $product->show_type_ajax($cartegory_id);
if($show_type_ajax){
    while($show_type_result = $show_type_ajax->fetch_assoc()){
?>
<option value="<?php echo $show_type_result['type_id'] ?>"> <?php echo $show_type_result['type_name'] ?> </option>
<?php
    }
}
?>