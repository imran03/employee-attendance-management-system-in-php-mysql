<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: imran
 * Date: 23/4/18
 * Time: 11:10 AM
 */

include "config.php";

class User{

    public $db;

    public function __construct(){
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if(mysqli_connect_errno()) {
            echo "Error: Could not connect to database.";
            exit;
        }
    }

    /*** for registration process ***/
    public function reg_user($name,$username,$password,$email){
//        $sql3= "select * from users";


        $password = ($password);
        $sql="SELECT * FROM users WHERE uname='$username' OR uemail='$email'";

        //checking if the username or email is available in db
        $check =  $this->db->query($sql) ;
        $count_row = $check->num_rows;

        //if the username is not in db then insert to the table
        if ($count_row == 0)
        {

            $sql1="INSERT INTO users SET uname='$username', upass='$password', fullname='$name', uemail='$email'";
            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
            return $result;
        }
        else { return false;}
    }

    /*** for login process ***/
    public function check_login($emailusername, $password){


        $sql2="SELECT uid from users WHERE uname='$emailusername' or uemail='$emailusername' and upass='$password' and status='1'";

        //checking if the username is available in the table
        $result = mysqli_query($this->db,$sql2);
        $user_data = mysqli_fetch_array($result);
        $count_row = $result->num_rows;


        if ($count_row == 1) {
            // this login var will use for the session thing
            $_SESSION['login'] = true;
            $_SESSION['uid'] = $user_data['uid'];
            return true;
        }
        else{
            return false;
        }
    }

    /*** Admin check  ***/
    public function IsAdmin($emailusername, $password){


        $sql2="SELECT uid from users WHERE uname='$emailusername' and upass='$password' and status='0'";


        //checking if the username is available in the table
        $result = mysqli_query($this->db,$sql2);
        $user_data = mysqli_fetch_array($result);
        $count_row = $result->num_rows;


        if ($count_row == 1) {
            // this login var will use for the session thing

            return true;
        }
        else{
            return false;
        }
    }

    /*** for showing the username or fullname ***/
    public function get_fullname($uid){
        $sql3="SELECT fullname FROM users WHERE uid = $uid";
        $result = mysqli_query($this->db,$sql3);
        $user_data = mysqli_fetch_array($result);
        echo $user_data['fullname'];
    }

    /*** starting the session ***/
    public function get_session(){
        return $_SESSION['login'];
    }

    public function user_logout() {
        $_SESSION['login'] = FALSE;
        session_destroy();
    }

}

/*** for editing profile information**/

