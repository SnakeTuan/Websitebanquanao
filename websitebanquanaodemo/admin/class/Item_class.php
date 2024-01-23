<?php
include "./admin/lib/database.php";
?>
 
<?php
class item
{
    
    private $db;
    
    public function __construct()
    {
        $this ->db = new Database();
    }
    
    public function show_img(){
        $query = "SELECT * FROM tbl_main_img ORDER BY main_img_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_cartegory(){
        $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function find_cartegory($cartegory_id){
        $query = "SELECT * FROM tbl_cartegory WHERE cartegory_id = '$cartegory_id'";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_type($cartegory_id){
        $query = "SELECT * FROM tbl_type WHERE cartegory_id = '$cartegory_id' ORDER BY type_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function find_type($type_id){
        $query = "SELECT * FROM tbl_type WHERE type_id = '$type_id'";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function find_product_by_cartegory($cartegory_id){
        $query = "SELECT * FROM tbl_product WHERE cartegory_id = '$cartegory_id' ORDER BY product_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function find_product_by_cartegory_lowprice($cartegory_id){
        $query = "SELECT * FROM tbl_product WHERE cartegory_id = '$cartegory_id' ORDER BY product_price DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function find_product_by_cartegory_highprice($cartegory_id){
        $query = "SELECT * FROM tbl_product WHERE cartegory_id = '$cartegory_id' ORDER BY product_price ASC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function find_product_by_cartegory_name($cartegory_id){
        $query = "SELECT * FROM tbl_product WHERE cartegory_id = '$cartegory_id' ORDER BY product_tittle ASC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function find_product_by_type($type_id){
        $query = "SELECT * FROM tbl_product WHERE type_id = '$type_id' ORDER BY product_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function find_product_by_type_lowprice($type_id){
        $query = "SELECT * FROM tbl_product WHERE type_id = '$type_id' ORDER BY product_price DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function find_product_by_type_highprice($type_id){
        $query = "SELECT * FROM tbl_product WHERE type_id = '$type_id' ORDER BY product_price ASC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function find_product_by_type_name($type_id){
        $query = "SELECT * FROM tbl_product WHERE type_id = '$type_id' ORDER BY product_tittle ASC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function find_product_by_search($search){
        $query = "SELECT * FROM tbl_product WHERE product_tittle LIKE '%$search%' ORDER BY product_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function find_product_by_search_lowprice($search){
        $query = "SELECT * FROM tbl_product WHERE product_tittle LIKE '%$search%' ORDER BY product_price DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function find_product_by_search_highprice($search){
        $query = "SELECT * FROM tbl_product WHERE product_tittle LIKE '%$search%' ORDER BY product_price ASC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function find_product_by_search_name($search){
        $query = "SELECT * FROM tbl_product WHERE product_tittle LIKE '%$search%' ORDER BY product_price ASC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function get_product($product_id){
        $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function get_product_img($product_id){
        $query = "SELECT * FROM tbl_product_img WHERE product_id = '$product_id'";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function get_color($color_id){
        $query = "SELECT * FROM tbl_color WHERE color_id = '$color_id'";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function get_size($product_id){
        $query = "SELECT * FROM tbl_product_size WHERE product_id = '$product_id'";
        $result = $this -> db ->select($query);
        return $result;
    }
    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
    function get_client($client_id){
        $query = "SELECT * FROM tbl_client WHERE client_id = '$client_id'";
        $result = $this -> db ->select($query);
        return $result;
    }
    function change_client_pass($client_pass, $client_id){
        $query = "UPDATE tbl_client SET client_password = '$client_pass' WHERE client_id = '$client_id'";
        $result = $this ->db ->update($query);
        return $result;
    }
    function change_client_info($_get, $client_id){
        $first_name = $_get['client_first_name'];
        $last_name = $_get['client_last_name'];
        $email = $_get['client_email'];
        $tel = $_get['client_tel'];
        $query = "UPDATE tbl_client SET client_first_name = '$first_name', 
        client_last_name = '$last_name', client_email = '$email', client_tel = '$tel' WHERE client_id = '$client_id'";
        $result = $this ->db ->update($query);
        return $result;
    }
}
    
?>
