<?php
include "lib/database.php";
?>
 
<?php
class color
{
    
    private $db;
    
    public function __construct()
    {
        $this ->db = new Database();
    }
    
    public function insert_color($color_name, $color_img) {
        $query = "INSERT INTO tbl_color (color_name, color_img) VALUES ('$color_name', '$color_img')";
        $result = $this -> db ->insert($query);
        return $result;
    }
    public function show_color(){
        $query = "SELECT * FROM tbl_color ORDER BY color_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function get_color($color_id){
        $query = "SELECT * FROM tbl_color WHERE color_id = $color_id";
        $result = $this -> db -> select($query);
        return $result;
    }
    public function update_color($color_name, $color_img, $color_id) {
        $query = "UPDATE tbl_color SET color_name = '$color_name', color_img = '$color_img' WHERE color_id = '$color_id'";
        $result = $this -> db -> update($query);
        return $result;
    }
    public function delete_color($color_id){
        $query = "DELETE FROM tbl_color WHERE color_id = '$color_id'";
        $result = $this -> db -> delete($query);
        return $result;
    }
}
    
?>