<?php
    include"../admin/inc/header.php";
?>

<?php
    include"../classes/brand.php"
?>

<?php 
    $brand = new Brand();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $brandName = $_POST['brandName'];

        $insertBrand = $brand->insert_brand($brandName);
    }
?>
<h2 class="mt-5 mx-auto">ADD BRAND</h2>
<form action="addBrand.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <?php
            if(isset($insertBrand)){
                echo $insertBrand;
            }
        ?>
        <div class="col-md-6">
            <label for="BrandName">Name</label>
            <input class="form-control"
                   type="text"
                   name="brandName"
                   placeholder="Name" />
        </div>
    </div>
    
    <button type="submit" class="btn btn-success">Create</button>
    <a href="../admin/index.php" class="btn btn-danger">Cancel</a>
</form>



