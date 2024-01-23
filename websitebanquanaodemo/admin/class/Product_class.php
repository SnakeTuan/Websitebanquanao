<?php
include "lib/database.php";
?>
 
<?php
class product
{
    
    private $db;
    
    public function __construct()
    {
        $this ->db = new Database();
    }
    
    public function insert_product($_post, $_files){
        // lay du lieu
        $product_tittle = $_post['product_tittle'];
        $product_char_id = $_post['product_char_id'];
        $cartegory_id = $_post['cartegory_id'];
        $type_id = $_post['type_id'];
        $color_id = $_post['color_id'];
        $product_price = $_post['product_price'];
        $product_detail = $_post['product_detail'];
        $product_preserve = $_post['product_preserve'];
        // anh dai dien
        $file_name = $_files['product_img']['name'];
        $file_tmp = $_files['product_img']['tmp_name'];
        $upload_img = "uploads/products/".$file_name;
        move_uploaded_file($file_tmp, $upload_img);
        // anh mo ta
        $file_names = $_files['product_imgs']['name'];
        $file_tmps = $_files['product_imgs']['tmp_name'];

        // insert
        $query = "INSERT INTO tbl_product (product_tittle, product_char_id, cartegory_id, 
        type_id, color_id, product_price, product_detail, product_preserve, product_img) 
        VALUES ('$product_tittle' ,'$product_char_id', '$cartegory_id', '$type_id', '$color_id', 
        '$product_price', '$product_detail', '$product_preserve', '$file_name')";
        $result = $this->db->insert($query);
        if($result){
            $query = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 1";
            $result = $this->db->select($query)->fetch_assoc();
            $product_id = $result['product_id'];
            foreach($file_names as $key => $element){
                move_uploaded_file( $file_tmps[$key], "uploads/products/".$element );
                $query = "INSERT INTO tbl_product_img (product_id, product_img_name)
                VALUES ('$product_id', '$element')";
                $result = $this->db->insert($query);
            }
            $product_sizes = $_post['product_size'];
            foreach($product_sizes as $key => $element){
                $query = "INSERT INTO tbl_product_size (product_id, product_size_value)
                VALUES ('$product_id', '$element')";
                $result = $this->db->insert($query);
            }
        }
        header('Location:list_product.php');
        return $result;
    }
    public function show_product(){
        $query = "SELECT * FROM tbl_product ORDER BY product_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_type_ajax($cartegory_id){
        $query = "SELECT * FROM tbl_type WHERE cartegory_id = $cartegory_id ORDER BY type_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function get_product($product_id){
        $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id'";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function get_cartegory($cartegory_id){
        $query = "SELECT * FROM tbl_cartegory WHERE cartegory_id = '$cartegory_id'";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_cartegory(){
        $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function get_type($type_id){
        $query = "SELECT * FROM tbl_type WHERE type_id = '$type_id'";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function get_color($color_id){
        $query = "SELECT * FROM tbl_color WHERE color_id = '$color_id'";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function get_product_img($product_id){
        $query = "SELECT * FROM tbl_product_img WHERE product_id = '$product_id'";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function get_product_small_img($product_img_id){
        $query = "SELECT * FROM tbl_product_img WHERE product_img_id = '$product_img_id'";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function show_color(){
        $query = "SELECT * FROM tbl_color ORDER BY color_id DESC";
        $result = $this -> db ->select($query);
        return $result;
    }
    public function update_product($_post, $product_id) {
        $product_tittle = $_post['product_tittle'];
        $product_char_id = $_post['product_char_id'];
        $cartegory_id = $_post['cartegory_id'];
        $type_id = $_post['type_id'];
        $color_id = $_post['color_id'];
        $product_price = $_post['product_price'];
        $product_detail = $_post['product_detail'];
        $product_preserve = $_post['product_preserve'];
        $query = "UPDATE tbl_product SET product_tittle = '$product_tittle', product_char_id = '$product_char_id',  
        cartegory_id = '$cartegory_id', type_id = '$type_id', color_id = '$color_id',  
        product_price = '$product_price', product_detail = '$product_detail', product_preserve = '$product_preserve' WHERE product_id = '$product_id'";
        $result = $this ->db ->update($query);
        header('Location:list_product.php');
        return $result;
    }
    public function update_product_img($product_img, $product_img_id){
        $query = "UPDATE tbl_product_img SET product_img_name = '$product_img'
        WHERE product_img_id = '$product_img_id'";
        $result = $this -> db ->update($query);
        header('Location:list_product_img.php');
        return $result;
    }
    public function insert_product_img($product_img, $product_id) {
        $query = "INSERT INTO tbl_product_img (product_img_name, product_id) VALUES ('$product_img', '$product_id')";
        $result = $this -> db ->insert($query);
        return $result;
    }
    public function delete_product($product_id){
        $query = "DELETE  FROM tbl_product WHERE product_id = '$product_id'";
        $result = $this -> db ->delete($query);
        header('Location:list_product.php');
        return $result;
    }
    public function delete_product_img($img_id){
        $query = "DELETE FROM tbl_product_img WHERE product_img_id = '$img_id'";
        $result = $this -> db ->delete($query);
        return $result;
    }
    public function delete_product_size($product_id){
        $query = "DELETE FROM tbl_product_size WHERE product_id = '$product_id'";
        $result = $this -> db ->delete($query);
        return $result;
    }
    public function update_product_size($_post){
        $product_id = $_post['product_id'];
        $product_sizes = $_post['product_size'];
        foreach($product_sizes as $key => $element){
            $query = "INSERT INTO tbl_product_size (product_id, product_size_value)
            VALUES ('$product_id', '$element')";
            $result = $this->db->insert($query);
        }
        header('Location:list_product.php');
        return $result;
    }
}
?>