
<?php 
    $filepath = realpath(dirname(__FILE__));
    include ($filepath.'/../lib/session.php');
    Session::checkLogin();
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helper/format.php');
    

    class Adminlogin
    {
        private $db; //database
        private $fm; //format
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function login_admin($AdminUser, $AdminPass)
        {
            $AdminUser = $this->fm->validation($AdminUser);
            $AdminPass = $this->fm->validation($AdminPass);

            $AdminUser = mysqli_real_escape_string($this->db->link, $AdminUser);
            $AdminPass = mysqli_real_escape_string($this->db->link, $AdminPass);

            if (empty($AdminUser) || empty($AdminPass)) {
                $alert = "Username and password must not be empty";
                return $alert;
            } else {
                $query = "SELECT * FROM php_admin WHERE AdminUser = '$AdminUser' AND AdminPass = '$AdminPass' LIMIT 1";
                $result = $this->db->select($query);
            }if($result != false){
                $value = $result->fetch_assoc();
                Session::set('adminlogin',true);
                Session::set('AdminId',$value['AdminID']);
                Session::set('AdminName',$value['AdminName']);
                Session::set('AdminUser',$value['AdminUser']);
                header('Location:index.php');
            }else{
                $alert = "Username and password not match";
                return $alert;
            }
        }
    }
?>
