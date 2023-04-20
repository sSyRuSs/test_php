<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');
?>
<?php
class Userlogin
{
    private $db; //database
    private $fm; //format
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function login_user($data)
    {
        $email = mysqli_real_escape_string($this->db->link, $data['userEmail']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['userPass']));
        if ($email == '' || $password == '') {
            $alert = "<span class='text-danger'>Password and Email must be not empty</span>";
            return $alert;
        } else {
            $check_login = "SELECT * FROM tbl_user WHERE userEmail='$email' AND userPass='$password'";
            $result_check = $this->db->select($check_login);
            if ($result_check) {
                $value = $result_check->fetch_assoc();
                Session::set('user_login', true);
                Session::set('user_id', $value['userID']);
                Session::set('user_name', $value['userName']);
                header('Location:index.php');
            } else {
                $alert = "<span class='text-danger'>Email or Password doesn't match</span>";
                return $alert;
            }
        }
    }

    public function register_user($data)
    {
        $userName = mysqli_real_escape_string($this->db->link, $data['userName']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $city = mysqli_real_escape_string($this->db->link, $data['city']);
        $country = mysqli_real_escape_string($this->db->link, $data['country']);
        $userPhone = mysqli_real_escape_string($this->db->link, $data['userPhone']);
        $userEmail = mysqli_real_escape_string($this->db->link, $data['userEmail']);
        $userPass = mysqli_real_escape_string($this->db->link, md5($data['userPass']));

        if ($userName == "" || $address == "" || $city == "" || $country == "" || $userPhone == "" || $userEmail == "" || $userPass == "") {
            $alert = "<span class='text-danger'>All fields must be not empty!<span>";
            return $alert;
        } else {
            $query = "INSERT INTO tbl_user(userName, address, city, country, userPhone, userEmail, userPass) VALUES ('$userName', '$address', '$city', '$country', '$userPhone', '$userEmail', '$userPass')";
            $result = $this->db->insert($query);
            if ($result) {
                header('Location:login.php');
                $alert = "<span class='text-success'>Insert successfully</span>";
                return $alert;
                
            } else {
                $alert = "<span class='text-danger'>Insert unsuccessfully</span>";
                return $alert;
            }
        }
    }

    public function show_user()
    {
        $query = "SELECT * FROM tbl_user order by userID desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_user($id)
    {
        $query = "DELETE FROM tbl_user WHERE userID = '$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='text-success'>Deleted successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='text-success'>Deleted successfully</span>";
            return $alert;
        }
    }

    public function update_user($data, $id)
    {
        $userName = mysqli_real_escape_string($this->db->link, $data['userName']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $city = mysqli_real_escape_string($this->db->link, $data['city']);
        $country = mysqli_real_escape_string($this->db->link, $data['country']);
        $userPhone = mysqli_real_escape_string($this->db->link, $data['userPhone']);
        $userEmail = mysqli_real_escape_string($this->db->link, $data['userEmail']);

        if ($userName == "" || $address == "" || $city == "" || $country == "" || $userPhone == "" || $userEmail == "") {
            $alert = "<span class='text-danger'>All fields must be not empty!<span>";
            return $alert;
        } else {
            $query = "UPDATE INTO tbl_user SET userName='$userName',address='$address',city='$city',country='$country',userPhone='$userPhone',userEmail='$userEmail' WHERE id ='$id'";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='text-success'>Update successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='text-danger'>Update unsuccessfully</span>";
                return $alert;
            }
        }
    }
}
?>