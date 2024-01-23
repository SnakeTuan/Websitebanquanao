<?php
class bill
{   
    private $db;
    public function __construct()
    {
        $this ->db = new Database();
    }
    public function insert_bill($client_id){
        $rand = 'B'.substr(md5(time()),0 , 10);
        $query = "INSERT INTO tbl_bill (client_id, bill_detail_char_id) VALUES ('$client_id', '$rand')";
        $result = $this ->db ->insert($query);
        return $result;   
    }
    public function check_bill($client_id){
        $query = "SELECT * FROM tbl_bill WHERE client_id = '$client_id' LIMIT 1";
        $result = $this -> db ->insert($query);
        if( mysqli_num_rows($result) == 0 ){
            return 0;
        }
        return 1;
    }
    public function show_bill($client_id){
        $query = "SELECT * FROM tbl_bill WHERE client_id = '$client_id' LIMIT 1";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function insert_bill_detail($bill_detail_char_id, $product_id, $product_quantity, $product_size){
        $query = "INSERT INTO tbl_bill_detail (bill_detail_char_id, product_id, product_quantity, product_size) VALUES ('$bill_detail_char_id', '$product_id', '$product_quantity', '$product_size')";
        $result = $this ->db ->insert($query);
        return $result;   
    }
    public function check_bill_detail($bill_detail_char_id, $product_id){
        $query = "SELECT * FROM tbl_bill_detail WHERE product_id = '$product_id' AND bill_detail_char_id = '$bill_detail_char_id' LIMIT 1";
        $result = $this -> db ->insert($query);
        if( mysqli_num_rows($result) == 0 ){
            return 0;
        }
        return 1;
    }
    public function get_client($username, $password){
        $query = "SELECT * FROM tbl_client WHERE client_username = '$username' 
        AND client_password = '$password' LIMIT 1";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function get_product($product_id){
        $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function update_bill_detail($bill_detail_char_id, $product_id, $product_quantity) {
        $query = "UPDATE tbl_bill_detail SET product_quantity = '$product_quantity' WHERE product_id = '$product_id' AND bill_detail_char_id = '$bill_detail_char_id'";
        $result = $this ->db ->update($query);
        return $result;
    }
    public function show_bill_detail($bill_detail_char_id){
        $query = "SELECT * FROM tbl_bill_detail WHERE bill_detail_char_id = '$bill_detail_char_id'";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function delete_bill_detail($product_id, $bill_detail_char_id){
        $query = "DELETE FROM tbl_bill_detail WHERE bill_detail_char_id = '$bill_detail_char_id' AND product_id = '$product_id'";
        $result = $this -> db ->delete($query);
        return $result;
    }
    public function insert_waiting_bill($bill_detail_char_id, $client_id, $client_address){
        $query = "INSERT INTO tbl_waiting_bill (bill_detail_char_id, client_id, client_address, waiting_bill_done) VALUES ('$bill_detail_char_id', '$client_id', '$client_address', '0')";
        $result = $this ->db ->insert($query);
        return $result;   
    }
    public function delete_bill($client_id){
        $query = "DELETE FROM tbl_bill WHERE client_id = '$client_id'";
        $result = $this -> db ->delete($query);
        return $result;
    }
    function get_client_2($client_id){
        $query = "SELECT * FROM tbl_client WHERE client_id = '$client_id'";
        $result = $this -> db ->select($query);
        return $result;
    }
    // public function show_cartegory(){
    //     $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC";
    //     $result = $this -> db ->select($query);
    //     return $result;
    // }
    // public function get_cartegory($danhmuc_id){
    //     $query = "SELECT * FROM tbl_cartegory WHERE cartegory_id = '$danhmuc_id'";
    //     $result = $this -> db ->select($query);
    //     return $result;
    // }
    // public function update_cartegory($danhmuc_ten,$danhmuc_id) {
    //     $query = "UPDATE tbl_cartegory SET cartegory_name = '$danhmuc_ten' WHERE cartegory_id = '$danhmuc_id'";
    //     $result = $this ->db ->update($query);
    //     header('Location:list_cartegory.php');
    //     return $result;
    // }
    
}
    
?>