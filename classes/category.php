<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helper/format.php');
?>
<?php
    class Category
    {
        private $db; //database
        private $fm; //format
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_cat($catName)
        {
            $catName = $this->fm->validation($catName);

            $catName = mysqli_real_escape_string($this->db->link, $catName);

            if (empty($catName)) {
                $alert = "<span class='text-danger'>Category name must not be empty<span>";
                return $alert;
            } else {
                $query = "INSERT INTO tbl_category(catName) VALUES('$catName') ";
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

        public function show_cat(){
            $query = "SELECT * FROM tbl_category order by catID desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function getcatbyID($id){
            $query = "SELECT * FROM tbl_category WHERE catID = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function edit_cat($catName, $id){
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->link, $catName);
            $id = mysqli_real_escape_string($this->db->link, $id);

            if (empty($catName)) {
                $alert = "<span class='text-danger'>Category name must not be empty<span>";
                return $alert;
            } else {
                $query = "UPDATE tbl_category SET catName = '$catName' WHERE catID = '$id'";
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

        public function delete_cat($id){
            $query = "  DELETE FROM tbl_category WHERE catID = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='text-success'>Deleted successfully</span>";
                return $alert;
            }else{
                $alert = "<span class='text-success'>Deleted successfully</span>";
                return $alert;
            }
        }

        public function show_category_fontend(){
			$query = "SELECT * FROM tbl_category order by catID desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_product_by_cat($id){
			$query = "SELECT * FROM tbl_product WHERE catID='$id' order by catID desc LIMIT 8";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_name_by_cat($id){
			$query = "SELECT tbl_product.*,tbl_category.catName,tbl_category.catID FROM tbl_product,tbl_category WHERE tbl_product.catID=tbl_category.catID AND tbl_product.catID ='$id' LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}
    }
?>
