<?php
include "lib/database.php";
?>
 
<?php
class cartegory
{
    
    private $db;
    
    public function __construct()
    {
        $this ->db = new Database();
    }
    
    public function insert_cartegory($danhmuc_ten){
        $query = "INSERT INTO tbl_cartegory (cartegory_name) VALUES ('$danhmuc_ten')";
        $result = $this ->db ->insert($query);
        header('Location:list_cartegory.php');
        return $result;   
    }
    public function show_cartegory(){
        $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function get_cartegory($danhmuc_id){
        $query = "SELECT * FROM tbl_cartegory WHERE cartegory_id = '$danhmuc_id'";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function update_cartegory($danhmuc_ten,$danhmuc_id) {
        $query = "UPDATE tbl_cartegory SET cartegory_name = '$danhmuc_ten' WHERE cartegory_id = '$danhmuc_id'";
        $result = $this ->db ->update($query);
        header('Location:list_cartegory.php');
        return $result;
    }
    public function delete_cartegory($danhmuc_id){
        $query = "DELETE  FROM tbl_cartegory WHERE cartegory_id = '$danhmuc_id'";
        $result = $this -> db ->delete($query);
        if($result) {$alert = "<span class = 'alert-style'> Delete Thành công</span> "; return $alert;}
        else {$alert = "<span class = 'alert-style'> Delete Thất bại</span>"; return $alert;}

    }
    
}
    
?>
