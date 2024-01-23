<?php
include "/Xampp/htdocs/websitebanquanaodemo/admin/lib/database.php"
?>
 
<?php
class main_img
{
    
    private $db;
    
    public function __construct()
    {
        $this ->db = new Database();
    }
    
    public function insert_img($main_img_name) {
        $query = "INSERT INTO tbl_main_img (main_img_name) VALUES ('$main_img_name')";
        $result = $this -> db ->insert($query);
        return $result;
    }
    public function show_img(){
        $query = "SELECT * FROM tbl_main_img ORDER BY main_img_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    // public function get_color($color_id){
    //     $query = "SELECT * FROM tbl_color WHERE color_id = $color_id";
    //     $result = $this -> db -> select($query);
    //     return $result;
    // }
    public function update_img($main_img_id, $main_img) {
        $query = "UPDATE tbl_main_img SET main_img_name = '$main_img' WHERE main_img_id = '$main_img_id'";
        $result = $this -> db -> update($query);
        return $result;
    }
    public function delete_img($main_img_id){
        $query = "DELETE FROM tbl_main_img WHERE main_img_id = '$main_img_id'";
        $result = $this -> db -> delete($query);
        return $result;
    }
}
    
?>