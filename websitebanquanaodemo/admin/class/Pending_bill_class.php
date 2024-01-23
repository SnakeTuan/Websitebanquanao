<?php
include "lib/database.php";
?>
 
<?php
class pending
{
    
    private $db;
    
    public function __construct()
    {
        $this ->db = new Database();
    }
    
    public function insert_waiting_bill($danhmuc_ten){
        $query = "INSERT INTO tbl_cartegory (cartegory_name) VALUES ('$danhmuc_ten')";
        $result = $this ->db ->insert($query);
        header('Location:list_cartegory.php');
        return $result;   
    }
    public function show_waiting_bill(){
        $query = "SELECT * FROM tbl_waiting_bill WHERE waiting_bill_done = '0' ORDER BY waiting_bill_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_done_bill(){
        $query = "SELECT * FROM tbl_waiting_bill WHERE waiting_bill_done = '1' ORDER BY waiting_bill_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function get_waiting_bill($waiting_bill_id){
        $query = "SELECT * FROM tbl_waiting_bill WHERE waiting_bill_id = '$waiting_bill_id'";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function update_waiting_bill($waiting_bill_id) {
        $query = "UPDATE tbl_waiting_bill SET waiting_bill_done = '0' WHERE waiting_bill_id = '$waiting_bill_id'";
        $result = $this ->db ->update($query);
        return $result;
    }
    public function delete_waiting_bill($waiting_bill_id){
        $query = "DELETE FROM tbl_waiting_bill WHERE waiting_bill_id = '$waiting_bill_id'";
        $result = $this -> db ->delete($query);
        return $result;
    }
    function get_client($client_id){
        $query = "SELECT * FROM tbl_client WHERE client_id = '$client_id'";
        $result = $this -> db ->select($query);
        return $result;
    }
}
    
?>