<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helper/format.php');
?>
<?php
    class Brand
    {
        private $db; //database
        private $fm; //format
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_brand($brandName)
        {
            $brandName = $this->fm->validation($brandName);

            $brandName = mysqli_real_escape_string($this->db->link, $brandName);

            if (empty($brandName)) {
                $alert = "<span class='text-danger'>brand name must not be empty<span>";
                return $alert;
            } else {
                $query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName') ";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span class='text-success'>Insert successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='text-danger'>Insert unsuccessfully</span>";
                    return $alert;
                }
            }
        }

        public function show_brand(){
            $query = "SELECT * FROM tbl_brand order by brandID desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function getbrandbyID($id){
            $query = "SELECT * FROM tbl_brand WHERE brandID = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function edit_brand($brandName, $id){
            $brandName = $this->fm->validation($brandName);
            $brandName = mysqli_real_escape_string($this->db->link, $brandName);
            $id = mysqli_real_escape_string($this->db->link, $id);

            if (empty($brandName)) {
                $alert = "<span class='text-danger'>brand name must not be empty<span>";
                return $alert;
            } else {
                $query = "UPDATE tbl_brand SET brandName = '$brandName' WHERE brandID = '$id'";
                $result = $this->db->update($query);
                if($result){
                    $alert = "<span class='text-success'>Edit successfully</span>";
                    return $alert;
                }else{
                    $alert = "<span class='text-danger'>Edit unsuccessfully</span>";
                    return $alert;
                }
            }
        }

        public function delete_brand($id){
            $query = "  DELETE FROM tbl_brand WHERE brandID = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='text-success'>Deleted successfully</span>";
                return $alert;
            }else{
                $alert = "<span class='text-success'>Deleted successfully</span>";
                return $alert;
            }
        }

        public function show_brand_fontend(){
			$query = "SELECT * FROM tbl_brand order by brandID desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_product_by_brand($id){
			$query = "SELECT * FROM tbl_product WHERE brandID='$id' order by brandID desc LIMIT 8";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_name_by_brand($id){
			$query = "SELECT tbl_product.*,tbl_brand.brandName,tbl_brand.brandID FROM tbl_product,tbl_brand WHERE tbl_product.brandID=tbl_brand.brandID AND tbl_product.brandID ='$id' LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
    }
?>
