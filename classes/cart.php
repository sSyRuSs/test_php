<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helper/format.php');
?>

<?php
	/**
	 * 
	 */
	class Cart
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function add_to_cart($quantity, $id){

			$quantity = $this->fm->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$id = mysqli_real_escape_string($this->db->link, $id);
			$sId = session_id();
			$check_cart = "SELECT * FROM tbl_cart WHERE proID = '$id' AND sID ='$sId'";
			$result_check_cart = $this->db->select($check_cart);
			if($result_check_cart){
				$msg = "<span class='text-danger'>Product Already Added</span>";
				return $msg;
			}else{

			$query = "SELECT * FROM tbl_product WHERE proID = '$id'";
			$result = $this->db->select($query)->fetch_assoc();
			
			$image = $result["image"];
			$price = $result["proPrice"];
			$productName = $result["proName"];

			
			
			$query_insert = "INSERT INTO tbl_cart(proID,proQuantity,sID,image,proPrice,proName) VALUES('$id','$quantity','$sId','$image','$price','$productName')";
			$insert_cart = $this->db->insert($query_insert);
				if($insert_cart){
					header("Location:cart.php");
				}else{
					header("Location:404.php");
				}
			}
			
		}
		
		public function add_to_cart_1($quantity, $id){

			$quantity = $this->fm->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$id = mysqli_real_escape_string($this->db->link, $id);
			$sId = session_id();
			$check_cart = "SELECT * FROM tbl_cart WHERE proID = '$id' AND sID ='$sId'";
			$result_check_cart = $this->db->select($check_cart);
			if($result_check_cart){
				$msg = "<span class='text-danger'>Product Already Added</span>";
				return $msg;
			}else{

			$query = "SELECT * FROM tbl_product WHERE proID = '$id'";
			$result = $this->db->select($query)->fetch_assoc();
			
			$image = $result["image"];
			$price = $result["proPrice"];
			$productName = $result["proName"];

			
			
			$query_insert = "INSERT INTO tbl_cart(proID,proQuantity,sID,image,proPrice,proName) VALUES('$id','$quantity','$sId','$image','$price','$productName')";
			$insert_cart = $this->db->insert($query_insert);
				if($insert_cart){
				}else{
					header("Location:404.php");
				}
			}
			
		}

		public function get_product_cart(){
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_quantity_cart($quantity, $cartId){
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$cartId = mysqli_real_escape_string($this->db->link, $cartId);
			$query = "UPDATE tbl_cart SET

					proQuantity = '$quantity'

					WHERE cartID = '$cartId'";
			$result = $this->db->update($query);
			if($result){
				header('Location:cart.php');
			}else{
				$msg = "<span class='error'>Product Quantity Updated Not Successfully</span>";
				return $msg;
			}
		
		}
		public function del_product_cart($cartid){
			$cartid = mysqli_real_escape_string($this->db->link, $cartid);
			$query = "DELETE FROM tbl_cart WHERE cartID = '$cartid'";
			$result = $this->db->delete($query);
			if($result){
				
				header('Location:cart.php');
			}else{
				$msg = "<span class='error'>Product Deleted Not Successfully</span>";
				return $msg;
			}
		}

		public function check_cart(){
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sID = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}
		public function del_all_data_cart(){
			$sId = session_id();
			$query = "DELETE FROM tbl_cart WHERE sID = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}
		

	}
?>