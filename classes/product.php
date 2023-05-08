<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helper/format.php');
?>
<?php
class Product
{
    private $db; //database
    private $fm; //format
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    //MySQLi//
    public function insert_pro($data, $files)
    {
        $proName = mysqli_real_escape_string($this->db->link, $data['proName']);
        $proPrice = mysqli_real_escape_string($this->db->link, $data['proPrice']);
        $proQuantity = mysqli_real_escape_string($this->db->link, $data['proQuantity']);
        $brand = mysqli_real_escape_string($this->db->link, $data['Brand']); //brand
        $category = mysqli_real_escape_string($this->db->link, $data['Category']); //category
        $proDes = mysqli_real_escape_string($this->db->link, $data['proDes']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        if ($proName == "" || $proPrice == "" || $file_name == "" || $proQuantity == "" || $category == "" || $brand == "" || $proDes == "") {
            $alert = "<span class='text-danger'>All fields must be not empty!<span>";
            return $alert;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_product(proName, proPrice, image, proQuantity, catID, brandID, proDes) VALUES ('$proName','$proPrice','$unique_image','$proQuantity','$category','$brand','$proDes')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='text-success'>Insert successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='text-danger'>Insert unsuccessfully</span>";
                return $alert;
            }
        }
    }



    public function show_pro()
    {
        $query = "SELECT tbl_product.*,tbl_category.catName, tbl_brand.brandName FROM tbl_product INNER JOIN tbl_brand ON tbl_product.brandID = tbl_brand.brandID INNER JOIN tbl_category ON tbl_product.catID = tbl_category.catID ORDER BY proID desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function getprobyID($id)
    {
        $query = "SELECT * FROM tbl_product WHERE proID = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function edit_pro($data, $files, $id)
    {
        // kêts nối bằng mysqli
        $proName = mysqli_real_escape_string($this->db->link, $data['proName']);
        $proPrice = mysqli_real_escape_string($this->db->link, $data['proPrice']);
        $proQuantity = mysqli_real_escape_string($this->db->link, $data['proQuantity']);
        $brand = mysqli_real_escape_string($this->db->link, $data['Brand']); //brand
        $category = mysqli_real_escape_string($this->db->link, $data['category']); //category
        $proDes = mysqli_real_escape_string($this->db->link, $data['proDes']);

        $permited = array('jpg', 'png', 'jpeg', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_name = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        if ($proName == "" || $brand == "" || $category == "" || $proDes == "" || $proPrice == "" || $file_name == "" || $proQuantity = "") {
            $alert = "<span class='text-danger'>All fields must not be empty<span>";
            return $alert;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "UPDATE tbl_product SET 
            proName = '$proName'
            proPrice = '$proPrice'
            image = '$unique_image'
            proQuantity = '$proQuantity'
            catID = '$category'
            brandID='$brand'
            proDes = '$proDes'
            WHERE proID = '$id'";
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class='text-success'>Edit successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='text-danger'>Edit unsuccessfully</span>";
                return $alert;
            }
        }
    }

    public function delete_pro($id)
    {
        $query = "DELETE FROM tbl_product WHERE proID = '$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='text-success'>Deleted successfully</span>";
            return $alert;
        } else {
            $alert = "<span class='text-success'>Deleted successfully</span>";
            return $alert;
        }
    }

    public function get_details($id)
    {
        $query = "

        SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 

        FROM tbl_product INNER JOIN tbl_category ON tbl_product.catID = tbl_category.catID 

        INNER JOIN tbl_brand ON tbl_product.brandID = tbl_brand.brandID WHERE tbl_product.proID = '$id'

        ";

        $result = $this->db->select($query);
        return $result;
    }

    public function getproduct_new()
    {
        $query = "SELECT * FROM tbl_product order by proID desc LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }

    public function search_product($tukhoa){
        $tukhoa = $this->fm->validation($tukhoa);
        $query = "SELECT * FROM tbl_product WHERE proName LIKE '%$tukhoa%'";
        $result = $this->db->select($query);
        return $result;

    }  

    //PDO//
    // public function insert_pro($data, $files)
    // {
    //     $proName = $data['proName'];
    //     $proPrice = $data['proPrice'];
    //     $proQuantity = $data['proQuantity'];
    //     $brand = $data['Brand'];
    //     $category = $data['Category'];
    //     $proDes = $data['proDes'];

    //     $permited = array('jpg', 'jpeg', 'png', 'gif');
    //     $file_name = $_FILES['image']['name'];
    //     $file_size = $_FILES['image']['size'];
    //     $file_temp = $_FILES['image']['tmp_name'];

    //     $div = explode('.', $file_name);
    //     $file_ext = strtolower(end($div));
    //     $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    //     $uploaded_image = "uploads/" . $unique_image;

    //     if ($proName == "" || $proPrice == "" || $file_name == "" || $proQuantity == "" || $category == "" || $brand == "" || $proDes == "") {
    //         $alert = "<span class='text-danger'>All fields must not be empty!</span>";
    //         return $alert;
    //     } else {
    //         move_uploaded_file($file_temp, $uploaded_image);
    //         $query = "INSERT INTO tbl_product(proName, proPrice, image, proQuantity, catID, brandID, proDes) VALUES (:proName, :proPrice, :image, :proQuantity, :category, :brand, :proDes)";
    //         $stmt = $this->db->prepare($query);
    //         $stmt->bindParam(':proName', $proName);
    //         $stmt->bindParam(':proPrice', $proPrice);
    //         $stmt->bindParam(':image', $unique_image);
    //         $stmt->bindParam(':proQuantity', $proQuantity);
    //         $stmt->bindParam(':category', $category);
    //         $stmt->bindParam(':brand', $brand);
    //         $stmt->bindParam(':proDes', $proDes);
    //         $result = $stmt->execute();
    //         if ($result) {
    //             $alert = "<span class='text-success'>Insert successfully</span>";
    //             return $alert;
    //         } else {
    //             $alert = "<span class='text-danger'>Insert unsuccessfully</span>";
    //             return $alert;
    //         }
    //     }
    // }
}
?>
