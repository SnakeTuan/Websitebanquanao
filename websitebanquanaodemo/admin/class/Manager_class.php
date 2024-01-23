<?php
include "lib/database.php";
?>
 
<?php
class manager
{
    
    private $db;
    
    public function __construct()
    {
        $this ->db = new Database();
    }
    
    public function login($username, $password){
        $query = "SELECT * FROM tbl_manager WHERE manager_username = '$username' 
        AND manager_password = '$password' LIMIT 1";
        $result = $this -> db ->insert($query);
        if( mysqli_num_rows($result) == 1 ){
            session_start();
            $_SESSION["username"] = "$username";
            $_SESSION["password"] = "$password";
            header('Location:index.php');
        }
        else{
            echo "<script type='text/javascript'>alert('Incorect username or password !!!');</script>";
        }
        return $result;
    }
}
    
?>