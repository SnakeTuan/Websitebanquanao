<?php
include "./admin/lib/database.php";
?>
 
<?php
class client
{
    
    private $db;
    
    public function __construct()
    {
        $this ->db = new Database();
    }
    
    public function insert($_post){
        $firstname = $_post['client_first_name'];
        $lastname = $_post['client_last_name'];
        $email = $_post['client_email'];
        $tel = $_post['client_tel'];
        $username = $_post['client_username'];
        $password = $_post['client_password'];
        $query = "INSERT INTO tbl_client (client_first_name, client_last_name, client_email, client_tel, client_username, client_password) 
        VALUES ('$firstname', '$lastname', '$email', '$tel', '$username', '$password')";
        $result = $this ->db ->insert($query);
        header('Location:login.php');
        echo "<script type='text/javascript'>alert('Incorect username or password !!!');</script>";
        return $result;   
    }

    public function login($username, $password){
        $query = "SELECT * FROM tbl_client WHERE client_username = '$username' 
        AND client_password = '$password' LIMIT 1";
        $result = $this -> db ->insert($query);
        if( mysqli_num_rows($result) == 1 ){
            session_start();
            $get_id = $this->db->select($query);
            $get_id_result = $get_id->fetch_assoc();
            $client_id = $get_id_result['client_id'];
            $_SESSION["client_id"] = "$client_id";
            $_SESSION["client_username"] = "$username";
            $_SESSION["client_password"] = "$password";
            return true;
        }
        else{
            echo "<script type='text/javascript'>alert('Incorect username or password !!!');</script>";
        }
        return false;
    }
    
}
    
?>