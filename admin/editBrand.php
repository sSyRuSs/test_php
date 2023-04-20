<?php
    include"../admin/inc/header.php";
?>

<?php
    include"../classes/brand.php"
?>

<?php 
    
    if(!isset($_GET['brandID']) || $_GET['brandID']==NULL ){
        echo "<script>window.location ='brandList.php'</script>";
    }else{
        $id = $_GET['brandID'];
    }
    $brand = new brand();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $brandName = $_POST['brandName'];

        $editBrand = $brand->edit_brand($brandName,$id);
    }
?>
<h2 class="mt-5 mx-auto">EDIT BRAND</h2>
        <?php
            if(isset($editBrand)){
                echo $editBrand;
            }
        ?>
        <?php
            $get_brand_name = $brand->getbrandbyID($id);
            if($get_brand_name){
                while($result = $get_brand_name->fetch_assoc()){    
        ?>
<form action="" method="post">
    <div class="row">
        <div class="col-md-6">
            <label for="brandName">Name</label>
            <input class="form-control" value="<?php echo $result['brandName'] ?>" type="text" name="brandName"
                placeholder="Name" />
        </div>
    </div>

    <button type="submit" name="submit" value="update" class="btn btn-success" id="save-btn">Save</button>
    <a href="../admin/brandList.php" class="btn btn-danger">Cancel</a>
</form>
<?php

}
}
?>

<script>
  document.getElementById("save-btn").addEventListener("click", function() {
    window.location.href = "brandList.php";
  });
</script>



