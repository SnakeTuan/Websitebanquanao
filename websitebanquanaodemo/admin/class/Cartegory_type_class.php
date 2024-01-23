<?php
include "lib/database.php";
?>
 
<?php
class cartegory_type
{
    
    private $db;
    
    public function __construct()
    {
        $this ->db = new Database();
    }
    
    public function insert_type($danhmuc_id, $ten_loaisanpham){
        $query = "INSERT INTO tbl_type (cartegory_id, type_name) VALUES ('$danhmuc_id', '$ten_loaisanpham')";
        $result = $this ->db ->insert($query);
        header('Location:list_type.php');
        return $result;   
    }
    public function show_cartegory(){
        $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_type(){
        // $query = "SELECT * FROM tbl_type ORDER BY type_id DESC";
        // $result = $this -> db ->select($query);
        // return $result;
        $query = " SELECT tbl_type.*, tbl_cartegory.cartegory_name
        FROM tbl_type INNER JOIN tbl_cartegory ON tbl_type.cartegory_id = tbl_cartegory.cartegory_id
        ORDER BY tbl_cartegory.cartegory_id DESC ";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_type($type_id){
        $query = "SELECT * FROM tbl_type WHERE type_id = '$type_id'";
        $result = $this -> db -> select($query);
        return $result;
    }
    public function update_type($type_name, $type_id, $cartegory_id) {
        $query = "UPDATE tbl_type SET type_name = '$type_name', cartegory_id = '$cartegory_id' WHERE type_id = '$type_id'";
        $result = $this -> db -> update($query);
        header('Location:list_type.php');
        return $result;
    }
    public function delete_type($type_id){
        $query = "DELETE FROM tbl_type WHERE type_id = '$type_id'";
        $result = $this -> db -> delete($query);
        return $result;
    }
    
}
    
?>